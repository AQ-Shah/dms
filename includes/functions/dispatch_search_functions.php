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

		function find_all_dispatch_list_from($start,$end){
			global $connection;
			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "ORDER BY id DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		function no_of_dispatch_list(){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}
		
		function no_of_team_dispatch_list($id){

			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed')  ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}

		function no_of_dispatched_by_dispatcher($id){

			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatcher_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed')  ";
			$set = mysqli_query($connection, $query);
			
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_cancelled_dispatch_list(){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE status = 'Cancelled' ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}
		
		function no_of_team_cancelled_dispatch_list($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE status = 'Cancelled' ";
			$query .= "AND dispatch_team_id = '{$safe_id}' ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}
			
		function no_of_my_cancelled_dispatch_list($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE status = 'Cancelled' ";
			$query .= "AND dispatcher_id = '{$safe_id}' ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}
			
		function no_of_dispatch_this_month(){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= 'AND MONTH(dispatch_time) = '.date("m");
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_this_month_by_team($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= 'AND MONTH(dispatch_time) = '.date("m") ;
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_this_month_by_agent($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatcher_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= 'AND MONTH(dispatch_time) = '.date("m") ;
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_last_month() {
			global $connection;
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= 'AND MONTH(dispatch_time) = '.(date("m")-1);
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}
		
		function no_of_dispatch_last_month_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= 'AND MONTH(dispatch_time) = '.(date("m")-1);
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_dispatch_this_week() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_this_week_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_dispatch_last_week() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_last_week_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_dispatch_today() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND DATE(dispatch_time) = CURDATE()";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_today_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND DATE(dispatch_time) = CURDATE()";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_dispatch_yesterday() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND DATE(dispatch_time) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_yesterday_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND DATE(dispatch_time) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_dispatch_sameDayLastWeek() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND DATE(dispatch_time) = DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_sameDayLastWeek_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND DATE(dispatch_time) = DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_dispatch_this_mon() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 0";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_this_mon_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 0";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}
		
		function no_of_dispatch_this_tue() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 1";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_this_tue_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 1";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}		

		function no_of_dispatch_this_wed() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 2";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_this_wed_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 2";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}
		
		function no_of_dispatch_this_thu() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 3";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_this_thu_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 3";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

	
		function no_of_dispatch_this_fri() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 4";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_this_fri_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1) AND WEEKDAY(dispatch_time) = 4";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_dispatch_last_mon() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 0";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function no_of_dispatch_last_mon_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 0";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}

		function no_of_dispatch_last_tue() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 1";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_last_tue_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 1";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}


		function no_of_dispatch_last_wed() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 2";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_last_wed_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 2";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}


		function no_of_dispatch_last_thu() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 3";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_last_thu_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 3";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}


		function no_of_dispatch_last_fri() {
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 4";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_dispatch_last_fri_by_team($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT(id) ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE dispatch_team_id = '{$safe_id}' ";
			$query .= "AND (status = 'Dispatched' OR status = 'Completed') ";
			$query .= "AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1) AND WEEKDAY(dispatch_time) = 4";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			$result = mysqli_fetch_array($set)[0];
			return max($result, 0);}


		function find_dispatch_list_from($start,$end) {
			global $connection;

			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "ORDER BY dispatch_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;}

		
		function find_team_dispatch_list_from($id,$start,$end) {

			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed')  ";
			$query .= "AND dispatch_team_id = '{$safe_id}' ";
			$query .= "ORDER BY dispatch_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		function find_dispatched_by_id_from($id, $start,$end) {

			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			
			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE (status = 'Dispatched' OR status = 'Completed') AND dispatcher_id = '{$safe_id}'  ";
			$query .= "ORDER BY dispatch_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		function find_cancelled_dispatch_list_from($start,$end) {
			global $connection;

			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE status = 'Cancelled' ";
			$query .= "ORDER BY dispatch_time DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}
		
		function find_team_cancelled_dispatch_list_from($id,$start,$end) {
			
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			
			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE status = 'Cancelled' ";
			$query .= "AND dispatch_team_id = '{$safe_id}' ";
			$query .= "ORDER BY id DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		function find_my_cancelled_dispatch_list_from($id,$start,$end) {

			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE status = 'Cancelled' ";
			$query .= "AND dispatcher_id = '{$safe_id}' ";
			$query .= "ORDER BY id DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		

		function find_dispatch_rate_total_this_month() {
			global $connection;

			$query = "SELECT SUM(rate) AS total_rate
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed') 
			AND MONTH(dispatch_time) = MONTH(NOW())";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}

		function find_dispatch_commission_this_month_by_user($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query = "SELECT SUM(commission) AS commission
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')
			AND MONTH(dispatch_time) = MONTH(NOW())
			AND dispatcher_id = {$safe_id}";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['commission'] !== null) ? $row['commission'] : 0;

			return $record;}

		function find_dispatch_commission_paid_this_month_by_user($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query = "SELECT SUM(commission) AS commission
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed') 
			AND invoice_status = 3 
			AND MONTH(dispatch_time) = MONTH(NOW())
			AND dispatcher_id = {$safe_id}";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['commission'] !== null) ? $row['commission'] : 0;

			return $record;}

		function find_dispatch_rate_total_last_month() {
			global $connection;

			$query = "SELECT SUM(rate) AS total_rate
					FROM dispatch_list
					WHERE (status = 'Dispatched' OR status = 'Completed')  
					AND YEAR(dispatch_time) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
					AND MONTH(dispatch_time) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);

			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}

		function find_dispatch_commission_last_month_by_user($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query = "SELECT SUM(commission) AS commission
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND YEAR(dispatch_time) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
			AND MONTH(dispatch_time) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
			AND dispatcher_id = {$safe_id}";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['commission'] !== null) ? $row['commission'] : 0;

			return $record;}
		function find_dispatch_commission_month_before_last_by_user($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query = "SELECT SUM(commission) AS commission
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND YEAR(dispatch_time) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH)
			AND MONTH(dispatch_time) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)
			AND dispatcher_id = {$safe_id}";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['commission'] !== null) ? $row['commission'] : 0;

			return $record;}

		function find_dispatch_commission_paid_last_month_by_user($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query = "SELECT SUM(commission) AS commission
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND invoice_status = 3  
			AND YEAR(dispatch_time) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
			AND MONTH(dispatch_time) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
			AND dispatcher_id = {$safe_id}";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['commission'] !== null) ? $row['commission'] : 0;

			return $record;}
		function find_dispatch_commission_paid_month_before_last_by_user($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query = "SELECT SUM(commission) AS commission
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND invoice_status = 3  
			AND YEAR(dispatch_time) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH)
			AND MONTH(dispatch_time) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)
			AND dispatcher_id = {$safe_id}";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['commission'] !== null) ? $row['commission'] : 0;

			return $record;}

		function find_dispatch_rate_total_this_week() {
			global $connection;

			$query = "SELECT SUM(rate) AS total_rate
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1)";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}

			function find_dispatch_commission_this_week_by_user($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query = "SELECT SUM(commission) AS commission
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed') 
			AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1)
			AND dispatcher_id = {$safe_id}";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['commission'] !== null) ? $row['commission'] : 0;

			return $record;}

		function find_dispatch_commission_paid_this_week_by_user($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query = "SELECT SUM(commission) AS commission
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed') 
			AND invoice_status = 3  
			AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1)
			AND dispatcher_id = {$safe_id}";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['commission'] !== null) ? $row['commission'] : 0;

			return $record;}

		function find_dispatch_rate_total_last_week() {
			global $connection;

			$query = "SELECT SUM(rate) AS total_rate
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1)";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}

		function find_dispatch_commission_last_week_by_user($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query = "SELECT SUM(commission) AS commission
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed') 
			AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1)
			AND dispatcher_id = {$safe_id}";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['commission'] !== null) ? $row['commission'] : 0;

			return $record;}

		function find_dispatch_commission_paid_last_week_by_user($id) {
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query = "SELECT SUM(commission) AS commission
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed') 
			AND invoice_status = 3  
			AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1)
			AND dispatcher_id = {$safe_id}";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['commission'] !== null) ? $row['commission'] : 0;

			return $record;}
		
		function find_dispatch_rate_total_today() {
			global $connection;

			$query = "SELECT SUM(rate) AS total_rate
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND DATE(dispatch_time) = CURDATE()";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}

		function find_dispatch_rate_total_yesterday() {
			global $connection;

			$query = "SELECT SUM(rate) AS total_rate
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND DATE(dispatch_time) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}

		function find_dispatch_commission_total_this_month() {
			global $connection;

			$query = "SELECT SUM(commission) AS total_rate
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND MONTH(dispatch_time) = MONTH(NOW())";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}

		function find_dispatch_commission_total_last_month() {
			global $connection;

			$query = "SELECT SUM(commission) AS total_rate
					FROM dispatch_list
					WHERE (status = 'Dispatched' OR status = 'Completed')  
					AND YEAR(dispatch_time) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
					AND MONTH(dispatch_time) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);

			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}

		function find_dispatch_commission_total_this_week() {
			global $connection;

			$query = "SELECT SUM(commission) AS total_rate
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW(), 1)";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}

		function find_dispatch_commission_total_last_week() {
			global $connection;

			$query = "SELECT SUM(commission) AS total_rate
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND YEARWEEK(dispatch_time, 1) = YEARWEEK(NOW() - INTERVAL 1 WEEK, 1)";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}
		
		function find_dispatch_commission_total_today() {
			global $connection;

			$query = "SELECT SUM(commission) AS total_rate
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND DATE(dispatch_time) = CURDATE()";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}

		function find_dispatch_commission_total_yesterday() {
			global $connection;

			$query = "SELECT SUM(commission) AS total_rate
			FROM dispatch_list
			WHERE (status = 'Dispatched' OR status = 'Completed')  
			AND DATE(dispatch_time) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";

			$result = mysqli_query($connection, $query);
			confirm_query($result);

			$row = mysqli_fetch_assoc($result);
			$record = ($row['total_rate'] !== null) ? $row['total_rate'] : 0;

			return $record;}

		
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
			
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data = mysqli_fetch_assoc($data_set)) {
				return $data;
			} else {
				return null;
			}}
		function count_dispatch_list_by_carrier_name($keyword) {

			global $connection;
			$safe_keyword = mysqli_real_escape_string($connection, $keyword);
			$carrier_set = find_carrier_form_by_keyword($safe_keyword);
			$carrier = mysqli_fetch_assoc($carrier_set);
			$carrier_id = $carrier['id'];
			
			if ($carrier) {
				$query  = "
					SELECT COUNT(id) 
					FROM dispatch_list 
					WHERE carrier_id = {$carrier_id}
				";

				$set = mysqli_query($connection, $query);
				confirm_query($set);
				$result = mysqli_fetch_array($set)[0];
				return max($result, 0);
			} else return 0;
			}
			

		function find_dispatch_list_by_carrier_name_from($keyword,$start,$end) {
			
			global $connection;
			$safe_keyword = mysqli_real_escape_string($connection, $keyword);
			$carrier_set = find_carrier_form_by_keyword($safe_keyword);
			$carrier = mysqli_fetch_assoc($carrier_set);
			$carrier_id = $carrier['id'];
			
			if ($carrier) {
				$query  = "
					SELECT * 
					FROM dispatch_list 
					WHERE carrier_id = {$carrier_id}
					ORDER BY dispatch_time DESC
					LIMIT {$start},{$end}
				";
			
				$set = mysqli_query($connection, $query);
				confirm_query($set);
				return $set;}
		}

		function find_dispatch_list_by_invoice_id($invoice_id){

			global $connection;
			$safe_invoice_id = mysqli_real_escape_string($connection, $invoice_id);

			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE invoice_id = {$safe_invoice_id} ";
			
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
			}

		function find_dispatch_list_by_carrier($carrier_id){
			global $connection;
			$safe_carrier_id = mysqli_real_escape_string($connection, $carrier_id);
			$query  = "SELECT * ";
			$query .= "FROM dispatch_list ";
			$query .= "WHERE carrier_id = {$safe_carrier_id} ";
			
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data_set) {
				return $data_set;
			} else {
				return null;
			}}	

	
?>