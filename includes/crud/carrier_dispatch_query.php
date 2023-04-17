<?php 
   
     if (isset($_GET['id'])) {$id = mysql_prep($_GET['id']);} else {
        $_SESSION["message"] = "Please provide valid id through the dashboard.";
        redirect_to("home");
    } 
    
    $prev_url = $_POST['prev_url'];
    
    $required_fields = array("location","rate","date","time");
    validate_presences($required_fields);
    
    if (isset($_POST['location'])) {$new_location = mysql_prep($_POST["location"]);} else {$new_location = "";}
    if (isset($_POST['date'])) {$delivery_date = mysql_prep($_POST["date"]);} else {$delivery_date = "";}
    if (isset($_POST['time'])) {$delivery_time = mysql_prep($_POST["time"]);} else {$delivery_time = "";}
    if (isset($_POST['rate'])) {$rate = mysql_prep($_POST["rate"]);} else {$rate = "";}
    
    $carrier = find_carrier_form_by_id($id);
    if (!$carrier){
        $_SESSION["message"] = "Carrier not found";
        header("Location: " . $prev_url);
        exit;
    }
    if (empty($errors)) { 
        
        if ($carrier['status'] == 'dispatched') {
            $_SESSION["message"] = "Already Dispatched";
            header("Location: " . $prev_url);
            exit;
         } 
       
         $query = "INSERT INTO dispatch_list (carrier_id, current_location, new_location, rate, delivery_time, delivery_date) ";
         $query .= "VALUES ('" . $carrier["id"] . "', '" . $carrier["current_location"] . "', '$new_location', '$rate', '$delivery_time', '$delivery_date'); ";
         $query  .= "UPDATE carrier_form SET status ='dispatched', current_location = '$new_location' WHERE id = $id LIMIT 1";
        $result = mysqli_multi_query($connection, $query);

        echo $query;
         if ($result) {
            // Success
            $_SESSION["message"] = "Carrier Dispatched Successfully.";
            echo 'here';
            header("Location: " . $prev_url);
            exit;
        } else {
            // Failure
            $_SESSION["message"] = "Dispatch failed.";
            header("Location: " . $prev_url);
            exit;
            
        }
        
        
    } else {
        $_SESSION["message"] = send_errors($errors);
        header("Location: " . $prev_url);
        exit;
        }
    
?>