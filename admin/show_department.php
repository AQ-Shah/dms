<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
if (isset($_GET["id"])){
  $department = find_department_by_id($_GET["id"]);
}
else {redirect_to("manage_departments.php");}
  if (!$department) {
    // department ID was missing or invalid or 
    // department couldn't be found in database
    redirect_to("manage_departments.php");
  }
?>

  <?php 
  $record_per_page =4;
  // pagination for teacher 
  $count_query = no_of_teachers_by_department($_GET["id"]);
  $no_of_teachers = max(mysqli_fetch_assoc($count_query));
  $pages_for_teacher = ceil($no_of_teachers/$record_per_page);
  $teachers_page = (isset ($_GET['teachers_page'])) ? (int)$_GET['teachers_page'] : 1 ;
  $teachers_start = ($teachers_page-1) * $record_per_page;
  $teachers_set = find_teachers_by_department($_GET["id"],$teachers_start,$record_per_page);
// pagination for course
	$count_query = no_of_courses_by_department($_GET["id"]);
	$no_of_courses = max(mysqli_fetch_assoc($count_query));
	$pages_for_course = ceil($no_of_courses/$record_per_page);
	$courses_page = (isset ($_GET['courses_page'])) ? (int)$_GET['courses_page'] : 1 ;
	$courses_start = ($courses_page-1) * $record_per_page;
	$courses_set = find_courses_by_department($_GET["id"],$courses_start,$record_per_page);
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
    <h2>Department: <?php echo htmlentities($department["name"]); ?></h2>
    <table>
      <tr id="footer">
		<th style="text-align: left; width: 20%;">Email</th>
		<th style="text-align: left; width: 20%;">Website</th>
      </tr>
      <tr>
		<td><?php echo htmlentities($department["email"]); ?></td>
		<td><?php echo htmlentities($department["website"]); ?></td>
      </tr>
    <?php ?>
    </table>
    <br />
    </div>
	<div style="float: left;width: 40%; height: 100%;">
	<h2>Teachers: </h2><br/>
	<a href="new_user.php?department_id=<?php echo urlencode($department["id"]); ?>">Add A New Teacher </a><br/><br/>
	<table>
      <tr id="footer">
        <th style="text-align: left;"> ID</th>
		<th style="text-align: left;">Name</th>
        <th colspan="2" style="text-align: left;">Actions</th>
      </tr>
    <?php while($teacher = mysqli_fetch_assoc($teachers_set)) { ?>
      <tr>
        <td><?php echo htmlentities($teacher["id"]); ?></td>
		<td><?php echo htmlentities($teacher["full_name"]); ?></td>
        <td><a href="show_user.php?id=<?php echo urlencode($teacher["id"]); ?>">show</a></td>
		<td><a href="edit_user.php?id=<?php echo urlencode($teacher["id"]); ?>">Edit</a></td>
        <td><a href="delete_user.php?id=<?php echo urlencode($teacher["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
      </tr>
    <?php } ?>
    </table><br/>
	 <?php 
	 if ($pages_for_teacher>=1 && $teachers_page <= $pages_for_teacher){
		 for ($x=1;$x<=$pages_for_teacher;$x++){
			echo '<a href="show_department.php?id='.$_GET["id"].'&teachers_page='.$x;
			 if(isset($_GET["courses_page"])){
				 echo '&courses_page='.$_GET["courses_page"];
			 }
			 echo '">'.$x.'</a> ';
			}
	 }
	 ?>
	
	
	</div>
	<div style="float: left;width: 40%; height: 100%;">
	<h2>Courses: </h2><br/>
	<a href="new_course.php?department_id=<?php echo urlencode($department["id"]); ?>">Add A New Course </a><br/><br/>
	<table>
      <tr id="footer">
        <th style="text-align: left;"> ID</th>
		<th style="text-align: left;">Title</th>
        <th colspan="2" style="text-align: left;">Actions</th>
      </tr>
    <?php while($course = mysqli_fetch_assoc($courses_set)) { ?>
      <tr>
        <td><?php echo htmlentities($course["id"]); ?></td>
		<td><?php echo htmlentities($course["title"]); ?></td>
        <td><a href="show_course.php?id=<?php echo urlencode($course["id"]); ?>">show</a></td>
		<td><a href="edit_course.php?id=<?php echo urlencode($course["id"]); ?>">Edit</a></td>
        <td><a href="delete_course.php?id=<?php echo urlencode($course["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
      </tr>
    <?php } ?>
    </table>
	 <?php 
	 if ($pages_for_course>=1 && $courses_page <= $pages_for_course){
		 for ($x=1;$x<=$pages_for_course;$x++){
			 echo '<a href="show_department.php?id='.$_GET["id"].'&courses_page='.$x;
			 if(isset($_GET["teachers_page"])){
				 echo '&teachers_page='.$_GET["teachers_page"];
			 }
			 echo '">'.$x.'</a> ';
		 }
	 }
	 ?>
	</div>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
