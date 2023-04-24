<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "department_edit";
   confirm_access($current_page);

    include("../includes/api/department_edit_query.php"); 

?>