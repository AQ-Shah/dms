<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "carrier_assign_team";
	
    confirm_access($current_page);

    if (isset($_POST['submit'])) {

    include("../includes/api/carrier_assign_team_query.php"); 
      
    } else {
        $_SESSION["message"] = "Please use proper form to update.";
        redirect_to("home");
    }
?>