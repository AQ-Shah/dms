<?php
	//Dispatch FUNCTIONS
		function find_all_dispatch_list(){
			global $connection;
			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "ORDER BY id DESC ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function no_of_dispatch_list(){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
			
		function no_of_dispatch_this_month(){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= ' WHERE MONTH(dispatch_time) = '.date("m");
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_last_month() {
			global $connection;
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= 'WHERE MONTH(dispatch_time) = '.(date("m")-1);
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_dispatch_this_week() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_last_week() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_today() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE DATE(dispatch_time) = CURDATE()";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_yesterday() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE DATE(dispatch_time) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_sameDayLastWeek() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE DATE(dispatch_time) = DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_this_mon() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 0";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_dispatch_this_tue() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 1";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_this_wed() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 2";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_dispatch_this_thu() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 3";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_this_fri() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 4";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_dispatch_last_mon() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 0";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_dispatch_last_tue() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 1";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_last_wed() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 2";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_last_thu() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 3";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_last_fri() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 4";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function find_dispatch_list_from($start,$end) {
			global $connection;

			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "ORDER BY id DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function find_dispatch_list_this_month() {
			global $connection;

			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= ' WHERE MONTH(dispatch_time) = '.date("m");
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}
		

		function find_dispatch_list_by_id($id){
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE id = {$safe_id} ";
			$query .= "LIMIT 1";
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data = mysqli_fetch_assoc($data_set)) {
				return $data;
			} else {
				return null;
			}}

		function find_dispatch_list_by_dispatcher($dispatcher_id){
			global $connection;
			$safe_dispatcher_id = mysqli_real_escape_string($connection, $dispatcher_id);
			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatcher_id = {$safe_dispatcher_id} ";
			$query .= "LIMIT 1";
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data = mysqli_fetch_assoc($data_set)) {
				return $data;
			} else {
				return null;
			}}

		function find_dispatch_list_by_carrier($carrier_id){
			global $connection;
			$safe_carrier_id = mysqli_real_escape_string($connection, $carrier_id);
			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE carrier_id = {$safe_carrier_id} ";
			$query .= "LIMIT 1";
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data = mysqli_fetch_assoc($data_set)) {
				return $data;
			} else {
				return null;
			}}
			

	
?>