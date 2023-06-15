<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
if ( (isset($_GET['student_id'])) && isset($_GET['course_id']) ){
  // Process the form
  // validations
	$student_id = mysql_prep($_GET["student_id"]);
	$course_id = mysql_prep($_GET["course_id"]);
	$required_fields_get = array($student_id,$course_id);
	validate_presences($required_fields);

	if (empty($errors)) {
    // Perform Create
		$student = find_student_by_id($student_id);
		$check = find_enrollment($student_id,$course_id);
		if ($check){
			$_SESSION["message"] = "ALREADY ENROLLED";
			redirect_to("manage_departments.php");
		}
		if ($student){
			$query  = "INSERT INTO student_enrollment (";
			$query .= "  student_id, course_id";
			$query .= ") VALUES (";
			$query .= "  '{$student_id}', '{$course_id}'";
			$query .= ")";
			$result = mysqli_query($connection, $query);
      // Success
			if ($result) {
				$_SESSION["message"] = "Student Enrolled.";
				redirect_to("manage_departments.php");
			} else {
			// Failure
					$_SESSION["message"] = "Student Enrollment Failed.";
			}
		}
   else {
	  $_SESSION["message"] = "Student Enrollment Failed. Please Check IDs";
   }
  } 
} 
?>