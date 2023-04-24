<?php

    function check_access($current_page){
        
        $permission= $_SESSION["permission"];
        
        //permission's for admin & top management 
        if ($permission === '1' || $current_page ==='home'){
            return true;
            }
            
        //permission's for Sales & dispatch 
        if ( $permission === '5' || $permission === '10') {
            if ($current_page === 'add_news') return true;
            if ($current_page === 'settings') return true;
            if ($current_page === 'discussion_board') return true;
            if ($current_page === 'show_discussion') return true;
            if ($current_page === 'notification') return true;
            if ($current_page === 'profile') return true;
            }

        //permissions for Dispatch staff only
        if ( $permission === '5'){
            if ($current_page === 'list_carriers') return true;
            if ($current_page === 'list_dispatching') return true;
            if ($current_page === 'list_unavailable') return true;
            if ($current_page === 'update_carrier_location') return true;
            if ($current_page === 'update_carrier_status') return true;
            if ($current_page === 'dispatch_carrier') return true;
            if ($current_page === 'show_carrier') return true;
            if ($current_page === 'dispatch_stats_1') return true;
            }

        //permissions for Sales staff only
        if ( $permission === '10'){
                if ($current_page === 'new_carrier') return true;
            }
        
      return false;
    }
    
    function confirm_access($current_page) {
        if (!check_access($current_page)){
            $_SESSION["message"] = "You don't have permission for this page";
            redirect_to("home");
        }
    }


?>