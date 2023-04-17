<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_user_logged_in(); ?>
<?php 
$user = find_user_by_id($_SESSION["id"]); 
$is_teacher = $user['is_teacher'];
$current_page = "my_courses";
if (isset($_GET["course_id"])){
	$course = find_course_by_id($_GET["course_id"]);
	if (!$course){
		redirect_to("home.php");
	}
}

elseif (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("heading", "content");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Perform Create

    $heading = mysql_prep($_POST["heading"]);
    $content = mysql_prep($_POST["content"]);
    $course_id = mysql_prep($_POST["course_id"]);
    $query  = "INSERT INTO course_news (";
    $query .= "  course_id, heading, content";
    $query .= ") VALUES (";
    $query .= "  '{$course_id}', '{$heading}', '{$content}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
	  $students_set = find_all_students_of_course($course_id);
		while($students = mysqli_fetch_assoc($students_set)){
			$student = find_user_by_id($students['student_id']);
			create_notification($student['id'],$user['id'],'Has Added A News In Course.',"show_course.php?id={$course_id}");
		}
      $_SESSION["message"] = "News added";
      redirect_to("show_course.php?id={$course_id}");
    } else {
      // Failure
      $_SESSION["message"] = "Failure.";
    }
  }
}else {
	redirect_to("home.php");
}
?>

<?php include("../includes/layouts/public_header.php"); ?>
<div class="container">
	<div class="col-md-6">
		<div class="row">
			<?php echo message(); ?>
			<?php echo form_errors($errors); ?>
			<h2>Add News Form:</h2><br/>
				<form class="form-inline" role="form" action="add_news.php" method="post">
					<input type="radio" name="course_id" value="<?php if (isset($_GET["course_id"])) {echo htmlentities($_GET["course_id"]); }?>"<?php
						echo 'checked';
					?>>
					<br/>
					<div class="form-group">
						<label>Heading :</label>
						<input type="text" class="form-control" name="heading">
					</div>
					<div class="form-group">
							<label>Content:</label>
							<textarea class="form-control" name="content" rows="6" cols="30"></textarea>
					</div>
					<br/>
					<input class="btn btn-default" type="submit" name="submit" value="Submit" />
				</form>
		</div>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
