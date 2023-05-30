<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "department_team_create";
    confirm_access($current_page);


    if (isset($_POST['submit'])) {

     include("../includes/api/department_team_create.php"); 
      
    } else {
        $_SESSION["message"] = "Please use proper form to update the status.";
        redirect_to("home");
    }
?>