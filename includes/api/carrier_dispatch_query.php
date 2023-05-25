<?php 
   
     if (isset($_GET['id'])) {$id = mysql_prep($_GET['id']);} else {
        $_SESSION["message"] = "Please provide valid id through the dashboard.";
        redirect_to("home");
    } 
    
    $prev_url = $_POST['prev_url'];
    
    $required_fields = array("dispatch_location","rate","delivery_datetime", "pickup_datetime");
    validate_presences($required_fields);
    
     $dispatcher_id = $user['id'];
    if (isset($_POST['dispatch_location'])) {$new_location = mysql_prep($_POST["dispatch_location"]);} 
    if (isset($_POST['delivery_datetime'])) {$delivery_time = mysql_prep($_POST["delivery_datetime"]);}
    if (isset($_POST['pickup_datetime'])) {$pickup_datetime = mysql_prep($_POST["pickup_datetime"]);}
    if (isset($_POST['rate'])) {$rate = mysql_prep($_POST["rate"]);} 
 
    $carrier = find_carrier_form_by_id($id);
    if (!$carrier){
        $_SESSION["message"] = "Carrier not found";
        header("Location: " . $prev_url);
        exit;
    }

    
    if (isset($_POST['current_location']) && !empty(trim($_POST['current_location']))) {$current_location = mysql_prep($_POST["current_location"]);} 
    else $current_location = $carrier["current_location"];

    $commission = find_commission($carrier["percentage"], $rate);

    if (empty($errors)) { 
        
        if ($carrier['status'] == 'dispatched') {
            $_SESSION["message"] = "Already Dispatched";
            header("Location: " . $prev_url);
            exit;
         } 
       
         $query = "INSERT INTO dispatch_list (carrier_id, dispatcher_id, current_location, new_location, rate, commission, delivery_time, dispatch_time) ";
         $query .= "VALUES ('" . $carrier["id"] . "', '" . $dispatcher_id ."', '" . $current_location . "', '$new_location', '$rate', '$commission','$delivery_time','$pickup_datetime'); ";
         $query  .= "UPDATE carrier_form SET status ='dispatched', current_location = '$new_location' WHERE id = $id LIMIT 1";
         
        $result = mysqli_multi_query($connection, $query);

         if ($result) {
            // Success
            $_SESSION["message"] = "Carrier Dispatched Successfully.";
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