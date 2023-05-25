<?php 
   
    $prev_url = $_POST['prev_url'];
    
    $required_fields = array("dispatched-status", "carrier-id","dispatch-id");
    validate_presences($required_fields);

    $status = mysql_prep($_POST["dispatched-status"]);
    $carrierId = mysql_prep($_POST["carrier-id"]);
    $dispatchedId = mysql_prep($_POST["dispatch-id"]);

    $dispatched = find_dispatch_list_by_id($dispatchedId);
    
    if (empty($errors) && $dispatched) { 
        
        if ($dispatched['status'] == $status) {
            $_SESSION["message"] = "Status is already ".$status;
            header("Location: " . $prev_url);
            exit;
         } 
       
        $query  = "UPDATE dispatch_list SET status ='{$status}'";
        $query .= "WHERE id = {$dispatchedId} LIMIT 1; ";
        $query  .= "UPDATE carrier_form SET status ='available' WHERE id = $carrierId LIMIT 1";
         
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