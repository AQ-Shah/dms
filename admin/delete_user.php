<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
  $user = find_user_by_id($_GET["id"]);
  if (!$user) {
    // user ID was missing or invalid or 
    // user couldn't be found in database
    redirect_to("manage_departments.php");
  }
  
  $id = $user["id"];
  $safe_user_id = mysqli_real_escape_string($connection, $id);
  $query = "DELETE FROM users WHERE id = {$safe_user_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "user deleted.";
    redirect_to("manage_departments.php");
  } else {
    // Failure
    $_SESSION["message"] = "user deletion failed.";
    redirect_to("manage_departments.php");
  }
  
?>
