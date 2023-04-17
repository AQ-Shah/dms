<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
if (isset($_GET["id"])){
  $course = find_course_by_id($_GET["id"]);
}
else {redirect_to("admin.php");}
  if (!$course) {
    // course ID was missing or invalid or 
    // course couldn't be found in database
    redirect_to("admin.php");
  }
?>

<?php
  $students_set = find_all_students_of_course($_GET["id"]);
  $teacher_of_course = find_user_by_id($course["teacher_id"]);
  $department_of_course = find_department_by_id($course["department_id"]);
  $schedule_set = find_all_schedules_of_course($_GET["id"]);
?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
<div id="navigation">
		<br />
		<a href="manage_departments.php">&laquo; Main menu</a><br />
  </div>
  <div style ="padding-left: 20em;">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    <div style="border-style: groove;width:40%;">
    <h2>Course: <?php echo htmlentities($course["title"]); ?></h2>
    <table>
      <tr id="footer">
		<th style="text-align: left; width: 13%;">ID</th>
		<th style="text-align: left; width: 13%;">Title</th>
		<th style="text-align: left; width: 13%;">Department ID</th>
		<th style="text-align: left; width: 13%;">Starting</th>
		<th style="text-align: left; width: 13%;">Ending</th>
		
      </tr>
      <tr>
		<td><?php echo htmlentities($course["id"]); ?></td>
		<td><?php echo htmlentities($course["title"]); ?></td>
		<td><?php echo htmlentities($department_of_course["name"]); ?></td>
		<td><?php echo htmlentities($course["start_date"]); ?></td>
		<td><?php echo htmlentities($course["end_date"]); ?></td>
      </tr>
    <?php ?>
    </table>
	<br/><br/>
	<div><?php 
	if ($course["teacher_id"]==0){
		echo '<a href="assign_teacher.php?id='.$course["id"].'">Assign Teacher to the course</a>';
	}
	else {
		echo 'Teacher :'.$teacher_of_course["full_name"].'<br/> ';
		echo '<a href="assign_teacher.php?id='.$course["id"].'">Change the teacher</a>';
	}
	?> </div>
    </div>
	<div style="float: left;width: 40%; height: 100%;">
	<h2>Current Students: </h2><br/>
	<a href="new_enrollment.php?course_id=<?php echo urlencode($course["id"]); ?>">Add A New Student </a><br/><br/>
	<table>
      <tr id="footer">
        <th style="text-align: left;"> Student ID</th>
		<th style="text-align: left;">Name</th>
        <th colspan="2" style="text-align: left;">Actions</th>
      </tr>
    <?php while($students = mysqli_fetch_assoc($students_set)) { ?>
	<?php $student = find_user_by_id($students["student_id"]); ?>
      <tr>
        <td><?php echo htmlentities($student["id"]); ?></td>
		<td><?php echo htmlentities($student["full_name"]); ?></td>
        <td><a href="delete_enrollment.php?id=<?php echo urlencode($students["id"]); ?>" onclick="return confirm('Are you sure?');">Unenroll From the Course</a></td>
      </tr>
    <?php } ?>

	</table>
	</div>
	<div style="float: left;width: 40%; height: 100%;">
	<h2>Current Schedule : </h2><br/>
	<a href="new_schedule.php?course_id=<?php echo urlencode($course["id"]); ?>">Add A New Schedule </a><br/><br/>
	<table>
      <tr id="footer">
        <th style="text-align: left;"> Day</th>
		<th style="text-align: left;">starting time</th>
		<th style="text-align: left;">ending time</th>
		<th style="text-align: left;">location</th>
        <th colspan="2" style="text-align: left;">Actions</th>
      </tr>
    <?php while($schedule = mysqli_fetch_assoc($schedule_set)) { ?>
      <tr>
        <td><?php echo htmlentities($schedule["day"]); ?></td>
		<td><?php echo htmlentities($schedule["start_time"]); ?></td>
		<td><?php echo htmlentities($schedule["end_time"]); ?></td>
		<td><?php echo htmlentities($schedule["location"]); ?></td>
		<td><a href="delete_schedule.php?course_id=<?php echo urlencode($schedule["course_id"]); ?>&id=<?php echo urlencode($schedule["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
      </tr>
    <?php } ?>

	</table>
	</div>
  </div>
  </div>
<?php include("../includes/layouts/footer.php"); ?>
