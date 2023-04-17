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
  
  if (isset($_POST["teacher_id"])){
	
	if ($_POST["teacher_id"]){
			$teacher = find_user_by_id($_POST["teacher_id"]);
	}
	if ($teacher["is_teacher"]== 0 ){
		redirect_to("assign_teacher.php?id={$course["id"]}");
	}
}

if ( (isset($_POST["department"]) )){
	$department_of_query = find_department_by_name($_POST["department"]);
	if ($department_of_query){
		// pagination for teacher 
		$record_per_page =4;
		$count_query = no_of_teachers_by_department($department_of_query["id"]);
		$no_of_teachers = max(mysqli_fetch_assoc($count_query));
		$pages_for_teacher = ceil($no_of_teachers/$record_per_page);
		$teachers_page = (isset ($_GET['teachers_page'])) ? (int)$_GET['teachers_page'] : 1 ;
		$teachers_start = ($teachers_page-1) * $record_per_page;
		$teachers_set = find_teachers_by_department($department_of_query["id"],$teachers_start,$record_per_page);
	}
	else {
		redirect_to("assign_teacher.php?id={$course["id"]}");
	}
}
elseif  ( (isset($_GET["department"]) )){
	$department_of_query = find_department_by_name($_GET["department"]);
	if ($department_of_query){
		// pagination for teacher 
		$record_per_page =4;
		$count_query = no_of_teachers_by_department($department_of_query["id"]);
		$no_of_teachers = max(mysqli_fetch_assoc($count_query));
		$pages_for_teacher = ceil($no_of_teachers/$record_per_page);
		$teachers_page = (isset ($_GET['teachers_page'])) ? (int)$_GET['teachers_page'] : 1 ;
		$teachers_start = ($teachers_page-1) * $record_per_page;
		$teachers_set = find_teachers_by_department($department_of_query["id"],$teachers_start,$record_per_page);
	}
	else {
		redirect_to("assign_teacher.php?id={$course["id"]}");
	}
}
?>

<?php
  $teacher_of_course = find_user_by_id($course["teacher_id"]);
  if ((!isset($_POST["department"]))&& (!isset($_GET["department"]) )  ){
	  // pagination for teacher 
		$record_per_page =4;
		$count_query = no_of_teachers();
		$no_of_teachers = max(mysqli_fetch_assoc($count_query));
		$pages_for_teacher = ceil($no_of_teachers/$record_per_page);
		$teachers_page = (isset ($_GET['teachers_page'])) ? (int)$_GET['teachers_page'] : 1 ;
		$teachers_start = ($teachers_page-1) * $record_per_page;
		$teachers_set = find_all_teachers_from($teachers_start,$record_per_page);
  }
  $department_of_course = find_department_by_id($course["department_id"]);
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
			</table>
		</div>
		<div style="float: left;width: 40%; height: 100%;">
			<br/>
			<form action="assign_teacher.php?id=<?php echo urlencode($course["id"]); ?>" method="post">
				Search by ID:
				<input type="text" name="teacher_id" value=""/>
				<input type="submit" name="submit" value="Search" />
			</form>
			<br/>
			<form action="assign_teacher.php?id=<?php echo urlencode($course["id"]); ?>" method="post">     
				Search by Department:
				<input type="text" name="department" value=""/>
				<input type="submit" name="submit" value="Search" />
			</form>
			<h2> Teachers: </h2><br/>
			<table>
				<tr id="footer">
					<th style="text-align: left;"> Teachers ID</th>
					<th style="text-align: left;">Name</th>
					<th style="text-align: left;">Department</th>
					<th colspan="2" style="text-align: left;">Actions</th>
				</tr>
				<?php if(!isset($_POST["teacher_id"])) { while($teachers = mysqli_fetch_assoc($teachers_set)) { ?>
				<?php $department_of_teacher = find_department_by_id($teachers["department_id"]);?> 
				<tr>
					<td><?php echo htmlentities($teachers["id"]); ?></td>
					<td><?php echo htmlentities($teachers["full_name"]); ?></td>
					<td><?php echo htmlentities($department_of_teacher["name"]); ?></td>
					<td><a href="conform_assign_teacher.php?teacher_id=<?php echo urlencode($teachers["id"]); ?>&course_id=<?php echo urlencode($course["id"]); ?>" onclick="return confirm('Are you sure?');">Assign to the Course</a></td>
				</tr>
				<?php } }
				else {?>
					<?php $department_of_teacher = find_department_by_id($teacher["department_id"]);?> 
				<tr>
					<td><?php echo htmlentities($teacher["id"]); ?></td>
					<td><?php echo htmlentities($teacher["full_name"]); ?></td>
					<td><?php echo htmlentities($department_of_teacher["name"]); ?></td>
					<td><a href="conform_assign_teacher.php?teacher_id=<?php echo urlencode($teacher["id"]); ?>&course_id=<?php echo urlencode($course["id"]); ?>" onclick="return confirm('Are you sure?');">Assign to the Course</a></td>
				</tr>
				<?php } ?>
	</div>
			</table><br/>
			<?php 
				if (isset( $pages_for_teacher))
				if ($pages_for_teacher>=1 && $teachers_page <= $pages_for_teacher){
					for ($x=1;$x<=$pages_for_teacher;$x++){
						echo '<a href="assign_teacher.php?id='.$_GET["id"];
						if (isset ($_POST["department"])){
							echo '&department='.$_POST["department"];
						}
						elseif (isset ($_GET["department"])){
							echo '&department='.$_GET["department"];
						}
						echo '&teachers_page='.$x.'">'.$x.'</a> ';
					}		
				}
			?>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>

    