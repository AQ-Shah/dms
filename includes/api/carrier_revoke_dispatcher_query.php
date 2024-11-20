<?php 
   
   if (isset($_POST['prev_url'])) {$prev_url = $_POST["prev_url"];} else { $prev_url = 'home';}
    
    $required_fields = array("dispatcher", "carrierId");
    validate_presences($required_fields);
    
    if (isset($_POST['carrierId'])) {$carrierId = mysql_prep($_POST["carrierId"]);} 
    if (isset($_POST['dispatcher'])) {$dispatcherId = mysql_prep($_POST["dispatcher"]);} 
    
    if (!find_carrier_form_by_id($carrierId)) $errors["carrier_missing"] = "Carrier Not found";
    if (!($user = find_user_by_id($dispatcherId))) $errors[$dispatcherId] =  "User Not found";
    

    if (empty($errors)) { 
        
        $query = "DELETE FROM carrier_dispatcher WHERE c_id = '$carrierId' AND d_id = '$dispatcherId' AND company_id='{$user['company_id']}'";
        
        $result = mysqli_multi_query($connection, $query);

         if ($result) {
            // Success
            $_SESSION["message"] = "Dispatcher Revoked.";
            header("Location: " . $prev_url);
            exit;
        } else {
            // Failure
            $_SESSION["message"] = "Something went wrong.";
            header("Location: " . $prev_url);
            exit;
            
        }
        
        
    } else {
        $_SESSION["message"] = send_errors($errors);
        header("Location: " . $prev_url);
        exit;
        }
    
?>