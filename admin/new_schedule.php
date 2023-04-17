<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("course_id");
  validate_presences($required_fields);
 
  if (empty($errors)) {
    // Perform Create

    $course_id = mysql_prep($_POST["course_id"]);
    $day = mysql_prep($_POST["day"]);
	$location = mysql_prep($_POST["location"]);
	$start_time = mysql_prep($_POST["start_time"]);
	$end_time = mysql_prep($_POST["end_time"]);
	
	
    $query  = "INSERT INTO schedule_class (";
    $query .= "  course_id, location, day, start_time, end_time";
    $query .= ") VALUES (";
    $query .= "  '{$course_id}', '{$location}', '{$day}', '{$start_time}', '{$end_time}'";
    $query .= ")";
	echo $query;
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Course scheduled.";
      redirect_to("manage_departments.php");
    } else {
      // Failure
      $_SESSION["message"] = "Course schduling failed.";
    }
  }
}
?>

<?php include("../includes/layouts/header.php"); ?>
<div id="main">
	<div id="navigation">
		&nbsp;
	</div>
	<div id="page">
		<?php echo message(); ?>
		<?php echo form_errors($errors); ?>
		<?php 
			if (isset($_GET["course_id"])){
			$course = find_course_by_id($_GET["course_id"]);
			?>
				<div style="border-style: groove;width:60%;">
				<h2>Course: <?php echo htmlentities($course["title"]); ?></h2>
				<table>
					<tr id="footer">
						<th style="text-align: left; width: 200px;">ID</th>
						<th style="text-align: left; width: 200px;">Name</th>		
					</tr>
					<tr>
						<td><?php echo htmlentities($course["id"]); ?></td>
						<td><?php echo htmlentities($course["title"]); ?></td>
					</tr>
				</table>
				</div>
		<div>
				
			<h2>New Schedule </h2>
			<form action="new_schedule.php?course_id=<?php echo urlencode($course["id"]); ?>" method="post">
				Course ID:
				<input type="text" name="course_id" value="<?php echo $course["id"];?>" READONLY/>
				<br/>
				Day:
				<input type="radio" name="day" value="monday" checked> Monday
				<input type="radio" name="day" value="tuesday"> Tuesday
				<input type="radio" name="day" value="wednesday" > Wednesday
				<input type="radio" name="day" value="thursday" > Thursday
				<input type="radio" name="day" value="friday" > Friday <br>
				<input type="radio" name="day" value="saturday"> saturday
				<input type="radio" name="day" value="sunday"> sunday
				<br/>
				Location:
				<input type="text" name="location" value=""/>
				<br/>
				<p>Starting time:
				<input type="time" name="start_time" />
				Ending time:
				<input type="time" name="end_time"/>
				</p>
				<input type="submit" name="submit" value="Schedule Class" />
			</form>
			<br/>
		</div>
	 <?php } ?>
		
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
