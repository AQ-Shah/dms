<?php
	if (!$_GET["carrier_id"]) redirect_to('home');

    $safe_carrier_id = mysql_prep($_GET["carrier_id"]);

	if (($carrier = find_carrier_form_by_id($safe_carrier_id))) {
        
        $record_set_object = find_pending_invoices_by_carrier_id($safe_carrier_id);
        $record_set = array();
        
        while ($record = mysqli_fetch_assoc($record_set_object)) {
            $record_set[] = $record;
        }
        
        $total_amount = 0;
        foreach ($record_set as $record)  {  $total_amount += $record["commission"] ; } 

        if (!$total_amount) {$_SESSION["message"] = "No Pending Amount to be invoiced"; redirect_to('home');}
        
        invoice_creation_function($carrier["id"],$total_amount,date('y-m-d h:m:s', strtotime('next monday')),$record_set);

    } else {
        $_SESSION["message"] = "Carrier Not Found";
        redirect_to('home');
    }
?>