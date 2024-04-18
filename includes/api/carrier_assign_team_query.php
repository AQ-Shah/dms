<?php 
   
    
   if (isset($_POST['prev_url'])) {$prev_url = $_POST["prev_url"];} else { $prev_url = 'home';}
    
    $required_fields = array("team-id", "team-carrier-id");
    validate_presences($required_fields);
    
    if (isset($_POST['team-id'])) {$teamId = mysql_prep($_POST["team-id"]);} 
    if (isset($_POST['team-carrier-id'])) {$carrierId = mysql_prep($_POST["team-carrier-id"]);} 
    
    $carrier = find_carrier_form_by_id($carrierId);
    if (!$carrier){
        $_SESSION["message"] = "Something went wrong";
        header("Location: " . $prev_url);
        exit;
    }

    if (empty($errors)) { 
        
        $query  = "UPDATE carrier_form SET dispatch_team_id ='$teamId' WHERE id = $carrierId LIMIT 1";
        
        $result = mysqli_multi_query($connection, $query);

         if ($result) {
            // Success
            $_SESSION["message"] = "Team Assigned.";
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