<?php 
   
     if (isset($_GET['id'])) {$id = mysql_prep($_GET['id']);} else {
        $_SESSION["message"] = "Please provide valid id through the dashboard.";
        redirect_to("home");
    }
    $prev_url = $_POST['prev_url'];
    
    $required_fields = array("location");
    validate_presences($required_fields);

    $location = mysql_prep($_POST["location"]);
    $carrier = find_carrier_form_by_id($id);
    
    if (empty($errors) && $carrier) { 
        
        if ($carrier['current_location'] == $location) {
            $_SESSION["message"] = "Current Location is already ".$location;
            header("Location: " . $prev_url);
            exit;
         } 
       
        $query  = "UPDATE carrier_form SET current_location ='{$location}' ";
        $query .= "WHERE id = {$id} LIMIT 1  ";
       
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_affected_rows($connection) == 1) {
            // Success
            $_SESSION["message"] = "Location Updated.";
           header("Location: " . $prev_url);
           exit;
        } else {
            // Failure
            $_SESSION["message"] = "Location Change failed.";
            header("Location: " . $prev_url);
            exit;
            
        }
        
    } else {
        $_SESSION["message"] = "There was a problem updating the location.";
        header("Location: " . $prev_url);
        exit;
        }
    
?>