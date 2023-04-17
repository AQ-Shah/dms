<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
  $student = find_student_by_id($_GET["student_id"]);
  if (!$student) {
    // student ID was missing or invalid or 
    // student couldn't be found in database
    redirect_to("manage_students.php");
  }
  $course = find_course_by_id($_GET["course_id"]);
  if (!$course) {
    // course ID was missing or invalid or 
    // course couldn't be found in database
    redirect_to("manage_students.php");
  }
  $check = find_enrollment($student["id"],$course["id"]);
	if (!$check){
			$_SESSION["message"] = "Student not enrolled";
			redirect_to("manage_students.php");
	}
  $safe_student_id = mysqli_real_escape_string($connection, $student["id"]);
  $safe_course_id = mysqli_real_escape_string($connection, $course["id"]);
  $query = "DELETE FROM student_enrollment WHERE student_id = {$safe_student_id} AND course_id = {$safe_course_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Student Unenrolled.";
    redirect_to("manage_students.php");
  } else {
    // Failure
    $_SESSION["message"] = "Student was not Unenrolled.";
    redirect_to("manage_students.php");
  }
  
?>
