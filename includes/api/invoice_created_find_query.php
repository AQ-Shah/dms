<?php
	if (!$_GET["invoice_id"]) redirect_to('home');

    $safe_invoice_id = mysql_prep($_GET["invoice_id"]);

	if (($invoice = find_invoice_by_id($safe_invoice_id))) {
        $carrier = find_carrier_form_by_id($invoice["carrier_id"]);
        
        $record_set_object = find_dispatch_list_by_invoice_id($safe_invoice_id);
        $record_set = array();
        
        while ($record = mysqli_fetch_assoc($record_set_object)) {
            $record_set[] = $record;
        }
         
    } else {
        $_SESSION["message"] = "Invoice Not Found";
        redirect_to('home');
    }
?>