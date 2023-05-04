<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "list_dispatched";
	include("../includes/layouts/public_header.php"); 
   
	include("../includes/pagination/dispatched_data_fetch.php"); 
  ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>

                <h2>
                    Carriers
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
                    <label>List of Carriers</label>
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
                                <th onclick="sortTable(0)">Dispatcher <span class="sort-arrows"></span></th>
                                <th onclick="sortTable(1)">Dispatch Time <span class="sort-arrows"></span> </th>
                                <th onclick="sortTable(2)">Carrier Name <span class="sort-arrows"></span> </th>
                                <th onclick="sortTable(3)">From <span class="sort-arrows"></span> </th>
                                <th onclick="sortTable(4)">To <span class="sort-arrows"></span> </th>
                                <th onclick="sortTable(5)">Rate <span class="sort-arrows"></span> </th>
                                <th onclick="sortTable(6)">Status <span class="sort-arrows"></span> </th>
                                <th data-sortable="false">Action <span class="sort-arrows"></span> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($record_set)) { ?>
                            <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                            <tr>
                                <td><?php echo htmlentities($record["dispatcher_id"]); ?></td>
                                <td><?php echo htmlentities($record["dispatch_time"]); ?></td>
                                <td>
                                    <?php echo htmlentities($record["carrier_id"]); ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($record["current_location"]); ?>
                                </td>
                                <td><?php echo htmlentities($record["new_location"]); ?></td>
                                <td><?php echo htmlentities($record["rate"]); ?></td>
                                <td <?php if($record["status"] == 'Cancelled') { ?> style="color: red;" <?php } ?>>
                                    <?php echo htmlentities($record["status"]); ?></td>

                                <td>
                                    <?php include("../includes/views/dispatched_dropdown_button.php");?>
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
	include("../includes/views/dispatched_status_popup.php"); 
	include("../includes/pagination/table_script.php"); 
	include("../includes/layouts/public_footer.php"); 
?>