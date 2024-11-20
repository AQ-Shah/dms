<?php 
    if (isset($_POST['prev_url'])) {$prev_url = $_POST["prev_url"];} else { $prev_url = 'home';}
    
    $required_fields = array("location", "truck-id-for-move");
    validate_presences($required_fields);

    $location = mysql_prep($_POST["location"]);
    $truckId = mysql_prep($_POST["truck-id-for-move"]);
    $truck = find_truck_by_id($truckId);
    
    if (empty($errors) && $truck) { 
        
        if ($truck['current_location'] == $location) {
            $_SESSION["message"] = "Current Location is already ".$location;
            header("Location: " . $prev_url);
            exit;
         } 
       
        $query  = "UPDATE trucks_info SET current_location ='{$location}' ";
        $query .= "WHERE id = {$truckId}  ";
        $query .= "AND company_id='{$user['company_id']}' LIMIT 1 ";       
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_affected_rows($connection) == 1) {
            // Success
            $_SESSION["message"] = "Location Updated.";
           header("Location: " . $prev_url);
           exit;
        } else {
            // Failure
            $_SESSION["message"] = "Location Change failed. ";
            header("Location: " . $prev_url);
            exit;
            
        }
        
    } else {
        $_SESSION["message"] = "There was a problem updating the location.";
        header("Location: " . $prev_url);
        exit;
        }
    
?>