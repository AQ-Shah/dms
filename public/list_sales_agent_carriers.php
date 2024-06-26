<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "list_sales_agent_carriers";
	include("../includes/layouts/public_header.php"); 
   
	include("../includes/pagination/carriers_by_sales_agent_data_fetch.php"); 
  ?>
<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>

                <h2>
                    My Sales
                </h2>

            </div>
        </div>
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
                                <th onclick="sortTable(0)">Carrier Name
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(1)">Number of Trucks
                                    <span class="sort-arrows"></span>
                                </th>

                                <th onclick="sortTable(2)">Owner Name
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(3)">Business Number
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(4)">Sale Active
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(5)">Current Status
                                    <span class="sort-arrows"></span>
                                </th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                            <tr>
                                <td><?php echo htmlentities($record["b_name"]); ?></td>
                                <td><?php echo no_of_trucks_by_carrier($record["id"]); ?></td>
                                <td><?php echo htmlentities($record["o_name"]); ?> </td>
                                <td><?php echo htmlentities($record["b_number"]); ?> </td>
                                <td><?php echo ($record["sale_active"]) ? '<span style="color: green;">'.htmlentities(date("M-d-Y", strtotime($record["sale_activation_date"]))).'</span>' : '<span style="color: red;">Inactive</span>'; ?>
                                </td>
                                <?php if($record["status"] == 'unavailable') { ?>
                                <td style="color: red;">Unavailable</td>
                                <?php } else { ?>
                                <td style="color: green;">Available</td>
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