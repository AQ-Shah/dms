<?php 

        function no_of_trucks_by_carrier($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM trucks_info ";
			$query .= "WHERE carrier_id = '{$safe_id}' ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));
			}

		function no_of_onload_trucks(){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM trucks_info ";
			$query .= "WHERE truck_load_status = 2 ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}

		function no_of_onload_trucks_by_team($id){
			global $connection;
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM trucks_info ";
			$query .= "WHERE truck_load_status = 2 ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return max(mysqli_fetch_assoc($set));}
		
		function find_trucks_by_carrier_id($id){
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "
				SELECT * 
				FROM trucks_info 
				WHERE carrier_id = '{$safe_id}' 
			";
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			
				return $data_set;
			}
		function find_truck_by_id($id){
			global $connection;
			$safe_id = mysqli_real_escape_string($connection, $id);
			$query  = "
				SELECT * 
				FROM trucks_info 
				WHERE id = '{$safe_id}'
				LIMIT 1 
			";
			$data_set = mysqli_query($connection, $query);
			confirm_query($data_set);
			if($data = mysqli_fetch_assoc($data_set)) {
				return $data;
			} else {
				return null;
			}}

?>