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
        $query = "INSERT IGNORE INTO carrier_dispatcher (c_id, d_id, t_id, company_id) 
                  VALUES ('$carrierId', '$dispatcherId', '$teamId', '$companyId')";
        
        $result = mysqli_query($connection, $query);
    
        if ($result) {
            if (mysqli_affected_rows($connection) > 0) {
                $checkQuery = "SELECT dispatch_team_id 
                               FROM carrier_form 
                               WHERE id = '$carrierId' 
                               LIMIT 1";
                
                $checkResult = mysqli_query($connection, $checkQuery);
                confirm_query($checkResult);
    
                $row = mysqli_fetch_assoc($checkResult);
                $currentTeamId = $row['dispatch_team_id'];
    
                if ($currentTeamId != $teamId) {
                    $updateQuery = "UPDATE carrier_form 
                                    SET dispatch_team_id = '$teamId' 
                                    WHERE id = '$carrierId'";
                    
                    $updateResult = mysqli_query($connection, $updateQuery);
                    confirm_query($updateResult);
                    
                    $_SESSION["message"] = "Dispatcher Assigned and Team Assigned.";
                } else {
                    $_SESSION["message"] = "Dispatcher Assigned.";
                }
            } else {
                $_SESSION["message"] = "Dispatcher already assigned.";
            }
        } else {
            // Failure: INSERT query failed
            $_SESSION["message"] = "Something went wrong while assigning dispatcher.";
        }
        header("Location: " . $prev_url);
        exit;
    } else {
        // Handle errors
        $_SESSION["message"] = send_errors($errors);
        header("Location: " . $prev_url);
        exit;
    }
    
    
?>