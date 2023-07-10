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

?>