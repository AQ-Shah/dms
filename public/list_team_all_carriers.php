<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "list_team_all_carriers";
	include("../includes/layouts/public_header.php"); 
   
	include("../includes/pagination/carriers_by_team_all_data_fetch.php"); 
  ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>

                <h2>
                    Team Carriers
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
                    <label>List of My Team Carriers</label>
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
                                <th onclick="sortTable(0)">Serving Time
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(1)">MC
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(2)">Dispatcher
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(3)">Carrier Name
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
                                <td>
                                    <?php
                                        $mc_validity = new DateTime($record["mc_validity"]);
                                        $current_date = new DateTime(); // This will automatically use the current date and time

                                        $interval = $current_date->diff($mc_validity);
                                        $days_passed = $interval->days;

                                        echo "{$days_passed} days ago";
                                        ?>
                                </td>

                                <td><?php echo htmlentities($record["mc"]); ?></td>
                                <td><?php
                                    if($record["dispatcher_id"]){
                                        $dispatcher = find_user_by_id($record["dispatcher_id"]);
                                        echo $dispatcher['full_name'];
                                    } else {
                                        echo "Not Assigned";
                                    }
                                ?></td>
                                <td><?php echo '('.no_of_trucks_by_carrier($record["id"]).')'.htmlentities($record["b_name"]); ?>
                                </td>

                                <?php if($record["status"] == 1) { ?>
                                <td style="color: green;">Available</td>
                                <?php } else { ?>
                                <td style="color: red;">Unavailable</td>
                                <?php } ?>

                                <td>
                                    <button class="dropdown dropdown-button"
                                        onclick="showCarriersActionPopup(<?php echo $record['id']; ?>)">Actions</button>
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
    include("../includes/views/action_dropdown_button.php");
    include("../includes/views/carrier_assign_dispatcher_popup.php"); 
	include("../includes/views/carrier_status_popup.php"); 
	include("../includes/views/carrier_move_popup.php"); 
	include("../includes/views/carrier_dispatch_popup.php"); 
	include("../includes/pagination/table_script.php"); 
	include("../includes/layouts/public_footer.php"); 
?>