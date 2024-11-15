<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "list_carriers";
	include("../includes/layouts/public_header.php"); 
   
	include("../includes/pagination/carriers_by_company_data_fetch.php"); 
    $columnIndex = 0;
    
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
        <?php if (check_access("stats_box_dispatch_team_1")){ include("../includes/views/stats_box_dispatch_team_1.php"); } ?>
        <?php if (check_access("stats_box_sales_team_1")){ include("../includes/views/stats_box_sales_team_1.php"); } ?>
    </div>

    <div class="row card">
        <div class="col-12">
            <div class="row py-3">
                <div class="col-3 simple-panel">
                    <label>List of Carriers</label>
                </div>
                <div class="col-6 simple-panel" style="background-color:transparent">
                    <input class="form-control" id="tableSearch" onkeyup="table_search(event)" type="text"
                        placeholder="Search..">
                </div>
                <div class="col-3 simple-panel dropdown">
                    <h5>Columns</h5>
                    <div class="dropdown-content">
                        <?php if (check_access("executive")){ ?>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Dispatch
                            Team</button>

                        <?php } ?>
                        <?php if (check_access("dispatch_supervisor")){ ?>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Dispatcher</button>
                        <?php } ?>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Serving
                            Time</button>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">MC</button>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Carrier
                            Name</button>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Owner
                            Name</button>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Business
                            Number</button>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Truck</button>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Sales
                            Status</button>
                        <?php if (check_access("executive")){ ?>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Sales
                            Team</button>
                        <?php } ?>
                        <?php if (check_access("sales_supervisor")){ ?>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Sales
                            Agent</button>
                        <?php } ?>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Status</button>
                        <?php if (isset($_GET['only_unavailable'])|| (isset($_GET['only_removed']) && check_access("executive"))) { ?>
                        <button><input type="checkbox" id="toggleColumn<?php echo $columnIndex;?>" checked
                                onclick="toggleColumn(<?php echo $columnIndex;$columnIndex++;?>)">Reason</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php $columnIndex = 0; ?>
            <div class="row panel table-primary p-2">
                <div class="panel-body table-responsive">
                    <table class="table table-hover" id="currentTable">
                        <thead>
                            <tr>
                                <?php if (check_access("executive")){ ?>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Dispatch Team
                                    <span class="sort-arrows"></span>
                                </th>
                                <?php } ?>
                                <?php if (check_access("dispatch_supervisor")){ ?>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Dispatcher
                                    <span class="sort-arrows"></span>
                                </th>
                                <?php } ?>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Serving Time
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    MC
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Carrier Name
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Owner Name
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Business Number
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Truck
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Sales Status
                                    <span class="sort-arrows"></span>
                                </th>
                                <?php if (check_access("executive")){ ?>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Sales Team
                                    <span class="sort-arrows"></span>
                                </th>
                                <?php } ?>
                                <?php if (check_access("sales_supervisor")){ ?>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Sales Agent
                                    <span class="sort-arrows"></span>
                                </th>
                                <?php } ?>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Status
                                    <span class="sort-arrows"></span>
                                </th>
                                <?php if (isset($_GET['only_unavailable']) || (isset($_GET['only_removed']) && check_access("executive"))) { ?>
                                <th onclick="sortTable(<?php echo $columnIndex;$columnIndex++;?>)">
                                    Reason
                                    <span class="sort-arrows"></span>
                                </th>
                                <?php } ?>
                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>
                            <?php if (isset($record_set)) { ?>
                            <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                            <tr>
                                <?php if (check_access("executive")){ ?>
                                <td>
                                    <?php
                                    if($record["dispatch_team_id"]){
                                        $dispatch_team = find_team_by_id($record["dispatch_team_id"]);
                                        echo $dispatch_team['name'];
                                    } else {
                                        echo "Not Assigned";
                                    }
                                    ?>
                                </td>
                                <?php } ?>
                                <?php if (check_access("dispatch_supervisor")){ ?>
                                <td>
                                    <?php
                                    if($record["dispatcher_id"]){
                                        $dispatcher = find_user_by_id($record["dispatcher_id"]);
                                        echo $dispatcher['full_name'];
                                    } else {
                                        echo "Not Assigned";
                                    }
                                    ?>
                                </td>
                                <?php } ?>
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
                                <td><?php echo htmlentities($record["o_name"]); ?></td>
                                <td><?php echo htmlentities($record["b_number"]); ?></td>
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
                                <td><?php echo ($record["sale_active"]) ? '<span style="color: green;">'.htmlentities(date("M-d-Y", strtotime($record["sale_activation_date"]))).'</span>' : '<span style="color: red;">Inactive</span>'; ?>
                                </td>
                                <?php if (check_access("executive")){ ?>
                                <td><?php echo ($record["sales_team_id"]) ? find_team_by_id($record["sales_team_id"])['name'] : "Not Assigned"; ?>
                                </td>
                                <?php } ?>
                                <?php if (check_access("sales_supervisor")){ ?>
                                <td><?php echo ($record["creator_id"]) ? find_user_by_id($record["creator_id"])['full_name'] : "Not Assigned"; ?>
                                </td>
                                <?php } ?>
                                <td>
                                    <?php
                                        $status = $record["status"];
                                        $statusText = '';

                                        switch ($status) {
                                            case 1:
                                            $statusText = '<span style="color: green;">Available</span>';
                                            break;
                                            case 2:
                                            $statusText = '<span style="color: orange;">Unavailable</span>';
                                            break;
                                            case 3:
                                            $statusText = '<span style="color: black;">Not Working</span>';
                                            break;
                                            case 4:
                                            $statusText = '<span style="color: red;">BLACKLISTED</span>';
                                            break;
                                            default:
                                            $statusText = '<span style="color: gray;">Unknown</span>';
                                        }

                                        echo $statusText;
                                        ?>
                                        </td>

                                <?php if (isset($_GET['only_unavailable']) || (isset($_GET['only_removed']) && check_access("executive"))) { ?>
                                <td><?php echo htmlentities($record["status_change_reason"]); ?></td>
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
    include("../includes/views/carrier_edit_truck_popup.php");
    include("../includes/views/carrier_add_truck_popup.php");  
    include("../includes/views/carrier_dispatch_popup.php"); 
    include("../includes/views/carrier_truck_edit_view_popup.php"); 
    include("../includes/views/carrier_assign_team_popup.php"); 
    include("../includes/views/carrier_assign_dispatcher_popup.php"); 
	include("../includes/views/carrier_status_popup.php"); 
    include("../includes/views/carrier_move_popup.php"); 
	include("../includes/pagination/table_script.php"); 
	include("../includes/layouts/public_footer.php"); 
?>