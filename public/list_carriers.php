<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "list_carriers";
	include("../includes/layouts/public_header.php"); 
   
	include("../includes/pagination/carriers_data_fetch.php"); 
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
                    <input class="form-control" id="tableSearch" onkeyup="table_search(event)" type="text"
                        placeholder="Search..">
                </div>
            </div>
            <div class="row panel table-primary p-2">
                <div class="panel-body table-responsive">
                    <table class="table table-hover" id="currentTable">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)">Dispatch Team
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(1)">Dispatcher
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(2)">Serving Time
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(3)">MC
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(4)">Carrier Name
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(5)">Truck
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(6)">Sales Status
                                    <span class="sort-arrows"></span>
                                </th>

                                <th onclick="sortTable(7)">Sales Team
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(8)">Sales Agent
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(9)">Status
                                    <span class="sort-arrows"></span>
                                </th>
                                <?php if (isset($_GET['only_inactive']) == 1 || isset($_GET['only_removed']) == 1) { ?>
                                <th onclick="sortTable(10)">Reason
                                    <span class="sort-arrows"></span>
                                </th>
                                <?php }  ?>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($record_set)) { ?>
                            <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                            <tr>
                                <td><?php
                                    if($record["dispatch_team_id"]){
                                        $dispatch_team = find_team_by_id($record["dispatch_team_id"]);
                                        echo $dispatch_team['name'];
                                    } else {
                                        echo "Not Assigned";
                                    }
                                ?></td>
                                <td><?php
                                    if($record["dispatcher_id"]){
                                        $dispatcher = find_user_by_id($record["dispatcher_id"]);
                                        echo $dispatcher['full_name'];
                                    } else {
                                        echo "Not Assigned";
                                    }
                                ?></td>

                                <td>
                                    <?php
                                        $mc_validity = new DateTime($record["mc_validity"]);
                                        $current_date = new DateTime(); 

                                        $interval = $current_date->diff($mc_validity);
                                        $days_passed = $interval->days;

                                        echo "{$days_passed} days ago";
                                        ?>
                                </td>


                                <td><?php echo htmlentities($record["mc"]); ?></td>
                                <td><?php echo htmlentities($record["b_name"]).'('.no_of_trucks_by_carrier($record["id"]).')'; ?>
                                </td>
                                <td>
                                    <?php  
                                        $truckSet = find_trucks_by_carrier_id($record["id"]);
                                        $counter = 1;
                                        
                                        while($truck = mysqli_fetch_assoc($truckSet)) {
                                            if ($counter > 1) echo ','; 
                                            echo htmlentities($truck["truck_type"]).' ';    
                                            $counter ++;
                                        }
                                    ?>
                                </td>
                                <?php if($record["sale_active"]) { ?>
                                <td style="color: Green;"> Active</td>
                                <?php } else { ?>
                                <td style="color: red;"> Inactive</td>
                                <?php }  ?>
                                <td><?php
                                    if($record["sales_team_id"]){
                                        
                                        $sales_team = find_team_by_id($record["sales_team_id"]);
                                        echo $sales_team['name'];
                                    } else {
                                        echo "Not Assigned";
                                    }
                                ?></td>
                                <td><?php
                                    if($record["creator_id"]){
                                        $sales_agent = find_user_by_id($record["creator_id"]);
                                        echo $sales_agent['full_name'];
                                    } else {
                                        echo "Not Assigned";
                                    }
                                ?></td>


                                <?php if($record["status"] == 1) { ?>
                                <td style="color: green;">Available</td>
                                <?php } else { ?>
                                <td style="color: red;">Unavailable</td>
                                <?php } ?>

                                <?php if (isset($_GET['only_inactive']) == 1 || isset($_GET['only_removed']) == 1) { ?>
                                <td><?php echo htmlentities($record["status_change_reason"]); ?></td>
                                <?php }  ?>
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
    include("../includes/views/carrier_add_truck_popup.php"); 
    include("../includes/views/carrier_assign_team_popup.php"); 
    include("../includes/views/carrier_assign_dispatcher_popup.php"); 
	include("../includes/views/carrier_status_popup.php"); 
    include("../includes/views/carrier_move_popup.php"); 
	include("../includes/views/carrier_dispatch_popup.php"); 
	include("../includes/pagination/table_script.php"); 
	include("../includes/layouts/public_footer.php"); 
?>