<?php

    function check_access($current_page){
        
        $permission= $_SESSION["permission"];
        
        //permission's for admin & top management 
        if ($permission === '1' || $current_page ==='home'){
            return true;
            }
            
        //permission's for Sales & Dispatch 
        if ( $permission === '4' || $permission === '5' || $permission === '9' || $permission === '10') {
            if ($current_page === 'add_news') return true;
            if ($current_page === 'settings') return true;
            if ($current_page === 'discussion_board') return true;
            if ($current_page === 'show_discussion') return true;
            if ($current_page === 'notification') return true;
            if ($current_page === 'profile') return true;
            }

        //permissions for Dispatch staff only

        //supervisor
        if ( $permission === '4'){
            if ($current_page === 'carrier_assign_dispatcher') return true;
            if ($current_page === 'dispatch_dashboard_1') return true;
            if ($current_page === 'update_dispatched_status') return true;
            if ($current_page === 'list_carriers') return true;
            if ($current_page === 'list_unavailable') return true;
            if ($current_page === 'list_dispatching') return true;
            if ($current_page === 'list_dispatched') return true;
            if ($current_page === 'list_cancelled_dispatched') return true;
            if ($current_page === 'list_working_carriers') return true;
            if ($current_page === 'update_carrier_status') return true;
            if ($current_page === 'dispatch_stats_1') return true;
            }

        if ( $permission === '4' || $permission === '5'){
            
            if ($current_page === 'list_my_carriers') return true;
            if ($current_page === 'list_my_dispatched') return true;
            if ($current_page === 'list_my_cancelled_dispatched') return true;
            if ($current_page === 'update_carrier_location') return true;
            if ($current_page === 'dispatch_carrier') return true;
            if ($current_page === 'show_carrier') return true;
            
            }

        //permissions for Sales staff only

        //supervisor
        if ( $permission === '9'){
            if ($current_page === 'list_carriers') return true;
            if ($current_page === 'carrier_update') return true;
            if ($current_page === 'show_carrier') return true;
            if ($current_page === 'sales_dashboard_1') return true;
            }

        if ( $permission === '9' || $permission === '10'){
                if ($current_page === 'carrier_create') return true;
            }
        
      return false;
    }
    
    function confirm_access($current_page) {
        if (!check_access($current_page)){
            $_SESSION["message"] = "You don't have permission for this page";
            redirect_to("home");
        }
    }

    function find_permission($department_id){
        if ($department_id === '1') return 1;
        if ($department_id === '4') return 4;
        if ($department_id === '5') return 5;
        if ($department_id === '9') return 9;
        if ($department_id === '10') return 10;
        return 10;
    }
   
    function find_designation($department_id){
        if ($department_id === '1') return 'Manager';
        if ($department_id === '4') return 'Dispatch Supervisor';
        if ($department_id === '5') return 'Dispatch Agent';
        if ($department_id === '9') return 'Sales Supervisor';
        if ($department_id === '10') return 'Sales Agent';
        return 'Not Assigned';
    }
    

?>