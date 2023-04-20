<?php 
     require_once("../includes/public_require.php"); 
    $current_page = "update_carrier_status";
	confirm_user_logged_in();
	$user = find_user_by_id($_SESSION["id"]);
    confirm_access($user,$current_page);

    if (isset($_POST['submit'])) {

    include("../includes/api/carrier_status_update_query.php"); 
      
    } else {
        $_SESSION["message"] = "Please use proper form to update the status.";
        redirect_to("home");
    }
?>