<?php 
   
     if (isset($_POST['invoice-id'])) {$id = mysql_prep($_POST['invoice-id']);} else {
        $_SESSION["message"] = "Please provide valid id through the dashboard.";
        redirect_to("home");
    }
    $prev_url = $_POST['prev_url'];
    
    $required_fields = array("invoice-status");
    validate_presences($required_fields);

    $status = mysql_prep($_POST["invoice-status"]);
    
    $invoice = find_invoice_by_id($id);
    
    if (empty($errors) && $invoice) { 
        
        if ($invoice['invoice_status'] == $status) {
            $_SESSION["message"] = "Status is already the same";
            header("Location: " . $prev_url);
            exit;
         } 
       
        $query  = "UPDATE invoices SET invoice_status ='{$status}' ";
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