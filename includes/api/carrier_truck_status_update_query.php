<?php 
   
    if (isset($_POST['prev_url'])) {$prev_url = $_POST["prev_url"];} else { $prev_url = 'home';}
    
    $required_fields = array("carrier_id", "carrier_truck_status");
    validate_presences($required_fields);

    $status = mysql_prep($_POST["carrier_truck_status"]);
    if (isset($_POST['reason'])) {$reason = mysql_prep($_POST["reason"]);} 

    if (empty($reason) && ($status != 3 || $status != 4)) {
       $_SESSION["message"] = "Please give reason for unavailability.";
        header("Location: " . $prev_url);
        exit;
    } 

    if ($status != 1 || $status != 3 || $status != 4) {
        echo $status;
        $_SESSION["message"] = "Please Select right option.";
         header("Location: " . $prev_url);
        // exit;
     } 
    
    $truck = find_truck_by_id($id);
    
    if (empty($errors) && $truck) { 
        
        if ($truck['truck_load_status'] == $status) {
            $_SESSION["message"] = "Status is already same";
            header("Location: " . $prev_url);
            exit;
         } 

       
        $query  = "UPDATE truck_info SET truck_load_status ='{$status}',";
        $query .= "status_change_reason ='{$reason}' ";
        $query .= "WHERE id = {$id} LIMIT 1  ";
       
        $result = mysqli_query($connection, $query);

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