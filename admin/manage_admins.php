<?php 
require_once("../includes/db_connection.php");
include("admin_head.php");

$admin_set = find_all_admins();
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8" id="admin_main_container">  
      <?php echo message(); ?>
      <h2 class="text-center mb-4">Manage Admins</h2>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="width: 200px;">Username</th>
              <th colspan="2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
              <tr>
                <td><?php echo htmlentities($admin["username"]); ?></td>
                <td><a href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Edit</a>
                <a href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="mt-4 text-center">
        <a href="new_admin.php" class="btn btn-primary">Add new admin</a>
      </div>
    </div>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
