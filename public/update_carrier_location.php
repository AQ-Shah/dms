<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "update_carrier_location";
	confirm_user_logged_in();
	$user = find_user_by_id($_SESSION["id"]);
    confirm_access($user,$current_page);

    if (isset($_POST['submit'])) {

    include("../includes/crud/carrier_location_update_query.php"); 
      
    } else {
        $_SESSION["message"] = "Please use proper form to update the location.";
        redirect_to("home");
    }
?>