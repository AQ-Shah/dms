<?php 

    if (isset($form['dot'])) {$dot = $form["dot"];} else {$dot = null;}
    if (isset($form['mc'])) {$mc = $form["mc"];} else {$mc = null;}
    if (isset($form['b_name'])) {$b_name = $form["b_name"];} else {$b_name = null;}
    if (isset($form['b_address'])) {$b_address = $form["b_address"];} else {$b_address = null;}
    if (isset($form['o_name'])) {$o_name = $form["o_name"];} else {$o_name = null;}
    if (isset($form['b_number'])) {$b_number = $form["b_number"];} else {$b_number = null;}
    if (isset($form['dba'])) {$dba = $form["dba"];} else {$dba = null;}
    if (isset($form['b_email'])) {$b_email = $form["b_email"];} else {$b_email = null;}
    if (isset($form['b_type'])) {$b_type = $form["b_type"];} else {$b_type = null;}
    if (isset($form['tax_id'])) {$tax_id = $form["tax_id"];} else {$tax_id = null;}
    if (isset($form['mc_validity']) && !empty($form['mc_validity'])) {$mc_validity = $form["mc_validity"];} else {$mc_validity = null;}
    if (isset($form['insurance_name'])) {$insurance_name = $form["insurance_name"];} else {$insurance_name = null;}
    if (isset($form['insurance_number'])) {$insurance_number = $form["insurance_number"];} else {$insurance_number = null;}
    if (isset($form['insurance_street'])) {$insurance_street = $form["insurance_street"];} else {$insurance_street = null;}
    if (isset($form['insurance_state'])) {$insurance_state = $form["insurance_state"];} else {$insurance_state = null;}
    if (isset($form['insurance_email'])) {$insurance_email = $form["insurance_email"];} else {$insurance_email = null;}
    if (isset($form['cgl_no'])) {$cgl_no = $form["cgl_no"];} else {$cgl_no = null;}
    if (!empty($form['cgl_limit'])) {$cgl_limit = $form["cgl_limit"];} else {$cgl_limit = 0;}
    if (!empty($form['cgl_expiration'])) {$cgl_expiration = $form["cgl_expiration"];} else {$cgl_expiration = date('Y-m-d');}
    if (isset($form['aml_no'])) {$aml_no = $form["aml_no"];} else {$aml_no = null;}
    if (!empty($form['aml_limit'])) {$aml_limit = $form["aml_limit"];} else {$aml_limit = 0;}
    if (!empty($form['aml_expiration'])) {$aml_expiration = $form["aml_expiration"];} else {$aml_expiration = date('Y-m-d');}
    if (isset($form['mtc_no'])) {$mtc_no = $form["mtc_no"];} else {$mtc_no = null;}
    if (!empty($form['mtc_limit'])) {$mtc_limit = $form["mtc_limit"];} else {$mtc_limit = 0;}
    if (!empty($form['mtc_expiration'])) {$mtc_expiration = $form["mtc_expiration"];} else {$mtc_expiration = date('Y-m-d');}
    if (isset($form['tic_no'])) {$tic_no = $form["tic_no"];} else {$tic_no = null;}
    if (!empty($form['tic_limit'])) {$tic_limit = $form["tic_limit"];} else {$tic_limit = 0;}
    if (!empty($form['tic_expiration'])) {$tic_expiration = $form["tic_expiration"];} else {$tic_expiration = date('Y-m-d');}
    if (isset($form['factoring_name'])) {$factoring_name = $form["factoring_name"];} else {$factoring_name = null;}
    if (isset($form['factoring_number'])) {$factoring_number = $form["factoring_number"];} else {$factoring_number = null;}
    if (isset($form['factoring_street'])) {$factoring_street = $form["factoring_street"];} else {$factoring_street = null;}
    if (isset($form['factoring_state'])) {$factoring_state = $form["factoring_state"];} else {$factoring_state = null;}
    if (isset($form['factoring_email'])) {$factoring_email = $form["factoring_email"];} else {$factoring_email = null;}
    if (isset($form['percentage'])) {$percentage= $form["percentage"];}



?>