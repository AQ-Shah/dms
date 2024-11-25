<?php 
  require_once("../includes/public_require.php"); 
  $current_page = "department_create";
  confirm_access($current_page);
  include("../includes/api/department_delete_query.php");     
  
  
?>