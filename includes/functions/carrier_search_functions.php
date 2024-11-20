<?php
		//Carrier Numbers FOR COMPANY 

		function find_all_company_carriers($id){
			global $connection;

			$company_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "WHERE company_id = '{$company_id}' ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function no_of_carriers_by_company(){
			global $connection, $user;
			
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_available_carriers(){
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 1 ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_unavailable_carriers(){
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 2  ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_removed_carriers(){
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE ( status = 3 OR status = 4 )  ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_active_carriers_by_company(){
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 1  ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		//Carrier number by Keyword
		function no_of_carriers_by_company_by_keyword($keyword) {
			global $connection, $user;
		
			$safe_keyword = mysqli_real_escape_string($connection, $keyword);
			$safe_company_id = $user["company_id"];  // Cast as integer to ensure numeric context
			$user_id = find_user_id_by_keyword($safe_keyword);
		
			if ($user_id) {
				// Adjusted query to check dispatcher_id via the carrier_dispatcher table
				$query = "
				SELECT COUNT(DISTINCT cf.id)
				FROM carrier_form cf
				LEFT JOIN carrier_dispatcher cd ON cf.id = cd.c_id
				WHERE (cd.d_id = '{$user_id}' OR cf.creator_id = '{$user_id}')
				AND cf.company_id = '{$safe_company_id}'
				";
			} else {
				// Searching in concatenated fields for a string match
				$query = "
				SELECT COUNT(cf.id)
				FROM carrier_form cf
				WHERE CONCAT(cf.b_name, cf.o_name, cf.b_number, cf.dot, cf.mc) 
				LIKE '%{$safe_keyword}%'
				AND cf.company_id = '{$safe_company_id}'
				";
			}
		
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_assoc($set);
			return $result ? max($result) : 0; 
		}
		
		function no_of_available_carrier_form_by_keyword($keyword) {
			global $connection, $user;
			$safe_keyword = mysqli_real_escape_string($connection, $keyword);
			$safe_company_id = $user["company_id"];  // Cast as integer to ensure numeric context
			$user_id = find_user_id_by_keyword($safe_keyword);
		
			if ($user_id) {
				// Adjusted query to check dispatcher_id via the carrier_dispatcher table
				$query = "
				SELECT COUNT(DISTINCT cf.id)
				FROM carrier_form cf
				LEFT JOIN carrier_dispatcher cd ON cf.id = cd.c_id
				WHERE (cd.d_id = '{$user_id}' OR cf.creator_id = '{$user_id}')
				AND cf.status = 1
				AND cf.company_id = '{$safe_company_id}'
				";
			} else {
				// Searching in concatenated fields for a string match
				$query = "
				SELECT COUNT(cf.id)
				FROM carrier_form cf
				WHERE CONCAT(cf.b_name, cf.o_name, cf.b_number, cf.dot, cf.mc) 
				LIKE '%{$safe_keyword}%'
				AND cf.status = 1
				AND cf.company_id = '{$safe_company_id}'
				";
			}
		
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_assoc($set);
			return $result ? max($result) : 0; 
		}

		function no_of_unavailable_carrier_form_by_keyword($keyword) {
			global $connection, $user;
			$safe_keyword = mysqli_real_escape_string($connection, $keyword);
			$safe_company_id = $user["company_id"];  // Cast as integer to ensure numeric context
			$user_id = find_user_id_by_keyword($safe_keyword);
		
			if ($user_id) {
				// Adjusted query to check dispatcher_id via the carrier_dispatcher table
				$query = "
				SELECT COUNT(DISTINCT cf.id)
				FROM carrier_form cf
				LEFT JOIN carrier_dispatcher cd ON cf.id = cd.c_id
				WHERE (cd.d_id = '{$user_id}' OR cf.creator_id = '{$user_id}')
				AND cf.status = 2
				AND cf.company_id = '{$safe_company_id}'
				";
			} else {
				// Searching in concatenated fields for a string match
				$query = "
				SELECT COUNT(cf.id)
				FROM carrier_form cf
				WHERE CONCAT(cf.b_name, cf.o_name, cf.b_number, cf.dot, cf.mc) 
				LIKE '%{$safe_keyword}%'
				AND cf.status = 2
				AND cf.company_id = '{$safe_company_id}'
				";
			}
		
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_assoc($set);
			return $result ? max($result) : 0; 
		}

		function no_of_removed_carrier_form_by_keyword($keyword) {
			global $connection, $user;
			$safe_keyword = mysqli_real_escape_string($connection, $keyword);
			$safe_company_id = $user["company_id"];  // Cast as integer to ensure numeric context
			$user_id = find_user_id_by_keyword($safe_keyword);
		
			if ($user_id) {
				// Adjusted query to check dispatcher_id via the carrier_dispatcher table
				$query = "
				SELECT COUNT(DISTINCT cf.id)
				FROM carrier_form cf
				LEFT JOIN carrier_dispatcher cd ON cf.id = cd.c_id
				WHERE (cd.d_id = '{$user_id}' OR cf.creator_id = '{$user_id}')
				AND (cf.status = 3 ||cf.status = 4)
				AND cf.company_id = '{$safe_company_id}'
				";
			} else {
				// Searching in concatenated fields for a string match
				$query = "
				SELECT COUNT(cf.id)
				FROM carrier_form cf
				WHERE CONCAT(cf.b_name, cf.o_name, cf.b_number, cf.dot, cf.mc) 
				LIKE '%{$safe_keyword}%'
				AND (cf.status = 3 ||cf.status = 4)
				AND cf.company_id = '{$safe_company_id}'
				";
			}
		
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_assoc($set);
			return $result ? max($result) : 0; 
		}

		//Carrier Numbers for Dispatchers 

		function no_of_available_dispatch_by_dispatcher($id) {
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);

			$query = "
				SELECT COUNT(DISTINCT cf.id) 
				FROM carrier_form cf 
				INNER JOIN carrier_dispatcher cd ON cf.id = cd.c_id 
				WHERE cf.status = 1 
				AND cd.d_id = '{$safe_id}'
			";

			$set = mysqli_query($connection, $query);
			confirm_query($set);

			return max(mysqli_fetch_assoc($set));
		}


		function no_of_all_carriers_by_dispatcher($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);

			$query = "
				SELECT COUNT(DISTINCT cf.id) 
				FROM carrier_form cf 
				INNER JOIN carrier_dispatcher cd ON cf.id = cd.c_id 
				WHERE (cf.status = 1 || cf.status = 2)
				AND cd.d_id = '{$safe_id}'
			";

			$set = mysqli_query($connection, $query);
			confirm_query($set);

			return max(mysqli_fetch_assoc($set));
		}

		function no_of_available_carriers_by_dispatcher($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);

			$query = "
				SELECT COUNT(DISTINCT cf.id) 
				FROM carrier_form cf 
				INNER JOIN carrier_dispatcher cd ON cf.id = cd.c_id 
				WHERE cf.status = 1
				AND cd.d_id = '{$safe_id}'
			";

			$set = mysqli_query($connection, $query);
			confirm_query($set);

			return max(mysqli_fetch_assoc($set));
		}
		
		function no_of_unavailable_carriers_by_dispatcher($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);

			$query = "
				SELECT COUNT(DISTINCT cf.id) 
				FROM carrier_form cf 
				INNER JOIN carrier_dispatcher cd ON cf.id = cd.c_id 
				WHERE cf.status = 2
				AND cd.d_id = '{$safe_id}'
			";

			$set = mysqli_query($connection, $query);
			confirm_query($set);

			return max(mysqli_fetch_assoc($set));
		}

		//Carrier Numbers for Sales 

		function no_of_carriers_by_sales_agent($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE creator_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_available_carriers_by_sales_agent($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE creator_id = '{$safe_id}' ";
			$query .= "AND status = 1  ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_unavailable_carriers_by_sales_agent($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE creator_id = '{$safe_id}' ";
			$query .= "AND status = 2  ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_all_carriers_by_team_sales($id){

			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE sales_team_id = '{$safe_id}' ";
			$set = mysqli_query($connection, $query);
			
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}
		
		function no_of_available_carriers_by_team_sales($id){

			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE sales_team_id = '{$safe_id}' ";
			$query .= "AND status = 1  ";
			$set = mysqli_query($connection, $query);
			
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}
		
		function no_of_unavailable_carriers_by_team_sales($id){

			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE sales_team_id = '{$safe_id}' ";
			$query .= "AND status = 2  ";
			$set = mysqli_query($connection, $query);
			
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}
		
		function no_of_removed_carriers_by_team_sales($id){

			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE sales_team_id = '{$safe_id}' ";
			$query .= "AND (status = 3 || status = 4)   ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}

		function no_of_all_carriers_by_team_dispatch($id){

			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status =1 || status =2) ";
			$set = mysqli_query($connection, $query);
			
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}

		function no_of_available_carriers_by_team_dispatch($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 1  ";
			$query .= "AND dispatch_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}
		
		function no_of_unavailable_carriers_by_team_dispatch($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 2  ";
			$query .= "AND dispatch_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}

		// Carriers according to dispatch 
		
		function no_of_dispatched_carriers(){
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 'dispatched' ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatched_carriers_by_team($id){

			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 'dispatched' ";
			$query .= "AND dispatch_team_id = '{$safe_id}' ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
			
		//Carriers accordingly to time frame
		
		function no_of_carrier_this_month(){
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= ' WHERE MONTH(creation_time) = '.date("m").' ';
			$query .= 'AND YEAR(creation_time) = '.date("Y").' ';
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_this_month_by_team($id){
				global $connection;
				$safe_id = mysqli_real_escape_string($connection, $id);

				$query = "
				SELECT COUNT(id)
				FROM carrier_form
				WHERE MONTH(creation_time) = " . date("m") . "
				AND YEAR(creation_time) = " . date("Y") . "
				AND sales_team_id = '{$safe_id}'
				AND company_id = '{$user['company_id']}'
				";
			


				$set = mysqli_query($connection, $query);
				confirm_query($set);
				return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_by_agent($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE creator_id = '{$safe_id}' ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}
		
		function no_of_active_carrier_by_agent($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE creator_id = '{$safe_id}' ";
			$query .= "AND sale_active = 1 ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}
		
		function no_of_active_carrier_this_month_by_agent($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE creator_id = '{$safe_id}' ";
			$query .= 'AND MONTH(creation_time) = '.date("m");
			$query .= ' AND sale_active = 1 ';
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_this_month_by_agent($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE creator_id = '{$safe_id}' ";
			$query .= 'AND MONTH(creation_time) = '.date("m");
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_month() {
			global $connection, $user;

			$query  = "SELECT COUNT(id) ";
			$query .= "FROM carrier_form ";
			$query .= 'WHERE MONTH(creation_time) = '.(date("m")-1).' ';
			$query .= 'AND YEAR(creation_time) = '.date("Y").' ';
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_carrier_last_month_by_team($id) {
			global $connection, $user;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query = "
			SELECT COUNT(id)
			FROM carrier_form
			WHERE MONTH(creation_time) = " . (date("m") - 1) . "
			AND YEAR(creation_time) = " . date("Y") . "
			AND sales_team_id = '{$safe_id}'
			AND company_id = '{$user['company_id']}'
			";
		

			$set = mysqli_query($connection, $query);
			
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_carrier_this_week() {
			global $connection, $user;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_this_week_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) ";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_week() {
			global $connection, $user;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_week_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) ";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

	
		function no_of_carrier_today() {
			global $connection, $user;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE DATE(creation_time) = CURDATE()";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_yesterday() {
			global $connection, $user;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE DATE(creation_time) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_sameDayLastWeek() {
			global $connection, $user;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE DATE(creation_time) = DATE_SUB(CURDATE(), INTERVAL 7 DAY) ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_today_by_team($id) {
			global $connection, $user;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE DATE(creation_time) = CURDATE()";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_yesterday_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE DATE(creation_time) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_sameDayLastWeek_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE DATE(creation_time) = DATE_SUB(CURDATE(), INTERVAL 7 DAY) ";
			$query .= " AND sales_team_id = '{$safe_id}' ";
					
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_this_mon() {
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 0 ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_this_tue() {
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 1 ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_this_wed() {
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 2 ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_this_thu() {
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 3 ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_this_fri() {
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 4 ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_last_mon() {
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 0 ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_last_tue() {
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 1 ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_wed() {
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 2 ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_thu() {
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 3 ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_fri() {
			global $connection, $user;

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 4 ";
			$query .= "AND company_id = '{$user['company_id']}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		
			//Numbers by Team
		function no_of_carrier_this_mon_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 0";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_this_tue_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 1";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_this_wed_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 2";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_this_thu_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 3";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_this_fri_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 4";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_last_mon_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 0";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_last_tue_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 1";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_wed_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 2";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_thu_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 3";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_fri_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 4";
			$query .= " AND sales_team_id = '{$safe_id}' ";

			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}


		//Searching Carriers functions 

		function find_carrier_form_from($start,$end) {
			global $connection, $user;

			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE company_id = '{$user['company_id']}' ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		
		
		function find_carrier_form_by_keyword($keyword) {
			
			global $connection, $user;
			$safe_keyword = mysqli_real_escape_string($connection, $keyword);
			$safe_company_id = $user["company_id"];

				$query  = "
				SELECT * 
				FROM carrier_form 
				WHERE CONCAT(b_name, o_name, b_number, dot, mc) 
				LIKE '%{$safe_keyword}%'
				AND company_id = '%{$safe_company_id}'
				LIMIT 1
				";
		
			
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function find_carrier_form_by_keyword_from($keyword,$start,$end) {
			
			global $connection, $user;
			
				$safe_keyword = mysqli_real_escape_string($connection, $keyword);
				$user_id = find_user_id_by_keyword($safe_keyword);
				$safe_company_id = $user["company_id"];
			
				if ($user_id) {
					// Search by dispatcher or creator ID with new table structure
					$query = "
						SELECT * 
						FROM carrier_form cf
						LEFT JOIN carrier_dispatcher cd ON cf.id = cd.c_id
						WHERE (cd.d_id = {$user_id} OR cf.creator_id = {$user_id})
						AND cf.company_id = '{$safe_company_id}'
						ORDER BY cf.creation_time DESC
						LIMIT {$start}, {$end}
					";
				} else {
					// Search by keyword in concatenated fields
					$query = "
						SELECT * 
						FROM carrier_form 
						WHERE CONCAT(b_name, o_name, b_number, dot, mc) 
						LIKE '%{$safe_keyword}%'
						AND company_id = '{$safe_company_id}'
						ORDER BY creation_time DESC
						LIMIT {$start}, {$end}
					";
				}
			
				$set = mysqli_query($connection, $query);
				confirm_query($set);
				return $set;
			}

		function find_available_carrier_form_by_keyword_from($keyword,$start,$end) {
			
			global $connection, $user;
			
				$safe_keyword = mysqli_real_escape_string($connection, $keyword);
				$user_id = find_user_id_by_keyword($safe_keyword);
				$safe_company_id = $user["company_id"];
			
				if ($user_id) {
					// Search by dispatcher or creator ID with new table structure
					$query = "
						SELECT * 
						FROM carrier_form cf
						LEFT JOIN carrier_dispatcher cd ON cf.id = cd.c_id
						WHERE (cd.d_id = {$user_id} OR cf.creator_id = {$user_id})
						AND cf.status = 1
						AND cf.company_id = '{$safe_company_id}'
						ORDER BY cf.creation_time DESC
						LIMIT {$start}, {$end}
					";
				} else {
					// Search by keyword in concatenated fields
					$query = "
						SELECT * 
						FROM carrier_form 
						WHERE CONCAT(b_name, o_name, b_number, dot, mc) 
						LIKE '%{$safe_keyword}%'
						AND status = 1
						AND company_id = '{$safe_company_id}'
						ORDER BY creation_time DESC
						LIMIT {$start}, {$end}
					";
				}
			
				$set = mysqli_query($connection, $query);
				confirm_query($set);
				return $set;
			}
		function find_unavailable_carrier_form_by_keyword_from($keyword,$start,$end) {
			
			global $connection, $user;
			
				$safe_keyword = mysqli_real_escape_string($connection, $keyword);
				$user_id = find_user_id_by_keyword($safe_keyword);
				$safe_company_id = $user["company_id"];
			
				if ($user_id) {
					// Search by dispatcher or creator ID with new table structure
					$query = "
						SELECT * 
						FROM carrier_form cf
						LEFT JOIN carrier_dispatcher cd ON cf.id = cd.c_id
						WHERE (cd.d_id = {$user_id} OR cf.creator_id = {$user_id})
						AND cf.status = 2
						AND cf.company_id = '{$safe_company_id}'
						ORDER BY cf.creation_time DESC
						LIMIT {$start}, {$end}
					";
				} else {
					// Search by keyword in concatenated fields
					$query = "
						SELECT * 
						FROM carrier_form 
						WHERE CONCAT(b_name, o_name, b_number, dot, mc) 
						LIKE '%{$safe_keyword}%'
						AND status = 2
						AND company_id = '{$safe_company_id}'
						ORDER BY creation_time DESC
						LIMIT {$start}, {$end}
					";
				}
			
				$set = mysqli_query($connection, $query);
				confirm_query($set);
				return $set;
			}

			function find_removed_carrier_form_by_keyword_from($keyword, $start, $end) {
				global $connection, $user;
			
				$safe_keyword = mysqli_real_escape_string($connection, $keyword);
				$user_id = find_user_id_by_keyword($safe_keyword);
				$safe_company_id = $user["company_id"];
			
				if ($user_id) {
					// Search by dispatcher or creator ID with new table structure
					$query = "
						SELECT * 
						FROM carrier_form cf
						LEFT JOIN carrier_dispatcher cd ON cf.id = cd.c_id
						WHERE (cd.d_id = {$user_id} OR cf.creator_id = {$user_id})
						AND (cf.status = 3 OR cf.status = 4)
						AND cf.company_id = '{$safe_company_id}'
						ORDER BY cf.creation_time DESC
						LIMIT {$start}, {$end}
					";
				} else {
					// Search by keyword in concatenated fields
					$query = "
						SELECT * 
						FROM carrier_form 
						WHERE CONCAT(b_name, o_name, b_number, dot, mc) 
						LIKE '%{$safe_keyword}%'
						AND (status = 3 OR status = 4)
						AND company_id = '{$safe_company_id}'
						ORDER BY creation_time DESC
						LIMIT {$start}, {$end}
					";
				}
			
				$set = mysqli_query($connection, $query);
				confirm_query($set);
				return $set;
			}

		function find_available_carrier_form_from($start,$end) {
			global $connection, $user;

			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 1 ";
			$query .= "AND company_id = '{$user['company_id']}' ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}
		
		function find_available_dispatch_by_dispatcher_form_from($id,$start,$end) {
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 1 ";
			$query .= "AND dispatcher_id = '{$safe_id}' ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function find_all_carriers_by_dispatcher_form_from($id, $start, $end) {
			global $connection;
		
			$safe_id = mysqli_real_escape_string($connection, $id);
		
			$query = "
				SELECT cf.id AS carrier_id, cf.* 
				FROM carrier_form cf
				INNER JOIN carrier_dispatcher cd ON cd.c_id = cf.id
				WHERE (cf.status = 1 OR cf.status = 2)
				AND cd.d_id = '{$safe_id}'
				ORDER BY cf.creation_time DESC
				LIMIT {$start}, {$end}
			";

		
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
		}
			

		function find_available_carriers_by_dispatcher_form_from($id,$start,$end) {
			global $connection;
		
			$safe_id = mysqli_real_escape_string($connection, $id);
		
			$query = "
				SELECT cf.id AS carrier_id, cf.* 
				FROM carrier_form cf
				INNER JOIN carrier_dispatcher cd ON cd.c_id = cf.id
				WHERE cf.status = 1
				AND cd.d_id = '{$safe_id}'
				ORDER BY cf.creation_time DESC
				LIMIT {$start}, {$end}
			";
		
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
		}

		function find_unavailable_carriers_by_dispatcher_form_from($id,$start,$end) {
			global $connection;
		
			$safe_id = mysqli_real_escape_string($connection, $id);
		
			$query = "
				SELECT cf.id AS carrier_id, cf.* 
				FROM carrier_form cf
				INNER JOIN carrier_dispatcher cd ON cd.c_id = cf.id
				WHERE cf.status = 2
				AND cd.d_id = '{$safe_id}'
				ORDER BY cf.creation_time DESC
				LIMIT {$start}, {$end}
			";
		
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
		}

		function get_dispatchers_name_by_carrier($carrier_id) {
			global $connection;
		
			// Fetch all dispatchers for this carrier
			$query = "
				SELECT u.full_name
				FROM carrier_dispatcher d
				JOIN users u ON d.d_id = u.id
				WHERE d.c_id = {$carrier_id}
			";
			$result = mysqli_query($connection, $query);
		
			if (mysqli_num_rows($result) > 0) {
				$dispatchers = [];
				while ($dispatcher = mysqli_fetch_assoc($result)) {
					$dispatchers[] = $dispatcher['full_name'];
				}
				return implode(', ', $dispatchers); // Return as a comma-separated string
			} else {
				return "Not Assigned"; // Return if no dispatchers
			}
		}
		
		function get_unique_truck_types_names_by($carrier_id) {
			global $connection;

			// Query to get all truck types for the carrier
			$query = "
				SELECT truck_type, COUNT(*) as count
				FROM trucks_info
				WHERE carrier_id = {$carrier_id}
				GROUP BY truck_type
			";

			// Execute the query and check for errors
			$result = mysqli_query($connection, $query);

			// If the query failed, print the error
			if (!$result) {
				die('Error in query: ' . mysqli_error($connection));
			}

			$truck_types = [];

			// Collect truck types and their counts
			while ($truck = mysqli_fetch_assoc($result)) {
				$truck_types[] = "{$truck['truck_type']} ({$truck['count']})";
			}

			// Return comma-separated truck types with their counts
			return implode(', ', $truck_types);
		}
		

		function find_carriers_by_sales_agent_form_from($id,$start,$end) {
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE creator_id = '{$safe_id}' ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		function find_all_carriers_by_team_sales_form_from($id,$start,$end) {
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE sales_team_id = '{$safe_id}' ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		function find_available_carriers_by_team_sales_form_from($id,$start,$end) {
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE sales_team_id = '{$safe_id}' ";
			$query .= "AND status = 1 ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		function find_unavailable_carriers_by_team_sales_form_from($id,$start,$end) {
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE sales_team_id = '{$safe_id}' ";
			$query .= "AND status = 2 ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		function find_removed_carriers_by_team_sales_form_from($id,$start,$end) {
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE sales_team_id = '{$safe_id}' ";
			$query .= "AND (status = 3 OR status = 4) ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		function find_all_carriers_by_team_dispatch_form_from($id,$start,$end) {
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status =1 || status =2) ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}
		
		function find_available_carriers_by_team_dispatch_form_from($id,$start,$end) {
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 1  ";
			$query .= "AND dispatch_team_id = '{$safe_id}' ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		function find_unavailable_carriers_by_team_dispatch_form_from($id,$start,$end) {
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 2  ";
			$query .= "AND dispatch_team_id = '{$safe_id}' ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		function find_working_carrier_form_from($start,$end) {
			global $connection, $user;

			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 1  ";
			$query .= "AND company_id = '{$user['company_id']}' ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function find_unavailable_carrier_form_from($start,$end) {
			global $connection, $user;

			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 2  ";
			$query .= "AND company_id = '{$user['company_id']}' ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function find_removed_carrier_form_from($start,$end) {
			global $connection, $user;

			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE (status = 3 OR status = 4)  ";
			$query .= "AND company_id = '{$user['company_id']}' ";
			$query .= "ORDER BY creation_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function find_carrier_form_by_id($id){
			global $connection, $user;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE id = {$safe_id} ";
			$query .= "AND company_id = '{$user['company_id']}' ";
			$query .= "LIMIT 1";
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data = mysqli_fetch_assoc($data_set)) {
				return $data;
			} else {
				return null;
			}}

		function find_carrier_form_by_mc($mc){
			global $connection, $user;
			$safe_mc = mysqli_real_escape_string($connection, $mc);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE mc = {$safe_mc} ";
			$query .= "AND company_id = '{$user['company_id']}' ";
			$query .= "LIMIT 1";
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data = mysqli_fetch_assoc($data_set)) {
				return $data;
			} else {
				return null;
			}}

		function find_carrier_form_by_dot($dot){
			global $connection, $user;
			$safe_dot = mysqli_real_escape_string($connection, $dot);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE dot = {$safe_dot} ";
			$query .= "AND company_id = '{$user['company_id']}' ";
			$query .= "LIMIT 1";
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data = mysqli_fetch_assoc($data_set)) {
				return $data;
			} else {
				return null;
			}}


	
?>