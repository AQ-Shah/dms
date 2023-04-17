<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
  $course = find_course_by_id($_GET["id"]);
  if (!$course) {
    // course ID was missing or invalid or 
    // course couldn't be found in database
    redirect_to("manage_departments.php");
  }
  
  $id = $course["id"];
  $safe_course_id = mysqli_real_escape_string($connection, $id);
  $query = "DELETE FROM courses WHERE id = {$safe_course_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "course deleted.";
    redirect_to("manage_departments.php");
  } else {
    // Failure
    $_SESSION["message"] = "course deletion failed.";
    redirect_to("manage_departments.php");
  }
  
?>
