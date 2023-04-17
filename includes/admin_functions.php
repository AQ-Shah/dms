<?php

	//admin functions

	function find_all_admins() {
			global $connection;
			
			$query  = "SELECT * ";
			$query .= "FROM admins ";
			$query .= "ORDER BY username ASC";
			$admin_set = mysqli_query($connection, $query);
			confirm_query($admin_set);
			return $admin_set;
		}

	function find_admin_by_id($admin_id) {
			global $connection;
			
			$safe_admin_id = mysqli_real_escape_string($connection, $admin_id);
			
			$query  = "SELECT * ";
			$query .= "FROM admins ";
			$query .= "WHERE id = {$safe_admin_id} ";
			$query .= "LIMIT 1";
			$admin_set = mysqli_query($connection, $query);
			confirm_query($admin_set);
			if($admin = mysqli_fetch_assoc($admin_set)) {
				return $admin;
			} else {
				return null;
			}
		}

	function find_admin_by_username($username) {
			global $connection;
			
			$safe_username = mysqli_real_escape_string($connection, $username);
			
			$query  = "SELECT * ";
			$query .= "FROM admins ";
			$query .= "WHERE username = '{$safe_username}' ";
			$query .= "LIMIT 1";
			$admin_set = mysqli_query($connection, $query);
			confirm_query($admin_set);
			if($admin = mysqli_fetch_assoc($admin_set)) {
				return $admin;
			} else {
				return null;
			}
		}	

?>