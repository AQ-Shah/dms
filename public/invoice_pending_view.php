<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "invoice_pending_view";
	include("../includes/layouts/public_header.php");
    
    include("../includes/api/invoice_find_query.php"); 

    $total_amount_view =0;
?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <?php echo message();  ?>
            </div>
        </div>
        <div class="col-6">
            <div class="page-title-box">
                <h2>
                    Invoice Management
                </h2>
            </div>
        </div>
        <div class="col-6 text-end">
            <div class="page-title-box mt-1">
                <button type="button" class="btn btn-danger mb-2 me-2"
                    onclick="window.location.href='invoice_create?carrier_id=<?php echo urlencode($carrier['id']); ?>'">
                    <i class=" mdi mdi-basket me-1"></i>
                    Generate
                </button>
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
                        #<?php echo '786-'.htmlentities($carrier["id"])?></h4>
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
                    <p class="mb-1">Date: <?php echo date('d-M-y');?></p>
                    <p class="mb-1">Payment Terms: Quick Pay</p>
                    <p class="mb-1">Due Date: <?php echo date('d-M-y', strtotime('next monday'));?></p>
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
                                <th> Driver </span> </th>
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
                                <td><?php echo htmlentities(date("d-m-Y", strtotime($record["dispatch_time"]))); ?></td>
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
                            <?php $total_amount_view += $record["commission"] ?>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="row form_panel mb-1">
                        <div class="col-10 text-end">
                            <label>Subtotal: $<?php echo $total_amount_view;?> </label>
                        </div>
                    </div>
                    <div class="row form_panel mb-1">
                        <div class="col-10 text-end">
                            <label>Tax(0%): $0 </label>
                        </div>
                    </div>
                    <div class="row form_panel mb-1">
                        <div class="col-10 text-end">
                            <label> Total: $<?php echo $total_amount_view;?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
function invoiceCreateFunction() {

    // Get the current URL
    const currentUrl = window.location.href;

    // Construct the new URL with the same parameters
    const newUrl = 'invoice_create?' + currentUrl.split('?')[1];


    $.ajax({
        url: newUrl,
        type: 'GET',
        success: function(result) {
            console.log('GET request succeeded.');
            // do something with the result if needed
        },
        error: function(xhr, status, error) {
            console.error('Error making GET request: ' + error);
        }
    });
    window.print();

}
</script>



<?php 
    
	include("../includes/layouts/public_footer.php"); 
?>