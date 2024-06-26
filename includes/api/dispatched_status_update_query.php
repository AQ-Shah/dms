<?php 
   
   if (isset($_POST['prev_url'])) {$prev_url = $_POST["prev_url"];} else { $prev_url = 'home';}
    
    $required_fields = array("dispatched-status", "carrier-id","dispatch-id");
    validate_presences($required_fields);

    $status = mysql_prep($_POST["dispatched-status"]);
    $carrierId = mysql_prep($_POST["carrier-id"]);
    $dispatchedId = mysql_prep($_POST["dispatch-id"]);

    $dispatched = find_dispatch_list_by_id($dispatchedId);
    
    if (empty($errors) && $dispatched) { 
        
        $carrier = find_carrier_form_by_id($carrierId);
        
        $truckId =  $dispatched['truck_id'];
        if ($dispatched['status'] == $status) {
            $_SESSION["message"] = "Status is already ".$status;
            header("Location: " . $prev_url);
            exit;
         } 

        if ($dispatched['invoice_status'] == 2 || $dispatched['invoice_status'] == 3) {
            $_SESSION["message"] = "Invoice is already Generated, Please contact Finance ";
            header("Location: " . $prev_url);
            exit;
         }

        
        $query  = "UPDATE dispatch_list SET status ='{$status}'";
        $query .= "WHERE id = {$dispatchedId} LIMIT 1; ";
        if ($status == 'Completed') 
            $query  .= "UPDATE dispatch_list SET invoice_status = 1 WHERE id = $dispatchedId LIMIT 1;";
        if ($status == 'Dispatched') 
            $query  .= "UPDATE dispatch_list SET invoice_status = 0 WHERE id = $dispatchedId LIMIT 1;";  
        if ($status == 'Cancelled') 
            $query  .= "UPDATE dispatch_list SET invoice_status = 0 WHERE id = $dispatchedId LIMIT 1;";

        if ($status == 'Cancelled' || $status == 'Completed') 
            $query  .= "UPDATE trucks_info SET truck_load_status = 1 WHERE id = $truckId LIMIT 1;";
        if ($status == 'Dispatched') 
            $query  .= "UPDATE trucks_info SET truck_load_status = 2 WHERE id = $truckId LIMIT 1;";
            
        if ($carrier['sale_activation_dispatch_id'] == $dispatchedId && $status == 'Cancelled') 
         $query  .= "UPDATE carrier_form SET sale_activation_dispatch_id = 0, sale_active =0 WHERE id = $carrierId LIMIT 1";
         
        $result = mysqli_multi_query($connection, $query);

        if ($result && mysqli_affected_rows($connection) == 1) {
            // Success
            $_SESSION["message"] = "Status updated.";
           header("Location: " . $prev_url);
           exit;
        } else {
            // Failure
            $_SESSION["message"] = "Status Update failed.";
            header("Location: " . $prev_url);
            exit;
            
        }
        
    } else {
        $_SESSION["message"] = "There was a problem updating the status.";
        header("Location: " . $prev_url);
        exit;
        }
    
?>