<?php


    function confirm_access($user,$current_page) {

    $permission=$user['permission'];
    
    if ($permission === '1' || $current_page ==='home'){
        return true;
        }
        
    if ( $permission === '5' || $permission === '10') {
        if ($current_page === 'add_news') return true;
        if ($current_page === 'settings') return true;
        if ($current_page === 'forums') return true;
        if ($current_page === 'notification') return true;
        if ($current_page === 'profile') return true;
        }
    if ( $permission === '5'){
        if ($current_page === 'list_carriers') return true;
        if ($current_page === 'list_dispatching') return true;
        if ($current_page === 'list_unavailable') return true;
        if ($current_page === 'update_carrier_location') return true;
        if ($current_page === 'update_carrier_status') return true;
        if ($current_page === 'dispatch_carrier') return true;
        if ($current_page === 'show_carrier') return true;
        }
    if ( $permission === '10'){
        if ($current_page === 'new_carrier') return true;
      }
   
        $_SESSION["message"] = "You don't have permission for this page";
        redirect_to("home");
    }


?>