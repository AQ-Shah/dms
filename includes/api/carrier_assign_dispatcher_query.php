<?php 
   
    
    $prev_url = $_POST['prev_url'];
    
    $required_fields = array("dispatcher");
    validate_presences($required_fields);
    
    if (isset($_GET['carrierId'])) {$carrierId = mysql_prep($_GET["carrierId"]);} 
    if (isset($_POST['dispatcher'])) {$dispatcherId = mysql_prep($_POST["dispatcher"]);} 
    
    $carrier = find_carrier_form_by_id($carrierId);
    if (!$carrier){
        $_SESSION["message"] = "Something went wrong";
        header("Location: " . $prev_url);
        exit;
    }

    if (empty($errors)) { 
        
        $query  = "UPDATE carrier_form SET dispatcher_id ='$dispatcherId' WHERE id = $carrierId LIMIT 1";
        
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