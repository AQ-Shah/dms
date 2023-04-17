<?php 
     require_once("../includes/public_require.php"); 
    $current_page = "dispatch_carrier";
	confirm_user_logged_in();
	$user = find_user_by_id($_SESSION["id"]);
    confirm_access($user,$current_page);

    if (isset($_POST['submit'])) {

    include("../includes/crud/carrier_dispatch_query.php"); 
      
    } else {
        $_SESSION["message"] = "Please use proper form to dispatch carrier.";
        redirect_to("list_carriers");
    }
?>