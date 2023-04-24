<?php 
    require_once("../includes/session.php");
    require_once("../includes/db_connection.php");
    
    require_once("../includes/functions/functions.php");
    $user = find_user_by_id($_SESSION["id"]);
    confirm_user_logged_in();
    
?>