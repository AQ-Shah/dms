<?php 
   
   if (isset($_POST['prev_url'])) {$prev_url = $_POST["prev_url"];} else { $prev_url = 'home';}
    
    $required_fields = array("dispatcher", "carrierId");
    validate_presences($required_fields);
    
    if (isset($_POST['carrierId'])) {$carrierId = mysql_prep($_POST["carrierId"]);} 
    if (isset($_POST['dispatcher'])) {$dispatcherId = mysql_prep($_POST["dispatcher"]);} 
    
    if (!find_carrier_form_by_id($carrierId)) $errors["carrier_missing"] = "Carrier Not found";
    if (!($user = find_user_by_id($dispatcherId))) $errors[$dispatcherId] =  "User Not found";
    $teamId = $user['team_id'];
    $companyId = $user['company_id'];

    if (empty($errors)) { 
        
        $query = "INSERT IGNORE INTO carrier_dispatcher (c_id, d_id, t_id, company_id) VALUES ('$carrierId', '$dispatcherId', '$teamId', '$companyId')";
        
        $result = mysqli_multi_query($connection, $query);

         if ($result) {
            // Success
            $_SESSION["message"] = "Dispatcher Assigned.";
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