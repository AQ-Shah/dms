<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "department_create";
    confirm_user_logged_in();
    $user = find_user_by_id($_SESSION["id"]);
    confirm_access($user,$current_page);

    include("../includes/api/department_create_query.php"); 


?>