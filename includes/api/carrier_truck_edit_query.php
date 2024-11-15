<?php

$prev_url = isset($_POST['prev_url']) ? $_POST['prev_url'] : 'home';

// validations
$required_fields = array("truck_type", "d_name", "d_number", "carrier-id-for-add-truck");
validate_presences($required_fields);
include("validators/carrier_truck_post_checker.php");

$carrier = find_carrier_by_id($carrier_id);
$company_id = $user['company_id'];

if ($carrier['company_id'] != $company_id) { 
  $_SESSION["message"] = "Something went wrong.";
  redirect_to("home");
} 


if (empty($errors)) {
  // Perform the insertion query

  $sql = "UPDATE trucks_info 
    SET 
    truck_type='$truck_type', 
    d_name='$d_name',
    d_number='$d_number',
    t_length='$t_length',
    t_weight='$t_weight',
    truck_no='$truck_no',
    trailer_no='$trailer_no',
    note='$note',
    hazmat='$hazmat',
    twic='$twic',
    sida='$sida',
    atp='$atp' WHERE id='$carrier_id'";
    
  $result = mysqli_query($connection, $sql);

  if ($result) {
    $_SESSION["message"] = "Carrier's Truck Updated.";
    if ($user['permission'] == 9) {
      redirect_to('list_sales_team_carriers');
    }
    redirect_to("list_carriers");
  } else {
    // Failure
    $_SESSION["message"] = "Carrier Update Failed : Please contact system Admin.";
  }
}
?>