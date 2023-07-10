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
    include("validators/carrier_post_checker.php");

      if (empty($errors)) {
        // Perform the insertion query

      $sql = "UPDATE carrier_form SET dot='$dot', mc='$mc', b_name='$b_name', dba='$dba', b_address='$b_address', o_name='$o_name', b_number='$b_number', b_email='$b_email', b_type='$b_type', tax_id='$tax_id', mc_validity='$mc_validity', insurance_name='$insurance_name', insurance_number='$insurance_number', insurance_street='$insurance_street', insurance_state='$insurance_state', insurance_email='$insurance_email', cgl_no='$cgl_no', cgl_limit='$cgl_limit', cgl_expiration='$cgl_expiration', aml_no='$aml_no', aml_limit='$aml_limit', aml_expiration='$aml_expiration', mtc_no='$mtc_no', mtc_limit='$mtc_limit', mtc_expiration='$mtc_expiration', tic_no='$tic_no', tic_limit='$tic_limit', tic_expiration='$tic_expiration', factoring_name='$factoring_name', factoring_number='$factoring_number', factoring_street='$factoring_street', factoring_state='$factoring_state', factoring_email='$factoring_email', percentage='$percentage' WHERE id='$carrierID'";
      $result = mysqli_query($connection, $sql);

        if ($result) {
          $_SESSION["message"] = "Carrier Updated.";
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