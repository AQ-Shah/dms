<?php 
require_once("../includes/db_connection.php");
include("admin_head.php");

$department_set = find_all_departments();
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10" id="admin_main_container">  

      <?php echo message(); ?>
      <h2 class="text-center mb-4">Manage Departments</h2>
      
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="width: 200px;">Department Name</th>
              <th style="width: 200px;">Email</th>
              <th style="width: 200px;">Website</th>
              <th colspan="2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while($department = mysqli_fetch_assoc($department_set)) { ?>
              <tr>
                <td><?php echo htmlentities($department["name"]); ?></td>
                <td><?php echo htmlentities($department["email"]); ?></td>
                <td><?php echo htmlentities($department["website"]); ?></td>
                <td><a href="show_department.php?id=<?php echo urlencode($department["id"]); ?>">Show</a></td>
                <td><a href="edit_department.php?id=<?php echo urlencode($department["id"]); ?>">Edit</a></td>
                <td><a href="delete_department.php?id=<?php echo urlencode($department["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="mt-4 text-center">
        <a href="new_department.php" class="btn btn-primary">Add new Department</a>
      </div>

    </div>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
