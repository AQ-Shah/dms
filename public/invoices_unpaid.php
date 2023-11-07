<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "invoices_unpaid";
	include("../includes/layouts/public_header.php"); 
   
	include("../includes/pagination/invoices_unpaid_data_fetch.php"); 
  ?>
<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>
                <h2>
                    Invoice Management
                </h2>

            </div>
        </div>
    </div>

    <div class="row card">
        <div class="col-12">
            <div class="row py-3">
                <div class="col-6 simple-panel">
                    <label>List of Unpaid Invoices</label>
                </div>
                <div class="col-6 simple-panel" style="background-color:transparent">
                    <input class="form-control" id="tableSearch" onkeyup="table_search()" type="text"
                        placeholder="Search..">
                </div>
            </div>
            <div class="row panel table-primary p-2">
                <div class="panel-body table-responsive">
                    <table class="table table-hover" id="currentTable">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)">Invoice Date
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(1)">Carrier Name
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(2)">Owner Name
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(3)"> Email
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(4)"> Number
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(5)">Invoice Amount
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(6)">Due Date
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(7)">Status
                                    <span class="sort-arrows"></span>
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($record_set)) { ?>
                            <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                            <tr>
                                <td><?php echo htmlentities(date("d-m-Y", strtotime($record["creation_date"]))); ?></td>

                                <td><?php
                                        $carrier = find_carrier_form_by_id($record["carrier_id"]);
                                        echo $carrier['b_name'];
                                ?></td>
                                <td><?php
                                        echo $carrier['o_name'];
                                ?></td>
                                <td><?php
                                        echo $carrier['b_email'];
                                ?></td>
                                <td><?php
                                        echo $carrier['b_number'];
                                ?></td>

                                <td><?php echo '$'.htmlentities($record["total_amount"]); ?></td>
                                <td <?php if (($record["due_date"] <= date('Y-m-d')) && in_array($record["invoice_status"], [2, 4, 5])) { ?>
                                    style="color: red;" <?php } ?>>
                                    <?php echo htmlentities(date("d-m-Y", strtotime($record["due_date"]))); ?></td>

                                <td <?php if (in_array($record["invoice_status"], [2, 4])) { ?> style="color: red;"
                                    <?php } ?> <?php if($record["invoice_status"] == 3) { ?> style="color: green;"
                                    <?php } ?>>
                                    <?php 
                                    if($record["invoice_status"] == 2) echo "Pending";
                                    if($record["invoice_status"] == 3) echo "Paid";
                                    if($record["invoice_status"] == 4) echo "Cancelled";
                                     ?></td>
                                <td>
                                    <?php include("../includes/views/invoices_dropdown_button.php");?>
                                </td>

                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="row form_panel">
                        <?php include("../includes/pagination/bottom_pagination_bar.php");?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<?php 
    include("../includes/views/invoices_status_popup.php"); 
	include("../includes/pagination/table_script.php"); 
	include("../includes/layouts/public_footer.php"); 
?>