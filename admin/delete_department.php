<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
  $department = find_department_by_id($_GET["id"]);
  if (!$department) {
    // department ID was missing or invalid or 
    // department couldn't be found in database
    redirect_to("manage_departments.php");
  }
  
  $id = $department["id"];
  $safe_admin_id = mysqli_real_escape_string($connection, $id);
  $query = "DELETE FROM department WHERE id = {$safe_admin_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Department deleted.";
    redirect_to("manage_departments.php");
  } else {
    // Failure
    $_SESSION["message"] = "Department deletion failed.";
    redirect_to("manage_departments.php");
  }
  
?>
