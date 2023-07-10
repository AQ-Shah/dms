<?php 

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
    if (isset($_POST['mc_validity']) && !empty($_POST['mc_validity'])) {$mc_validity = mysql_prep($_POST["mc_validity"]);} else {$mc_validity = null;}
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

?>