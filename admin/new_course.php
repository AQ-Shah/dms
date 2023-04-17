<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("department_id", "title");
  validate_presences($required_fields);
 
  if (empty($errors)) {
    // Perform Create

    $department_id = mysql_prep($_POST["department_id"]);
    $teacher_id = mysql_prep($_POST["teacher_id"]);
    $title = mysql_prep($_POST["title"]);
	$start_date = mysql_prep($_POST["start_date"]);
	$end_date = mysql_prep($_POST["end_date"]);
	
	
    $query  = "INSERT INTO courses (";
    $query .= "  department_id, teacher_id, title, start_date, end_date";
    $query .= ") VALUES (";
    $query .= "  '{$department_id}', '{$teacher_id}', '{$title}', '{$start_date}', '{$end_date}'";
    $query .= ")";
	echo $query;
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Course created.";
      redirect_to("manage_departments.php");
    } else {
      // Failure
      $_SESSION["message"] = "Course creation failed.";
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
    
    <h2>Create Course</h2>
    <form action="new_course.php" method="post">
      Department ID:
     <input type="text" name="department_id" value="<?php 
		if(isset($_GET["department_id"])){
			echo $_GET["department_id"].'"'.'READONLY';
		}
		else {echo '"';}
		?>  />
    <br/>
      Teacher ID (The Respective Teacher Going to teach the course):
      <input type="text" name="teacher_id" value="" />
      <br/>
	  Title:
        <input type="text" name="title" value="" />
      <br/>
	  <p>Starting Date:
        <input type="date" name="start_date" />
	   Ending Date:
        <input type="date" name="end_date"/>
		</p>
      <input type="submit" name="submit" value="Create Course" />
    </form>
    <br />
    <a href="manage_departments.php">Cancel</a>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
