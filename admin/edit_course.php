<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
if($_GET["id"]){
  $course = find_course_by_id($_GET["id"]);
}
else
	redirect_to("manage_departments.php");
  if (!$course) {
    // course ID was missing or invalid or 
    // course couldn't be found in database
    redirect_to("manage_departments.php");
  }
?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
 $required_fields = array("department_id", "title");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Perform Create
	$id = $_GET["id"];
	$department_id = mysql_prep($_POST["department_id"]);
    $teacher_id = mysql_prep($_POST["teacher_id"]);
    $title = mysql_prep($_POST["title"]);
	$start_date = mysql_prep($_POST["start_date"]);
	$end_date = mysql_prep($_POST["end_date"]);
	
     $query  = "UPDATE courses SET department_id = '{$department_id}', ";
	$query .= "teacher_id ='{$teacher_id}',";
	$query .= "title ='{$title}',";
	$query .= "start_date ='{$start_date}',";
	$query .= "end_date ='{$end_date}' ";
	$query .= "WHERE id = {$id} LIMIT 1  ";
    
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Course updated.";
      redirect_to("manage_departments.php");
    } else {
      // Failure
      $_SESSION["message"] = "Course update failed.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Edit Course: <?php echo htmlentities($course["title"]); ?></h2>
    <form action="edit_course.php?id=<?php echo urlencode($course["id"]); ?>" method="post">
     
	  Department ID:
        <input type="text" name="department_id" value="<?php echo htmlentities($course["department_id"]); ?>"/>
       <br/>
      Teacher ID (The Respective Teacher Going to teach the course):
      <input type="text" name="teacher_id" value="<?php echo htmlentities($course["teacher_id"]); ?>" />
      <br/>
	  Title:
        <input type="text" name="title" value="<?php echo htmlentities($course["title"]); ?>" />
      <br/>
	  <p>Starting Date:
        <input type="date" name="start_date" value="<?php echo htmlentities($course["start_date"]); ?>"/>
	   Ending Date:
        <input type="date" name="end_date"value="<?php echo htmlentities($course["end_date"]); ?>"/>
		</p>
      <input type="submit" name="submit" value="Edit Course" />
    </form>
	
    <br />
    <a href="manage_departments.php">Cancel</a>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
