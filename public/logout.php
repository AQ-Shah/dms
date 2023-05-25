<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>

<?php
	
	setcookie("id", "", time() - 3600, "/");
	setcookie("permission", "", time() - 3600, "/");
	setcookie("username", "", time() - 3600, "/");
	setcookie("full_name", "", time() - 3600, "/");
	setcookie("designation", "", time() - 3600, "/");
	
	redirect_to("login");
?>