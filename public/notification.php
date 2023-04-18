<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_user_logged_in(); ?>


<?php 

if (isset($_GET['id'])){
	
	$user = find_user_by_id($_SESSION["id"]); 
	if ($notification = find_notification($_GET['id'])){
		
		if (!($notification['receiver_id'] === $user['id'])){
			redirect_to("home.php");
		}
		global $connection;
		$safe_id = mysqli_real_escape_string($connection,$_GET['id']);
		$query  = "UPDATE notification SET ";
		$query .= "seen = 1 ";
		$query .= "WHERE id = {$safe_id} ";
		$query .= "LIMIT 1";
		$result = mysqli_query($connection, $query);
		if ($result){
		redirect_to($notification['link']);
		}
		else {
			 $_SESSION["message"] = "Sorry there was a problem.";
			 redirect_to('home.php');
		}
	}
}
else{
	redirect_to("home.php");
}

?>