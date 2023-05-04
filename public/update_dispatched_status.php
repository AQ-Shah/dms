<?php 
     require_once("../includes/public_require.php"); 
    $current_page = "update_dispatched_status";
	
    confirm_access($current_page);

    if (isset($_POST['submit'])) {

    include("../includes/api/dispatched_status_update_query.php"); 
      
    } else {
        $_SESSION["message"] = "Something went wrong.";
        redirect_to("home");
    }
?>