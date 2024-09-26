<?php 

    if (isset($_POST['prev_url'])) {$prev_url = $_POST["prev_url"];} else { $prev_url = 'home';}
    
    // validations
    $required_fields = array("truck_type", "d_name", "d_number", "trucks-carrier-id");
    validate_presences($required_fields);
    $company_id = $user['company_id'];

    include("validators/carrier_truck_post_checker.php");

    if (empty($errors)) {
      // Perform the insertion query

      $sql = "INSERT INTO trucks_info (company_id, carrier_id, truck_type, d_name, d_number, t_length, t_weight, truck_no, trailer_no, hazmat, twic, sida, atp)
      VALUES ('$company_id',''$carrier_id','$truck_type', '$d_name', '$d_number', '$t_length', '$t_weight','$truck_no', '$trailer_no', '$hazmat', '$twic', '$sida', '$atp')";
      $result = mysqli_query($connection, $sql);
      if ($result) {
        $_SESSION["message"] = "New Carrier Truck Added.";
        header("Location: " . $prev_url);
        exit;
      } else {
        // Failure
        $_SESSION["message"] = "Something went wrong.";
        redirect_to("home");
      }
    } else {
         $_SESSION["message"] = send_errors($errors);
        header("Location: " . $prev_url);
        exit;
        }
?>