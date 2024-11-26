<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "departments";
	include("../includes/layouts/public_header.php"); 
 
$record_set = find_all_departments_of_company($user["company_id"]);
?>

<div class="container">

    <div class="row">
        <div class="col-12 text-center mb-4">
            <div class="page-title-box">

                <?php echo message(); ?>

                <h2>
                    Office Units 
                </h2>

            </div>
        </div>
    </div>

    <div class="row panel table-primary p-2 card">
        <div class="panel-body table-responsive">

            <div class="row mb-2">
                <div class="col-xl-8">
                    <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                        <div class="col-auto">
                            <label for="tableSearch" class="visually-hidden">Search</label>
                            <input class="form-control" id="tableSearch" onkeyup="table_search()" type="text"
                                placeholder="Search..">
                        </div>

                    </form>
                </div>
                <div class=" col-xl-4">
                    <div class="text-xl-end mt-xl-0 mt-2">
                        <button type="button" class="btn btn-danger mb-2 me-2" onclick="showDepartmentCreatePopup()"><i
                                class="mdi mdi-basket me-1"></i> Add
                            New Unit</button>

                    </div>
                </div><!-- end col-->
            </div>
            <table class="table table-hover" id="currentTable">
                <thead>
                    <tr>
                        <th>Unit Name</th>
                        <th>No of Employees</th>
                        <th colspan=" 2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                    <tr>
                        <td style="cursor: pointer;"
                            onclick="location.href='department_view?id=<?php echo urlencode(encrypt_id($record["id"])); ?>'">
                            <?php echo htmlentities($record["name"]); ?></td>
                        <td style="cursor: pointer;"
                            onclick="location.href='department_view?id=<?php echo urlencode(encrypt_id($record["id"])); ?>'">
                            <?php echo htmlentities(no_of_users_by_department($record["id"])); ?></td>

                        <td>
                        <button class="dropdown dropdown-button"
                                    onclick="showDepartmentActionPopup('<?php echo urlencode(encrypt_id($record["id"])); ?>','<?php echo $record["name"]; ?>','<?php echo $record["function_code"]; ?>')">Actions</button>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
    include("../includes/views/department_create_popup.php"); 
    include("../includes/views/department_edit_popup.php"); 
    include("../includes/pagination/table_script.php"); 
    include("../includes/layouts/public_footer.php"); 
    include("../includes/views/action_dropdown_department_button.php"); 
?>