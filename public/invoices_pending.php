<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "list_carriers";
	include("../includes/layouts/public_header.php"); 
   
	include("../includes/pagination/invoices_pending_data_fetch.php"); 
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
                    <label>List of Pending Dispatch to be Invoiced</label>
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

                                <th onclick="sortTable(0)">Carrier Name
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(1)">Carrier Email
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(2)">Owner Name
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(3)">Owner Number
                                    <span class="sort-arrows"></span>
                                </th>

                                <th onclick="sortTable(4)">Pending Invoice Amount
                                    <span class="sort-arrows"></span>
                                </th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (isset($record_set)) { 
                                foreach ($record_set as $record) { 
                                    if ($pending_amount = find_pending_invoices_amount_by_carrier_id($record["id"])) {?>
                            <tr>
                                <td><?php echo htmlentities($record["b_name"]); ?></td>
                                <td><?php echo htmlentities($record["b_email"]); ?></td>
                                <td><?php echo htmlentities($record["o_name"]); ?></td>
                                <td><?php echo htmlentities($record["b_number"]); ?></td>
                                <td><?php echo '$'.htmlentities($pending_amount); ?>
                                </td>
                                <td>
                                    <button class="action-button"
                                        onclick="window.open('invoice_pending_view?carrier_id=<?php echo urlencode($record['id']); ?>', '_blank')">View</button>
                                </td>
                            </tr>
                            <?php }}} ?>
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
   
	include("../includes/pagination/table_script.php"); 
	include("../includes/layouts/public_footer.php"); 
?>