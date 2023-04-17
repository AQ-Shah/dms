<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_user_logged_in(); ?>
<?php 
$user = find_user_by_id($_SESSION["id"]); 
if (!($is_teacher = $user['is_teacher'])){
		redirect_to("home.php");
	}
$current_page = "";

if (isset ($_GET["course_id"])){
	if (!($course = find_course_by_id($_GET["course_id"]))){
		redirect_to("home.php");
	}
	$course = find_course_by_id($_GET["course_id"]);
	$teacher = find_user_by_id($course["teacher_id"]);
	if (!($teacher["id"] === $_SESSION["id"])){
		redirect_to("home.php");
	}
	$department = find_department_by_id($course["department_id"]);
	}
else {
		redirect_to("home.php");
} 
if (isset ($_FILES['upload']) === true){
	$file = $_FILES['upload'];
	$file_name = $file['name'][0];
	$tmp_name = $file['tmp_name'][0];
	$allowed_ext = allowed_ext();
	$file_ext = explode('.', $file_name);
	$file_ext = strtolower(array_pop($file_ext));
	
	if (!(in_array($file_ext , $allowed_ext) === false)){
		if ($file['size'][0] <= 31457280 ){
			if ( $file['error'][0] == 0 ) {
				
				
				if (empty($errors)) {
					// Perform Create
	
					$course_id = mysql_prep($course["id"]);
					$uploader = mysql_prep($teacher["id"]);
					$file_name = mysql_prep($file_name);
					$dateTime = dateTime_to_string(new DateTime());
					$path_name = $course_id.'-'.$uploader.'-'.$dateTime.'-'.remove_spaces($file_name);
					$path = mysql_prep($path_name);
					$upload_date = date("Y-m-d");
					$upload_time = date('H:i:s');
					$query  = "INSERT INTO file_library (";
					$query .= "  course_id, uploader, name, path, upload_date, upload_time ";
					$query .= ") VALUES (";
					$query .= "  '{$course_id}', '{$uploader}', '{$file_name}', '{$path}', '{$upload_date}', '{$upload_time}'";
					$query .= ")";
					$result = mysqli_query($connection, $query);
					
					if ($result) {
						// Success
						move_uploaded_file($tmp_name,'files/'.$path_name);
						
						$students_set = find_all_students_of_course($course_id);
						while($students = mysqli_fetch_assoc($students_set)){
							$student = find_user_by_id($students['student_id']);
							create_notification($student['id'],$user['id'],'Has Added A New File In the Course.',"show_course.php?id={$course_id}");
						}
						$_SESSION["message"] = "File Uploaded";
						redirect_to("show_course.php?id={$course_id}");
					} else {
					// Failure
						$_SESSION["message"] = "Could Not Upload The File";
					}
				}	
			}
		}
		else {
			$_SESSION["message"] = "File Too Large (Please make sure file is less then 30mb)";
		}
	}
	else {
		if (!$file_ext){
			$_SESSION["message"] = "Please Select A File";
		}
		else{
		$_SESSION["message"] = "File Extension Not Allowed";
		}
	}
}
?>

<?php include("../includes/layouts/public_header.php"); ?>
<div class="container">
	<div class="col-md-6">
	<?php echo message(); ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><?php echo "Upload File";?></h3>
			</div>
			<div class="panel-body">	
				<form acion="" method="post" enctype="multipart/form-data">
					<input type="file" name="upload[]">
					<input type="submit" name="upload">
				</form>
				<h5>NOTE :</h5>
				<h5>File Should Not Be More Then 30mb</h5>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		</div>
		<div class="col-md-3">
			<div class="row">
				<?php 
					if (isset($course))
						echo '<a href="show_course.php?id='.$course["id"].'"><button type="button" class="btn btn-link">Back to Course</button></a>';
					
				?>
			</div>
</div>
</div>
<?php include("../includes/layouts/public_footer.php"); ?>
