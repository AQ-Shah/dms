<?php

    include("../includes/api/invoice_find_query.php"); 
    invoice_creation_function($carrier["id"], $total_amount, date('y-m-d h:m:s', strtotime('next monday')), $record_set);

?>