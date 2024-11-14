<?php

    function no_of_invoices_pending_carriers(){
        global $connection, $user;

        $query  = "SELECT COUNT(DISTINCT carrier_id) ";
        $query .= "FROM dispatch_list ";
        $query .= "WHERE invoice_status = 1 ";
        $query .= "AND status != 'Cancelled' ";
        $query .= " AND company_id = '{$user['company_id']}' ";


        $set = mysqli_query($connection, $query);
        confirm_query($set);
        return max(mysqli_fetch_assoc($set));
        }


        
    function no_of_invoices_generated(){

        global $connection, $user;
        
        $query  = "SELECT COUNT('id') ";
        $query .= "FROM invoices ";
        $query .= " WHERE company_id = '{$user['company_id']}' ";


        $set = mysqli_query($connection, $query);
        confirm_query($set);
        return max(mysqli_fetch_assoc($set));

        }
    
    function no_of_invoices_unpaid(){

        global $connection, $user;
        
        $query  = "SELECT COUNT('id') ";
        $query .= "FROM invoices ";
        $query .= "WHERE invoice_status = 2 ";
        $query .= " AND company_id = '{$user['company_id']}' ";


        $set = mysqli_query($connection, $query);
        confirm_query($set);
        return max(mysqli_fetch_assoc($set));

        }
    
    function find_all_invoices_generated_from($start,$end){

        global $connection, $user;

        $query  = "SELECT * ";
        $query .= "FROM invoices ";
        $query .= " WHERE company_id = '{$user['company_id']}' ";
        $query .= "ORDER BY id DESC ";
        $query .= "LIMIT {$start},{$end}";

        $set = mysqli_query($connection, $query);
        confirm_query($set);
        return $set;
        }
    function find_all_invoices_unpaid_from($start,$end){

        global $connection, $user;
        
        $query  = "SELECT * ";
        $query .= "FROM invoices ";
        $query .= "WHERE invoice_status = 2 ";
        $query .= " AND company_id = '{$user['company_id']}' ";
        $query .= "ORDER BY id DESC ";
        $query .= "LIMIT {$start},{$end}";
       
        $set = mysqli_query($connection, $query);
        confirm_query($set);
        return $set;
        }
  
    function find_all_invoices_pending_carriers($id){
        
        $record_set_object = find_all_company_carriers($id);
        $record_set = array();
        
        while ($record = mysqli_fetch_assoc($record_set_object)) {
            $record_set[] = $record;
        }
        return $record_set;
        }

    function find_all_invoices_pending_carriers_from($start, $record_per_page){
        global $connection, $user;
        
        $carrier_id_set = array();
        $start_counter = 0;
        $end_counter = 0;


        $query  = "SELECT DISTINCT carrier_id ";
        $query .= "FROM dispatch_list ";
        $query .= "WHERE invoice_status = 1 ";
        $query .= " AND company_id = '{$user['company_id']}' ";
        $query .= "AND status != 'Cancelled' ";

        $set = mysqli_query($connection, $query);
        confirm_query($set);

        while ($record = mysqli_fetch_assoc($set)) {
            $carrier_id = $record['carrier_id'];
            $carrier_id_set[] = $carrier_id;
        }

        $carrier_record_set = array();
        
        foreach ($carrier_id_set as $carrier_id) {
        
            $start_counter++;
            // Ignore the records until the start position is reached
            if ($start_counter <= $start) {
                continue;
            }
            

            $carrier_record = find_carrier_form_by_id($carrier_id);
            $carrier_record_set[] = $carrier_record;

            $end_counter++;
            // Check if the desired record limit has been reached
            if ($end_counter >= $record_per_page) {
            break;
        }
        }

        return $carrier_record_set;
        }



    function find_invoice_by_id($id){
        global $connection, $user;

        $safe_id = mysqli_real_escape_string($connection, $id);
        $query  = "SELECT * ";
        $query .= "FROM invoices ";
        $query .= "WHERE id = {$safe_id} ";
        $query .= " AND company_id = '{$user['company_id']}' ";
        $query .= "LIMIT 1";
        $data_set = mysqli_query($connection, $query);

        confirm_query($data_set);
        
        if($data = mysqli_fetch_assoc($data_set)) {
            return $data;
        } else {
            return null;
        }}
    
    function find_pending_invoices_amount_by_carrier_id($id) {
        
        global $connection, $user;

        $safe_id = mysqli_real_escape_string($connection, $id);
        $record_set_object = find_pending_invoices_by_carrier_id($safe_id);
       
        $total_amount = 0;
        while ($record = mysqli_fetch_assoc($record_set_object)) {
            $total_amount += $record["commission"] ;
        }
        
        return $total_amount;}

    function find_pending_invoices_by_carrier_id($id) {
        global $connection, $user;

        $safe_id = mysqli_real_escape_string($connection, $id);

        $query  = "SELECT * ";
        $query .= "FROM dispatch_list ";
        $query .= "WHERE invoice_status = '1' ";
        $query .= "AND carrier_id = '{$safe_id}' ";
        $query .= "AND status != 'Cancelled' ";
        $query .= " AND company_id = '{$user['company_id']}' ";
        $query .= "ORDER BY dispatch_time DESC ";
        $set = mysqli_query($connection, $query);
        confirm_query($set);
        return $set;}

    function invoice_creation_function($carrier_id,$total_amount,$due_date,$record_set){
        global $connection, $user;
        $company_id = $user['company_id'];
        
        $query  = "INSERT INTO invoices (";
        $query .= "  carrier_id, company_id, total_amount, due_date";
        $query .= ") VALUES (";
        $query .= "  '{$carrier_id}', '$company_id', '{$total_amount}', '{$due_date}'";
        $query .= ")";
        $result = mysqli_query($connection, $query);
        if($result){
            $new_id = mysqli_insert_id($connection);
             foreach ($record_set as $record)  {  
                $record_id = $record['id'];
                $sql = "UPDATE dispatch_list SET invoice_id='$new_id', invoice_status = 2 WHERE id='$record_id'";
                $result = mysqli_query($connection, $sql);
            } 
            if($result){
                redirect_to("invoice_view?invoice_id=" . $new_id);

            } else {
                $_SESSION["message"] = "something went wrong.";
                redirect_to("home");
            }
            
        } else {
            $_SESSION["message"] = "Invoice Creation Failed.";
            redirect_to("home");
        }}

    function paid_invoices_amount_this_month() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
			FROM invoices
			WHERE invoice_status = 3
            AND company_id = '{$user['company_id']}'
			AND MONTH(creation_date) = MONTH(NOW())
            AND YEAR(creation_date) = YEAR(NOW())
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function unpaid_invoices_amount_this_month() {
            global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
			FROM invoices
			WHERE invoice_status = 2
            AND company_id = '{$user['company_id']}'
			AND MONTH(creation_date) = MONTH(NOW())
            AND YEAR(creation_date) = YEAR(NOW())
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}
     
    function paid_invoices_amount_last_month() {
            global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
			FROM invoices
			WHERE invoice_status = 3
            AND company_id = '{$user['company_id']}'
			AND YEAR(creation_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
            AND MONTH(creation_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}
            
    function unpaid_invoices_amount_last_month() {
            global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
			FROM invoices
			WHERE invoice_status = 2
            AND company_id = '{$user['company_id']}'
			AND YEAR(creation_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
            AND MONTH(creation_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_invoices_amount_week_0() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2 OR invoice_status = 3)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW(), 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_invoices_amount_week_1() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2 OR invoice_status = 3)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_invoices_amount_week_2() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2 OR invoice_status = 3)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 2 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_invoices_amount_week_3() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2 OR invoice_status = 3)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 3 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_invoices_amount_week_4() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2 OR invoice_status = 3)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 4 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_invoices_amount_week_5() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2 OR invoice_status = 3)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 5 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_invoices_amount_week_6() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2 OR invoice_status = 3)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 6 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_invoices_amount_week_7() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2 OR invoice_status = 3)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 7 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_invoices_amount_week_8() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2 OR invoice_status = 3)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 8 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_invoices_amount_week_9() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2 OR invoice_status = 3)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 9 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_unpaid_invoices_amount_week_0() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW(), 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}
            
    function total_unpaid_invoices_amount_week_1() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_unpaid_invoices_amount_week_2() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 2 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_unpaid_invoices_amount_week_3() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 3 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_unpaid_invoices_amount_week_4() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 4 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_unpaid_invoices_amount_week_5() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 5 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_unpaid_invoices_amount_week_6() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 6 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_unpaid_invoices_amount_week_7() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 7 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_unpaid_invoices_amount_week_8() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 8 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    function total_unpaid_invoices_amount_week_9() {
        global $connection, $user;

			$query = "SELECT SUM(total_amount) AS total
            FROM invoices
            WHERE (invoice_status = 2)
            AND company_id = '{$user['company_id']}'
            AND YEARWEEK(creation_date, 1) = YEARWEEK(NOW() - INTERVAL 9 WEEK, 1)
            ";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total'] !== null) ? $row['total'] : 0;

			return $record;}

    

    


?>