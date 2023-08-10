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
                    <input class="form-control" id="tableSearch" onkeyup="table_search(event)" type="text"
                        placeholder="Search..">
                </div>
            </div>
            <div class="row panel table-primary p-2">
                <div class="panel-body table-responsive-sm" style="overflow-x:auto;">
                    <table class="table table-hover" id="currentTable">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)">Dispatcher <span class="sort-arrows"></span></th>
                                <th onclick="sortTable(1)">Dispatch <span class="sort-arrows"></span> </th>
                                <th onclick="sortTable(2)">Delivery <span class="sort-arrows"></span> </th>
                                <th onclick="sortTable(3)"> B Name <span class="sort-arrows"></span> </th>
                                <th onclick="sortTable(4)"> D Name <span class="sort-arrows"></span> </th>
                                <th onclick="sortTable(5)"> From->To <span class="sort-arrows"></span> </th>
                                <th onclick="sortTable(6)">Rate <span class="sort-arrows"></span> </th>
                                <?php if (check_access("commission_view")){ ?>
                                <th onclick="sortTable(7)">Commission <span class="sort-arrows"></span> </th>
                                <?php } ?>
                                <th onclick="sortTable(8)">Status <span class="sort-arrows"></span> </th>
                                <th onclick="sortTable(9)">Invoice Status <span class="sort-arrows"></span> </th>
                                <th data-sortable="false">Action <span class="sort-arrows"></span> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($record_set)) { ?>
                            <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                            <tr>
                                <td style="cursor: pointer;"
                                    onclick="location.href='list_dispatched?dispatcher_id=<?php echo urlencode($record['dispatcher_id']); ?>'">
                                    <?php
                                    if($record["dispatcher_id"]){
                                        $dispatcher = find_user_by_id($record["dispatcher_id"]);
                                        echo $dispatcher['full_name'];
                                    }
                                    ?>
                                </td>
                                <td><?php echo htmlentities(date("d-m-Y", strtotime($record["dispatch_time"]))); ?></td>
                                <td><?php echo htmlentities(date("d-m-Y", strtotime($record["delivery_time"]))); ?></td>
                                <td>
                                    <?php
                                    if($record["carrier_id"]){
                                        $dispatcher = find_carrier_form_by_id($record["carrier_id"]);
                                        echo $dispatcher['b_name'];
                                    } 
                                ?>
                                </td>
                                <td>
                                    <?php
                                    if($record["truck_id"]){
                                        $dispatcher = find_truck_by_id($record["truck_id"]);
                                        echo $dispatcher['d_name'];
                                    } 
                                ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($record["current_location"]).' -> '.htmlentities($record["new_location"]); ?>
                                </td>
                                <td><?php echo '$'.htmlentities($record["rate"]); ?></td>
                                <?php if (check_access("commission_view")){ ?>
                                <td><?php echo '$'.htmlentities($record["commission"]); ?></td>
                                <?php } ?>
                                <td <?php if($record["status"] == 'Cancelled') { ?> style="color: red;" <?php } ?>
                                    <?php if($record["status"] == 'Completed') { ?> style="color: green;" <?php } ?>>
                                    <?php echo htmlentities($record["status"]); ?></td>
                                <?php if (check_access("invoice_view")){ ?>
                                <?php if($record["invoice_status"] == 0) echo "<td>None</td>"; ?>
                                <?php if($record["invoice_status"] == 1) echo "<td>New</td>"; ?>
                                <?php if($record["invoice_status"] == 2) echo "<td>Invoiced</td>"; ?>
                                <?php if($record["invoice_status"] == 3) echo "<td style ='color:Green;'>Paid</td>"; ?>
                                <?php if($record["invoice_status"] == 4) echo "<td  style ='color:Red;'>Cancelled</td>"; ?>
                                <?php } ?>

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