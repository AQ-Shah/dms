<?php 
require_once("../includes/db_connection.php"); 
include("admin_head.php");

// pagination
$record_per_page = 5;
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$total_pages = total_user_pages($record_per_page);
$record_set = pagination_for_users($record_per_page, $page);

if (isset($_POST['submit'])) {
  if (isset($_POST['filter']) && isset($_POST['search'])){
    $filter = $_POST['filter'];
    $search = $_POST['search'];
    $record_set = filter_users($filter, $search);
  }
}

$filters = [
  'Full Name',
  'Email',
  'Phone Number'
];
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8" id="admin_main_container">  
      <h2 class="text-center">Manage Users</h2>
      <br/>
      <form action="manage_users.php" method="post" class="mb-3">
        <div class="input-group">
          <select name="filter" class="form-control">
            <?php foreach ($filters as $filter) { ?>
              <option value="<?php echo strtolower(str_replace(' ', '_', $filter)); ?>"><?php echo $filter; ?></option>
            <?php } ?>
          </select>
          <input type="text" name="search" class="form-control" placeholder="Search...">
          <button type="submit" name="submit" class="btn btn-primary">Filter</button>
        </div>
      </form>
      
      <?php if (isset($record_set)) { ?>
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">Full Name</th>
              <th class="text-center">Email</th>
              <th class="text-center">Phone Number</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
              <tr onclick="location.href='show_user.php?id=<?php echo urlencode($record["id"]); ?>'">
                <td class="text-center"><?php echo htmlentities($record["full_name"]); ?></td>
                <td class="text-center"><?php echo htmlentities($record["email"]); ?></td>
                <td class="text-center"><?php echo htmlentities($record["phone_num"]); ?></td>
                <td class="text-center"><a href="delete_user.php?id=<?php echo urlencode($record["id"]); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a></td>
              </tr>
            <?php } ?> 
          </tbody>
        </table>
      <?php } else { ?>
        <p class="text-center">No results found.</p>
      <?php } ?> 
      
      <?php add_pagination($page, $total_pages, 'manage_users', ''); ?>
      
      <br />
      <div class="text-center">
        <a href="new_user.php" class="btn btn-primary">Add new user</a>
      </div>
    </div>  
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
