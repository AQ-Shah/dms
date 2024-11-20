<?php

$prev_url = isset($_POST['prev_url']) ? $_POST['prev_url'] : 'home';

// validations
$required_fields = array("note","carrier-id-for-truck-note-to-be-edited");
validate_presences($required_fields);

$note = mysql_prep($_POST["note"]);
$cid_truck_edit = mysql_prep($_POST["carrier-id-for-truck-note-to-be-edited"]);

$company_id = $user['company_id'];
$current_carrier = find_carrier_form_by_id($cid_truck_edit);

if ($current_carrier['company_id'] != $company_id) { 
  $_SESSION["message"] = "Something went wrong: Please contact system Admin.";
  echo $current_carrier['company_id'] ." Error report to the admin ". $company_id;
  // header("Location: " . $prev_url);
  // exit;
} 

if (empty($errors)) {
  // Perform the insertion query

  $sql = "UPDATE trucks_info 
    SET 
    note='$note'
    WHERE id='$cid_truck_edit'
    AND company_id='{$user['company_id']}'";

  $result = mysqli_query($connection, $sql);

  if ($result) {
    $_SESSION["message"] = "Truck's Note Updated.";
    header("Location: " . $prev_url);
    exit;
  } else {
    // Failure
    $_SESSION["message"] = "Note Update Failed : Please contact system Admin.";
    header("Location: " . $prev_url);
    exit;
  }
}
?>