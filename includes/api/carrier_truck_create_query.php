<?php

$prev_url = isset($_POST['prev_url']) ? $_POST['prev_url'] : 'home';

// validations
$required_fields = array("truck_type", "d_name", "d_number", "carrier-id-for-add-truck");
validate_presences($required_fields);
include("validators/carrier_truck_post_checker.php");
$company_id = $user['company_id'];
$current_carrier = find_carrier_form_by_id($carrier_id);

if ($current_carrier['company_id'] != $company_id) { 
  $_SESSION["message"] = "Something went wrong: Please contact system Admin.";
  redirect_to("home");
} 

if (empty($errors)) {
  // Perform the insertion query

  $sql = "INSERT INTO trucks_info (company_id, carrier_id, truck_type, d_name, d_number, t_length, t_weight, truck_no, trailer_no, vin_no, hazmat, twic, sida, atp, note)
      VALUES ('$company_id','$carrier_id','$truck_type', '$d_name', '$d_number', '$t_length', '$t_weight','$truck_no', '$trailer_no', '$vin_no','$hazmat', '$twic', '$sida', '$atp', '$note')";
  $result = mysqli_query($connection, $sql);
  if ($result) {
    $_SESSION["message"] = "New truck added under the carrier.";
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