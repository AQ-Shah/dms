<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "invoice_view";
	include("../includes/layouts/public_header.php");
    
    include("../includes/api/invoice_created_find_query.php"); 
    
?>
<!-- to add the Carrier name and invoice in the title -->
<script>
document.getElementById("pageTitle").innerHTML =
    "<?php echo $carrier['b_name'].' - Invoice #786-'.htmlentities($carrier['id']).'-'.htmlentities($invoice['id'])?>";
</script>

<div class="container">
    <div class="row">

        <div class="col-6">
            <div class="page-title-box">
                <h2>
                    Invoice Management
                </h2>
            </div>
        </div>
        <div class="col-6 text-end">
            <div class="page-title-box mt-1">
                <button type="button" class="btn btn-danger mb-2 me-2" onclick="invoicePrintFunction()">
                    <i class=" mdi mdi-basket me-1"></i>
                    Print</button>
            </div>
        </div>
    </div>

    <div class="row card">

        <div class="container-fluid py-3 bg-light border-bottom">
            <div class="row mb-3">
                <div class="col-6 justify-content-start">
                    <img src="assets/images/logo-dark.png" alt="Your Company Logo" height="50">
                </div>

                <div class="col-6 text-end">
                    <h4 class="mb-1">Invoice
                        #<?php echo '786-'.htmlentities($carrier["id"]).'-'.htmlentities($invoice["id"])?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-6 justify-content-start">
                    <p class="mb-1"><?php echo COMPANY_NAME; ?></p>
                    <p class="mb-1"><?php echo COMPANY_NUMBER; ?></p>
                    <h6>Billing To:</h6>
                    <p class="mb-0"><?php echo htmlentities($carrier["b_name"]); ?></p>
                    <p class="mb-0"><?php echo htmlentities($carrier["b_address"]); ?></p>
                    <p class="mb-0"><?php echo htmlentities($carrier["b_email"]); ?></p>
                </div>
                <div class="col-6 text-end">
                    <p class="mb-1">Date:
                        <?php echo htmlentities(date("d-M-Y", strtotime($invoice["creation_date"]))); ?></p>
                    <p class="mb-1">Payment Terms: Quick Pay</p>
                    <p class="mb-1">Due Date: <?php echo htmlentities(date("d-M-Y", strtotime($invoice["due_date"])));?>
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="row card">
        <div class="col-12">

            <div class="row panel">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>

                                <th> Dispatch Date</span> </th>
                                <th> Driver</span> </th>
                                <th> From</span> </th>
                                <th> To</span> </th>
                                <th> Rate Con.</span> </th>
                                <th> Commission</span> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($record_set)) { ?>
                            <?php foreach ($record_set as $record)  { ?>
                            <tr>
                                <td><?php echo htmlentities(date("M-d-Y", strtotime($record["dispatch_time"]))); ?></td>
                                <td>
                                    <?php
                                    if($record["truck_id"]){
                                        $dispatcher = find_truck_by_id($record["truck_id"]);
                                        echo $dispatcher['d_name'];
                                    } 
                                ?>
                                </td>
                                <td><?php echo htmlentities($record["current_location"]); ?></td>
                                <td><?php echo htmlentities($record["new_location"]); ?></td>
                                <td><?php echo '$'.htmlentities($record["rate"]); ?></td>
                                <td><?php echo '$'.htmlentities($record["commission"]); ?></td>
                            </tr>

                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="row form_panel mb-1">
                        <div class="col-10 text-end">
                            <label>Subtotal: $<?php echo $invoice["total_amount"];?> </label>
                        </div>
                    </div>
                    <div class="row form_panel mb-1">
                        <div class="col-10 text-end">
                            <label>Tax(0%): $0 </label>
                        </div>
                    </div>
                    <div class="row form_panel mb-1">
                        <div class="col-10 text-end">
                            <label> Total: $<?php echo $invoice["total_amount"];?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
function invoicePrintFunction() {
    window.print();
}
</script>



<?php 
    
	include("../includes/layouts/public_footer.php"); 
?>