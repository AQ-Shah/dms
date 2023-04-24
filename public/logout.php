<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>

<?php
	
	$_SESSION["id"] = null;
	$_SESSION["username"] = null;
	$_SESSION["designation"] = null;
	$_SESSION["permission"] = null;
	redirect_to("login.php");
?>