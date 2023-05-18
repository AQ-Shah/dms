<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "list_working_carriers";
	include("../includes/layouts/public_header.php"); 
	include("../includes/pagination/carriers_working_data_fetch.php"); 
  ?>
<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>

                <h2>
                    Working Carriers
                </h2>

            </div>
        </div>
    </div>

    <div class="row card">
        <?php include("../includes/views/dispatch_stats_1.php"); ?>
    </div>

    <div class="row card">
        <div class="col-12">
            <div class="row py-3">
                <div class="col-6 simple-panel">
                    <label>List of Working Carriers</label>
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
                                <th onclick="sortTable(0)">MC
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(1)">Dispatcher
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(2)">Carrier Name
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(3)">Truck Type
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(4)">Driver
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(4)">Contact
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(4)">Status
                                    <span class="sort-arrows"></span>
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($record_set)) { ?>
                            <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                            <tr>
                                <td><?php echo htmlentities($record["mc"]); ?></td>
                                <td><?php
                                    if($record["dispatcher_id"]){
                                        $dispatcher = find_user_by_id($record["dispatcher_id"]);
                                        echo $dispatcher['full_name'];
                                    } else {
                                        echo "Not Assigned";
                                    }
                                ?></td>
                                <td>
                                    <?php echo htmlentities($record["b_name"]); ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($record["truck_type"]); ?>
                                </td>
                                <td><?php echo htmlentities($record["d_name"]); ?></td>
                                <td><?php echo htmlentities($record["d_number"]); ?></td>
                                <td><?php echo htmlentities($record["status"]); ?></td>
                                <td>
                                    <?php include("../includes/views/action_dropdown_button.php");?>
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
	include("../includes/views/carrier_status_popup.php"); 
    include("../includes/views/carrier_move_popup.php"); 
	include("../includes/views/carrier_dispatch_popup.php"); 
	include("../includes/pagination/table_script.php"); 
	include("../includes/layouts/public_footer.php"); 
?>