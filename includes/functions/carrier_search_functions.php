<?php
	//Carrier FUNCTIONS
		function find_all_carrier_form(){
			global $connection;
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "ORDER BY id DESC ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function no_of_carrier_form(){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_available_carriers(){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 'available' ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_unavailable_carriers(){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 'unavailable' ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatched_carriers(){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 'dispatched' ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
			
		function no_of_carrier_this_month(){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= ' WHERE MONTH(creation_time) = '.date("m");
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
			global $connection;
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM carrier_form ";
			$query .= 'WHERE MONTH(creation_time) = '.(date("m")-1);
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_carrier_this_week() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_week() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_today() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE DATE(creation_time) = CURDATE()";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_yesterday() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE DATE(creation_time) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_sameDayLastWeek() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE DATE(creation_time) = DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_this_mon() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 0";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_this_tue() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 1";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_this_wed() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 2";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_this_thu() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 3";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_this_fri() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(creation_time) = 4";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_last_mon() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 0";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_carrier_last_tue() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 1";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_wed() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 2";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_thu() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 3";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_carrier_last_fri() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE YEARWEEK(creation_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(creation_time) = 4";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function find_carrier_form_from($start,$end) {
			global $connection;

			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "ORDER BY id DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}
		
		function find_available_carrier_form_from($start,$end) {
			global $connection;

			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 'available' ";
			$query .= "ORDER BY id DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function find_unavailable_carrier_form_from($start,$end) {
			global $connection;

			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE status = 'unavailable' ";
			$query .= "ORDER BY id DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function find_carrier_form_by_id($id){
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE id = {$safe_id} ";
			$query .= "LIMIT 1";
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data = mysqli_fetch_assoc($data_set)) {
				return $data;
			} else {
				return null;
			}}

		function find_carrier_form_by_mc($mc){
			global $connection;
			$safe_mc = mysqli_real_escape_string($connection, $mc);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE mc = {$safe_mc} ";
			$query .= "LIMIT 1";
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data = mysqli_fetch_assoc($data_set)) {
				return $data;
			} else {
				return null;
			}}

		function find_carrier_form_by_dot($dot){
			global $connection;
			$safe_dot = mysqli_real_escape_string($connection, $dot);
			$query  = "SELECT * ";
			$query .= "FROM carrier_form ";
			$query .= "WHERE dot = {$safe_dot} ";
			$query .= "LIMIT 1";
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data = mysqli_fetch_assoc($data_set)) {
				return $data;
			} else {
				return null;
			}}
			

	
?>