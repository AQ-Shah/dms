<?php

$prev_url = isset($_POST['prev_url']) ? $_POST['prev_url'] : 'home';

// validations
echo "<script>console.log('Entered the creation');</script>";

$required_fields = array("truck_type", "d_name", "d_number", "carrier-id-for-add-truck");
validate_presences($required_fields);

echo "<script>console.log('required fields checked');</script>";

include("validators/carrier_truck_post_checker.php");

echo "<script>console.log('validator cleared');</script>";
$company_id = $user['company_id'];

echo "<script>console.log('Company id with carrier Id assigned for checking');</script>";
if ($carrier_id != $company_id) { 
  $_SESSION["message"] = "Something went wrong.";
  redirect_to("home");
} 

echo "<script>console.log('ready for query');</script>";
if (empty($errors)) {
  // Perform the insertion query

  $sql = "INSERT INTO trucks_info (company_id, carrier_id, truck_type, d_name, d_number, t_length, t_weight, truck_no, trailer_no, hazmat, twic, sida, atp, note)
      VALUES ('$company_id','$carrier_id','$truck_type', '$d_name', '$d_number', '$t_length', '$t_weight','$truck_no', '$trailer_no', '$hazmat', '$twic', '$sida', '$atp', '$note')";
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