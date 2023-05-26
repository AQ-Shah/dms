<?php 
    require_once("../includes/session.php");
    require_once("../includes/config.php");
    require_once("../includes/db_connection.php");
    require_once("../includes/functions/functions.php");
    
    confirm_user_logged_in();
    $user = find_user_by_id( find_user_id());
    
?>