<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "departments";
	include("../includes/layouts/public_header.php"); 
 
$record_set = find_all_departments();
?>

<div class="container">

    <div class="row">
        <div class="col-12 text-center mb-4">
            <div class="page-title-box">

                <?php echo message(); ?>

                <h2>
                    Manage Departments
                </h2>

            </div>
        </div>
    </div>

    <div class="row panel table-primary p-2 card">
        <div class="panel-body table-responsive">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 200px;">Department Name</th>
                        <th style="width: 200px;">Email</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                    <tr>
                        <td><?php echo htmlentities($record["name"]); ?></td>
                        <td><?php echo htmlentities($record["email"]); ?></td>
                        <td>
                            <button class="dropbtn"
                                onclick="location.href='department_view?id=<?php echo urlencode($record["id"]); ?>'">View</button>

                            <button class="dropbtn" onclick="showDepartmentEditPopup(
                                  '<?php echo urlencode($record["id"]); ?>',
                                  '<?php echo $record["name"]; ?>',
                                  '<?php echo $record["email"]; ?>'
                              )">Edit</button>

                            <button class="dropbtn"
                                onclick="if(confirm('Are you sure?')){location.href='department_delete?id=<?php echo urlencode($record["id"]); ?>'}">Delete</button>
                        </td>



                    </tr>
                    <?php } ?>
                </tbody>
            </table>


            <div class="mt-4 text-center">
                <button class="dropbtn" onclick="showDepartmentCreatePopup()">New Department</button>
            </div>

        </div>
    </div>
</div>

<?php 
  include("../includes/views/department_create_popup.php"); 
  include("../includes/views/department_edit_popup.php"); 
  include("../includes/layouts/public_footer.php"); 
?>