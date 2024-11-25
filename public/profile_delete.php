<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "profile_delete";
    confirm_access($current_page);
    include("../includes/api/profile_delete.php"); 
?>