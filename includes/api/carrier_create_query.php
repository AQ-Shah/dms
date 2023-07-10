<?php 

// validations
    $required_fields = array("dot", "b_name", "mc","b_address", "percentage");
    validate_presences($required_fields);

    $creator_id = $user['id'];
    $sales_team_id = $user['team_id'];
    include("validators/carrier_post_checker.php");

    if (empty($errors)) {
      // Perform the insertion query

      $sql = "INSERT INTO carrier_form (creator_id, sales_team_id,dot, mc, b_name, dba, b_address, o_name, b_number, b_email, b_type, tax_id, mc_validity, insurance_name, insurance_number, insurance_street, insurance_state, insurance_email, cgl_no, cgl_limit, cgl_expiration, aml_no, aml_limit, aml_expiration, mtc_no, mtc_limit, mtc_expiration, tic_no, tic_limit, tic_expiration, factoring_name, factoring_number, factoring_street, factoring_state, factoring_email, percentage)
      VALUES ('$creator_id','$sales_team_id', '$dot', '$mc', '$b_name', '$dba','$b_address', '$o_name', '$b_number', '$b_email', '$b_type', '$tax_id','$mc_validity', '$insurance_name', '$insurance_number', '$insurance_street', '$insurance_state', '$insurance_email', '$cgl_no', '$cgl_limit', '$cgl_expiration', '$aml_no', '$aml_limit', '$aml_expiration', '$mtc_no', '$mtc_limit', '$mtc_expiration', '$tic_no', '$tic_limit', '$tic_expiration', '$factoring_name', '$factoring_number', '$factoring_street', '$factoring_state', '$factoring_email', '$percentage')";
      $result = mysqli_query($connection, $sql);
      if ($result) {
        $_SESSION["message"] = "New Carrier Created.";
        redirect_to("list_sales_agent_carriers");
      } else {
        // Failure
        $_SESSION["message"] = "Carrier Creation failed.";
        redirect_to("home");
      }
    }
?>