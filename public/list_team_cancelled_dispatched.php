<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "list_team_cancelled_dispatched";
	include("../includes/layouts/public_header.php"); 
   
	include("../includes/pagination/carriers_team_cancelled_dispatched_data_fetch.php"); 
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
        <?php include("../includes/views/stats_box_dispatch_team_1.php"); ?>
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
                                <?php if (check_access("commission_view")){ ?>
                                <th onclick="sortTable(6)">Commission <span class="sort-arrows"></span> </th>
                                <?php } ?>
                                <th onclick="sortTable(7)">Status <span class="sort-arrows"></span> </th>
                                <th data-sortable="false">Action <span class="sort-arrows"></span> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($record_set)) { ?>
                            <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                            <tr>
                                <td>
                                    <?php
                                    if($record["dispatcher_id"]){
                                        $dispatcher = find_user_by_id($record["dispatcher_id"]);
                                        echo $dispatcher['full_name'];
                                    }
                                    ?>
                                </td>
                                <td><?php echo htmlentities(date("d-m-Y", strtotime($record["dispatch_time"]))); ?></td>
                                <td>
                                    <?php
                                    if($record["carrier_id"]){
                                        $dispatcher = find_carrier_form_by_id($record["carrier_id"]);
                                        echo $dispatcher['b_name'];
                                    } 
                                ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($record["current_location"]); ?>
                                </td>
                                <td><?php echo htmlentities($record["new_location"]); ?></td>
                                <td><?php echo '$'.htmlentities($record["rate"]); ?></td>
                                <?php if (check_access("commission_view")){ ?>
                                <td><?php echo '$'.htmlentities($record["commission"]); ?></td>
                                <?php } ?>
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