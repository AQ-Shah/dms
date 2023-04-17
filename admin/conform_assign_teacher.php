<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
if(( isset($_GET["teacher_id"]) ) && ( isset($_GET["course_id"]) ) ){
	
$teacher_id = $_GET["teacher_id"];
$course_id = $_GET["course_id"];
$safe_teacher_id = mysqli_real_escape_string($connection, $teacher_id);
$safe_course_id = mysqli_real_escape_string($connection, $course_id);

$query  = "UPDATE courses SET teacher_id = '{$safe_teacher_id}' ";
$query .= "WHERE id = {$safe_course_id} LIMIT 1  ";
 $result = mysqli_query($connection, $query);
  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Teacher Assigned.";
    redirect_to("show_course.php?id={$safe_course_id}");
  } else {
    // Failure
    $_SESSION["message"] = "Teachers Assigning failed.";
     redirect_to("show_course.php?id={$safe_course_id}");
  }
}
else {
	 $_SESSION["message"] = "Teacher Assigning failed due false Teacher id or course id.";
    redirect_to("admin.php");
}
?> 

