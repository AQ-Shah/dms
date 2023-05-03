<?php 

    if (isset($_GET["carrierID"])){
            if (!($form = find_carrier_form_by_id($_GET["carrierID"]))){
                $_SESSION["message"] = "Something went wrong contact system Admin";
                redirect_to("home.php");
            }
        }
        else {
            $_SESSION["message"] = "Something went wrong contact system Admin";
            redirect_to("home.php");
        }

// validations
    $required_fields = array("dot", "b_name", "mc","b_address", "percentage");
    validate_presences($required_fields);

    $carrierID = $form['id'];
    if (isset($_POST['dot'])) {$dot = mysql_prep($_POST["dot"]);} else {$dot = null;}
    if (isset($_POST['mc'])) {$mc = mysql_prep($_POST["mc"]);} else {$mc = null;}
    if (isset($_POST['b_name'])) {$b_name = mysql_prep($_POST["b_name"]);} else {$b_name = null;}
    if (isset($_POST['b_address'])) {$b_address = mysql_prep($_POST["b_address"]);} else {$b_address = null;}
    if (isset($_POST['o_name'])) {$o_name = mysql_prep($_POST["o_name"]);} else {$o_name = null;}
    if (isset($_POST['b_number'])) {$b_number = mysql_prep($_POST["b_number"]);} else {$b_number = null;}
    if (isset($_POST['dba'])) {$dba = mysql_prep($_POST["dba"]);} else {$dba = null;}
    if (isset($_POST['b_email'])) {$b_email = mysql_prep($_POST["b_email"]);} else {$b_email = null;}
    if (isset($_POST['b_type'])) {$b_type = mysql_prep($_POST["b_type"]);} else {$b_type = null;}
    if (isset($_POST['tax_id'])) {$tax_id = mysql_prep($_POST["tax_id"]);} else {$tax_id = null;}
    if (isset($_POST['truck_type'])) {$truck_type = mysql_prep($_POST["truck_type"]);} else {$truck_type = null;}
    if (isset($_POST['mc_validity']) && !empty($_POST['mc_validity'])) {$mc_validity = mysql_prep($_POST["mc_validity"]);} else {$mc_validity = null;}
    if (isset($_POST['d_name'])) {$d_name = mysql_prep($_POST["d_name"]);} else {$d_name = null;}
    if (isset($_POST['d_number'])) {$d_number = mysql_prep($_POST["d_number"]);} else {$d_number = null;}
    if (isset($_POST['t_length'])) {$t_length = mysql_prep($_POST["t_length"]);} else {$t_length = null;}
    if (isset($_POST['t_weight'])) {$t_weight = mysql_prep($_POST["t_weight"]);} else {$t_weight = null;}
    if (isset($_POST['truck_no'])) {$truck_no = mysql_prep($_POST["truck_no"]);} else {$truck_no = null;}
    if (isset($_POST['trailer_no'])) {$trailer_no = mysql_prep($_POST["trailer_no"]);} else {$trailer_no = null;}
    if (isset($_POST['insurance_name'])) {$insurance_name = mysql_prep($_POST["insurance_name"]);} else {$insurance_name = null;}
    if (isset($_POST['insurance_number'])) {$insurance_number = mysql_prep($_POST["insurance_number"]);} else {$insurance_number = null;}
    if (isset($_POST['insurance_street'])) {$insurance_street = mysql_prep($_POST["insurance_street"]);} else {$insurance_street = null;}
    if (isset($_POST['insurance_state'])) {$insurance_state = mysql_prep($_POST["insurance_state"]);} else {$insurance_state = null;}
    if (isset($_POST['insurance_email'])) {$insurance_email = mysql_prep($_POST["insurance_email"]);} else {$insurance_email = null;}
    if (isset($_POST['cgl_no'])) {$cgl_no = mysql_prep($_POST["cgl_no"]);} else {$cgl_no = null;}
    if (!empty($_POST['cgl_limit'])) {$cgl_limit = mysql_prep($_POST["cgl_limit"]);} else {$cgl_limit = 0;}
    if (!empty($_POST['cgl_expiration'])) {$cgl_expiration = mysql_prep($_POST["cgl_expiration"]);} else {$cgl_expiration = date('Y-m-d');}
    if (isset($_POST['aml_no'])) {$aml_no = mysql_prep($_POST["aml_no"]);} else {$aml_no = null;}
    if (!empty($_POST['aml_limit'])) {$aml_limit = mysql_prep($_POST["aml_limit"]);} else {$aml_limit = 0;}
    if (!empty($_POST['aml_expiration'])) {$aml_expiration = mysql_prep($_POST["aml_expiration"]);} else {$aml_expiration = date('Y-m-d');}
    if (isset($_POST['mtc_no'])) {$mtc_no = mysql_prep($_POST["mtc_no"]);} else {$mtc_no = null;}
    if (!empty($_POST['mtc_limit'])) {$mtc_limit = mysql_prep($_POST["mtc_limit"]);} else {$mtc_limit = 0;}
    if (!empty($_POST['mtc_expiration'])) {$mtc_expiration = mysql_prep($_POST["mtc_expiration"]);} else {$mtc_expiration = date('Y-m-d');}
    if (isset($_POST['tic_no'])) {$tic_no = mysql_prep($_POST["tic_no"]);} else {$tic_no = null;}
    if (!empty($_POST['tic_limit'])) {$tic_limit = mysql_prep($_POST["tic_limit"]);} else {$tic_limit = 0;}
    if (!empty($_POST['tic_expiration'])) {$tic_expiration = mysql_prep($_POST["tic_expiration"]);} else {$tic_expiration = date('Y-m-d');}
    if (isset($_POST['factoring_name'])) {$factoring_name = mysql_prep($_POST["factoring_name"]);} else {$factoring_name = null;}
    if (isset($_POST['factoring_number'])) {$factoring_number = mysql_prep($_POST["factoring_number"]);} else {$factoring_number = null;}
    if (isset($_POST['factoring_street'])) {$factoring_street = mysql_prep($_POST["factoring_street"]);} else {$factoring_street = null;}
    if (isset($_POST['factoring_state'])) {$factoring_state = mysql_prep($_POST["factoring_state"]);} else {$factoring_state = null;}
    if (isset($_POST['factoring_email'])) {$factoring_email = mysql_prep($_POST["factoring_email"]);} else {$factoring_email = null;}
    if (isset($_POST['percentage'])) {$percentage= mysql_prep($_POST["percentage"]);}

    // Sanitize inspection checkboxes
    $hazmat = isset($_POST['hazmat']) ? 1 : 0;
    $twic = isset($_POST['twic']) ? 1 : 0;
    $sida = isset($_POST['sida']) ? 1 : 0;
    $atp = isset($_POST['atp']) ? 1 : 0;



      if (empty($errors)) {
        // Perform the insertion query

      $sql = "UPDATE carrier_form SET dot='$dot', mc='$mc', b_name='$b_name', dba='$dba', b_address='$b_address', o_name='$o_name', b_number='$b_number', b_email='$b_email', b_type='$b_type', tax_id='$tax_id', truck_type='$truck_type', mc_validity='$mc_validity', d_name='$d_name', d_number='$d_number', t_length='$t_length', t_weight='$t_weight', truck_no='$truck_no', trailer_no='$trailer_no', insurance_name='$insurance_name', insurance_number='$insurance_number', insurance_street='$insurance_street', insurance_state='$insurance_state', insurance_email='$insurance_email', cgl_no='$cgl_no', cgl_limit='$cgl_limit', cgl_expiration='$cgl_expiration', aml_no='$aml_no', aml_limit='$aml_limit', aml_expiration='$aml_expiration', mtc_no='$mtc_no', mtc_limit='$mtc_limit', mtc_expiration='$mtc_expiration', tic_no='$tic_no', tic_limit='$tic_limit', tic_expiration='$tic_expiration', factoring_name='$factoring_name', factoring_number='$factoring_number', factoring_street='$factoring_street', factoring_state='$factoring_state', factoring_email='$factoring_email', percentage='$percentage', hazmat='$hazmat', twic='$twic', sida='$sida', atp='$atp' WHERE id='$carrierID'";
      $result = mysqli_query($connection, $sql);

        if ($result) {
          $_SESSION["message"] = "Carrier Updated.";
          redirect_to("list_carriers");
        } else {
          // Failure
          $_SESSION["message"] = "Carrier Update Failed : Please contact system Admin.";
        }
      }
?>