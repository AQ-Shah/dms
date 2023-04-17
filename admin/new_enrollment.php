<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  if (isset($_POST['course_id'])){
	  $course = find_course_by_id($_POST['course_id']);
  }
  elseif (isset($_POST['student_id'])){
	  $student = find_student_by_id($_POST['student_id']);
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
			if (isset($_GET["student_id"])){
			$student = find_student_by_id($_GET["student_id"]);
			?>
				<div style="border-style: groove;width:60%;">
				<h2>Student: <?php echo htmlentities($student["full_name"]); ?></h2>
				<table>
					<tr id="footer">
						<th style="text-align: left; width: 200px;">ID</th>
						<th style="text-align: left; width: 200px;">Name</th>		
					</tr>
					<tr>
						<td><?php echo htmlentities($student["id"]); ?></td>
						<td><?php echo htmlentities($student["full_name"]); ?></td>
					</tr>
				</table>
				</div>
		<div>
			<form action="new_enrollment.php?student_id=<?php echo urlencode($student["id"]); ?>" method="post">
				Search Course by ID:
				<input type="text" name="course_id" value=""/>
				<input type="submit" name="submit" value="Search" />
			</form>
			<br/>
				<?php if(isset($course)) { ?>
			<h2> Courses: </h2><br/>
			<table>
				<tr id="footer">
					<th style="text-align: left;"> Course ID</th>
					<th style="text-align: left;">Title</th>
					<th style="text-align: left;">Department</th>
					<th colspan="2" style="text-align: left;">Actions</th>
				</tr>
				
				<tr>
					<td><?php echo htmlentities($course["id"]); ?></td>
					<td><?php echo htmlentities($course["title"]); ?></td>
					<td><?php echo htmlentities($course["department_id"]); ?></td>
					<td><a href="enroll.php?course_id=<?php echo urlencode($course["id"]); ?>&student_id=<?php echo urlencode($student["id"]); ?>" onclick="return confirm('Are you sure?');">Enroll to the Course</a></td>
				</tr>
			</table>
				<?php } ?>
		</div>
	 <?php } ?>
			
		<?php 
			if (isset($_GET["course_id"])){
			$course = find_course_by_id($_GET["course_id"]);
			?>
				<div style="border-style: groove;width:60%;">
				<h2>Course: <?php echo htmlentities($course["title"]); ?></h2>
				<table>
					<tr id="footer">
						<th style="text-align: left; width: 200px;">ID</th>
						<th style="text-align: left; width: 200px;">Title</th>		
					</tr>
					<tr>
						<td><?php echo htmlentities($course["id"]); ?></td>
						<td><?php echo htmlentities($course["title"]); ?></td>
					</tr>
				</table>
				</div>
		<div>
			<form action="new_enrollment.php?course_id=<?php echo urlencode($course["id"]); ?>" method="post">
				Search Student by ID:
				<input type="text" name="student_id" value=""/>
				<input type="submit" name="submit" value="Search" />
			</form>
			<br/>
			<h2> Students: </h2><br/>
			<table>
				<tr id="footer">
					<th style="text-align: left;"> Student ID</th>
					<th style="text-align: left;">Name</th>
					<th colspan="2" style="text-align: left;">Actions</th>
				</tr>
				<?php if(isset($_POST["student_id"])) { ?>
				
				<tr>
					<td><?php echo htmlentities($student["id"]); ?></td>
					<td><?php echo htmlentities($student["full_name"]); ?></td>
					<td><a href="enroll.php?course_id=<?php echo urlencode($course["id"]); ?>&student_id=<?php echo urlencode($student["id"]); ?>" onclick="return confirm('Are you sure?');">Enroll to the Course</a></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	 <?php } ?>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
