<?php 	
  require_once("../includes/public_require.php"); 
	$current_page = "department_view";
	include("../includes/layouts/public_header.php");  

  include("../includes/pagination/department_user_data_fetch.php"); 
  ?>

<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>
                <h2>Department: <?php echo htmlentities($department["name"]); ?></h2>

            </div>
        </div>
    </div>

    <div class="row card">
        <div class="col-12">
            <div class="row py-3">
                <div class="col-5 simple-panel">
                    <label>List of Employees by Department</label>
                </div>
                <div class="col-5 simple-panel" style="background-color:transparent">
                    <input class="form-control" id="tableSearch" onkeyup="table_search()" type="text"
                        placeholder="Search..">
                </div>
                <div class="col-2 text-xl-end mt-xl-0 mt-2">
                    <button type="button" class="btn btn-danger mb-2 me-2" onclick="showDepartmentUserCreatePopup()"><i
                            class=" mdi mdi-basket me-1"></i>
                        Add</button>

                </div>
            </div>
            <div class="row panel table-primary p-2">
                <div class="panel-body table-responsive">
                    <table class="table table-hover" id="currentTable">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)">Name
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(1)">Designation
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(2)">Email
                                    <span class="sort-arrows"></span>
                                </th>
                                <th onclick="sortTable(3)">Contact #
                                    <span class="sort-arrows"></span>
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($record_set)) { ?>
                            <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                            <tr>
                                <td><?php echo htmlentities($record["full_name"]); ?></td>
                                <td><?php echo htmlentities($record["designation"]); ?></td>
                                <td><?php echo htmlentities($record["email"]); ?></td>
                                <td><?php echo htmlentities($record["phone_num"]); ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropdown-button">Actions</button>
                                        <div class="dropdown-content">
                                            <button
                                                onclick="location.href='profile?id=<?php echo urlencode($record["id"]); ?>'">View</button>

                                            <button onclick="showDepartmentEditPopup(
                                              '<?php echo urlencode($record["id"]); ?>',
                                              '<?php echo $record["full_name"]; ?>',
                                              '<?php echo $record["email"]; ?>'
                                          )">Edit</button>

                                            <button
                                                onclick="if(confirm('Are you sure?')){location.href='profile_delete?id=<?php echo urlencode($record["id"]); ?>'}">Delete</button>
                                        </div>
                                    </div>
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
    include("../includes/views/department_user_create_popup.php"); 
    include("../includes/pagination/table_script.php"); 
    include("../includes/layouts/public_footer.php"); 
?>