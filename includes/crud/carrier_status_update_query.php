<?php 
   
     if (isset($_GET['id'])) {$id = mysql_prep($_GET['id']);} else {
        $_SESSION["message"] = "Please provide valid id through the dashboard.";
        redirect_to("home");
    }
    $prev_url = $_POST['prev_url'];
    
    $required_fields = array("status");
    validate_presences($required_fields);

    $status = mysql_prep($_POST["status"]);
    if (isset($_POST['reason'])) {$reason = mysql_prep($_POST["reason"]);} 

    if (empty($reason) && $status == "unavailable") {
       $_SESSION["message"] = "Please give reason for unavailability.";
        header("Location: " . $prev_url);
        exit;
    } 
    
    $carrier = find_carrier_form_by_id($id);
    
    if (empty($errors) && $carrier) { 
        
        if ($carrier['status'] == $status) {
            $_SESSION["message"] = "Status is already ".$status;
            header("Location: " . $prev_url);
            exit;
         } 
       
        $query  = "UPDATE carrier_form SET status ='{$status}',";
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