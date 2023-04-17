<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
  $course = find_course_by_id($_GET["course_id"]);
  $schedule = find_schedule_by_id($_GET["id"]);
  if (!$course) {
    redirect_to("manage_department.php");
  }
   if (!$schedule) {
    redirect_to("manage_department.php");
  }
  $check = find_schedule($schedule["id"],$course["id"]);
	if (!$check){
			$_SESSION["message"] = "No schedule was found";
			redirect_to("manage_department.php");
	}
  $safe_schedule_id = mysqli_real_escape_string($connection, $schedule["id"]);
  $safe_course_id = mysqli_real_escape_string($connection, $course["id"]);
  $query = "DELETE FROM schedule_class WHERE id = {$safe_schedule_id} AND course_id = {$safe_course_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Class UnScheduled.";
    redirect_to("manage_students.php");
  } else {
    // Failure
    $_SESSION["message"] = "Class UnSchedulation failed.";
    redirect_to("manage_students.php");
  }
  
?>
