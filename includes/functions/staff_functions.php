<?php

function find_files_of_user($id){
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);
    
    $query  = "SELECT * ";
    $query .= "FROM file_library ";
    $query .= "WHERE user_id = {$safe_id} ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);
    return $set;}



function no_of_users_by_department($department_id){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $query  = "SELECT COUNT('id') ";
        $query .= "FROM users ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $set = mysqli_query($connection, $query);
		confirm_query($set);
		return max(mysqli_fetch_assoc($set));}

function no_of_users_by_department_of_company($department_id,$company_id){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $safe_company_id = mysqli_real_escape_string($connection, $company_id);
        $query  = "SELECT COUNT('id') ";
        $query .= "FROM users ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $query .= "AND company_id = {$safe_company_id} ";
        $set = mysqli_query($connection, $query);
        confirm_query($set);
        return max(mysqli_fetch_assoc($set));}
    

function no_of_teams_by_department($department_id){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $query  = "SELECT COUNT('id') ";
        $query .= "FROM teams ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $set = mysqli_query($connection, $query);
        confirm_query($set);
        return max(mysqli_fetch_assoc($set));}

function find_all_departments() {
        global $connection;
        
        $query  = "SELECT * ";
        $query .= "FROM department ";
        $query .= "ORDER BY id ASC";
        $department_set = mysqli_query($connection, $query);
        confirm_query($department_set);
        return $department_set;
    }

function find_all_departments_of_company($company_id) {
        global $connection;
        $safe_company_id = mysqli_real_escape_string($connection, $company_id);

        $query  = "SELECT * ";
        $query .= "FROM department ";
        $query .= "WHERE company_id = {$safe_company_id} ";
        $query .= "ORDER BY id ASC";
        $department_set = mysqli_query($connection, $query);
        confirm_query($department_set);
        return $department_set;
    }

function find_departments_from($start,$end) {
        global $connection;
        
        $query  = "SELECT * ";
        $query .= "FROM department ";
        $query .= "ORDER BY id ASC ";
        $query .= "LIMIT {$start},{$end}";
        $department_set = mysqli_query($connection, $query);
        confirm_query($department_set);
        return $department_set;
    }



function find_all_users_by_department($department_id){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $query .= "ORDER BY full_name ASC";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;
    }

function find_all_users_by_department_of_company($department_id,$company_id){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $safe_company_id = mysqli_real_escape_string($connection, $company_id);
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $query .= "AND company_id = {$safe_company_id} ";
        $query .= "ORDER BY full_name ASC";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;
    }

//Team Functions

function find_all_users_by_team($team_id){
        global $connection;
        $safe_team_id = mysqli_real_escape_string($connection, $team_id);
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE team_id = {$safe_team_id} ";
        $query .= "ORDER BY full_name ASC";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;
    }


function find_all_teams_by_department($department_id){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $query  = "SELECT * ";
        $query .= "FROM teams ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $query .= "ORDER BY name ASC";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;
    }
function find_team_by_id($id){
       global $connection;
        
        $safe_id = mysqli_real_escape_string($connection, $id);
        
        $query  = "SELECT * ";
        $query .= "FROM teams ";
        $query .= "WHERE id = {$safe_id} ";
        $query .= "LIMIT 1";
        $record_set = mysqli_query($connection, $query);
        confirm_query($record_set);
        if($record = mysqli_fetch_assoc($record_set)) {
            return $record;
        } else {
            return null;
        }
    }

function find_teams_by_department_id($id){
       global $connection;
        
        $safe_id = mysqli_real_escape_string($connection, $id);
        
        $query  = "SELECT * ";
        $query .= "FROM teams ";
        $query .= "WHERE department_id = {$safe_id} ";
        $record_set = mysqli_query($connection, $query);
        confirm_query($record_set);
        return $record_set;
    }
function find_team_by_department_id($id){
       global $connection;
        
        $safe_id = mysqli_real_escape_string($connection, $id);
        
        $query  = "SELECT * ";
        $query .= "FROM teams ";
        $query .= "WHERE department_id = {$safe_id} ";
        $query .= "LIMIT 1";
        $record_set = mysqli_query($connection, $query);
        confirm_query($record_set);
        if($record = mysqli_fetch_assoc($record_set)) {
            return $record;
        } else {
            return null;
        }
    }
function find_team_id_by_department_id($id){
       global $connection;
        
        $safe_id = mysqli_real_escape_string($connection, $id);
        
        $query  = "SELECT * ";
        $query .= "FROM teams ";
        $query .= "WHERE department_id = {$safe_id} ";
        $query .= "LIMIT 1";
        $record_set = mysqli_query($connection, $query);
        confirm_query($record_set);
        if($record = mysqli_fetch_assoc($record_set)) {
            return $record["id"];
        } else {
            return null;
        }
    }

function find_all_active_dispatchers(){
        global $connection, $user;

        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE (permission = 4 OR permission = 5) ";
        $query .= "AND status = 1 ";
        $query .= "AND company_id = '{$user['company_id']}' ";
        $query .= "ORDER BY full_name ASC";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;
    }


function find_all_active_sales_agent(){
        global $connection, $user;

        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE (permission = 9 OR permission = 10) ";
        $query .= "AND status = 1 ";
        $query .= "AND company_id = '{$user['company_id']}' ";
        $query .= "ORDER BY full_name ASC";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;
    }

 
function find_all_active_sales_agent_by_team($id){
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);

    $query  = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE (permission = 9 OR permission = 10) ";
    $query .= "AND status = 1 ";
    $query .= " AND team_id = '{$safe_id}' "; 
    $query .= "ORDER BY full_name ASC";
    $users_set = mysqli_query($connection, $query);
    confirm_query($users_set);
    return $users_set;
}

function find_all_active_sales_agent_by_company($id){
    global $connection;
    $safe_id = mysqli_real_escape_string($connection, $id);

    $query  = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE (permission = 9 OR permission = 10) ";
    $query .= "AND status = 1 ";
    $query .= " AND company_id = '{$safe_id}' "; 
    $query .= "ORDER BY full_name ASC";
    $users_set = mysqli_query($connection, $query);
    confirm_query($users_set);
    return $users_set;
}

function find_users_by_department($department_id, $start, $end){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $query .= "ORDER BY status ASC, team_id ASC, designation DESC, full_name ASC ";
        $query .= "LIMIT {$start},{$end} ";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;
    }



function find_department_by_name($department_name) {
        global $connection;
        
        $safe_department_name = mysqli_real_escape_string($connection, $department_name);
        
        $query  = "SELECT * ";
        $query .= "FROM department ";
        $query .= "WHERE name = '{$safe_department_name}' ";
        $query .= "LIMIT 1";
        $department_set = mysqli_query($connection, $query);
        confirm_query($department_set);
        if($department = mysqli_fetch_assoc($department_set)) {
            return $department;
        } else {
            return null;
        }
    }

function find_department_by_id($department_id) {
        global $connection;
        
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        
        $query  = "SELECT * ";
        $query .= "FROM department ";
        $query .= "WHERE id = {$safe_department_id} ";
        $query .= "LIMIT 1";
        $department_set = mysqli_query($connection, $query);
        confirm_query($department_set);
        if($department = mysqli_fetch_assoc($department_set)) {
            return $department;
        } else {
            return null;
        }
    }

function find_company_by_id($company_id) {
        global $connection;
        
        $safe_company_id = mysqli_real_escape_string($connection, $company_id);
        
        $query  = "SELECT * ";
        $query .= "FROM company ";
        $query .= "WHERE id = {$safe_company_id} ";
        $query .= "LIMIT 1";
        $company_set = mysqli_query($connection, $query);
        confirm_query($company_set);
        if($company = mysqli_fetch_assoc($company_set)) {
            return $company;
        } else {
            return null;
        }
    }

    //user functions
function find_all_users() {
        global $connection;
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "ORDER BY full_name ASC";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;
    }

function find_user_by_id($user_id) {
        global $connection;
        
        $safe_user_id = mysqli_real_escape_string($connection, $user_id);
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE id = {$safe_user_id} ";
        $query .= "LIMIT 1";

        $user_set = mysqli_query($connection, $query);
        confirm_query($user_set);
        if($user = mysqli_fetch_assoc($user_set)) {
            return $user;
        } else {
            return null;
        }
    }

function find_user_id_by_keyword($keyword) {
        global $connection;
        
        $safe_keyword = mysqli_real_escape_string($connection, $keyword);
        
       $query  = "
			SELECT * 
			FROM users 
			WHERE CONCAT(full_name, username, email) 
			LIKE '%{$safe_keyword}%'
			LIMIT 1
			";

        $user_set = mysqli_query($connection, $query);
        confirm_query($user_set);
        if($user = mysqli_fetch_assoc($user_set)) {
            return $user['id'];
        } else {
            return null;
        }
    }

function find_user_permission(){
		$encryption_key = get_encryption_key();
        $permission_vector_key = get_permission_vector_key();
		$user_permission =  openssl_decrypt($_COOKIE["permission"], "AES-256-CBC", $encryption_key, 0, $permission_vector_key);
		return $user_permission;
	}

function find_user_by_username($username) {
        global $connection;
        
        $safe_username = mysqli_real_escape_string($connection, $username);
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE username = '{$safe_username}' ";
        $query .= "LIMIT 1";
        $record_set = mysqli_query($connection, $query);
        confirm_query($record_set);
        if($record = mysqli_fetch_assoc($record_set)) {
            return $record;
        } else {
            return null;
        }
    }
    
    function find_user_by_email($email) {
        global $connection;
        
        $safe_email = mysqli_real_escape_string($connection, $email);
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE email = '{$safe_email}' ";
        $query .= "LIMIT 1";
        $record_set = mysqli_query($connection, $query);
        confirm_query($record_set);
        if($record = mysqli_fetch_assoc($record_set)) {
            return $record;
        } else {
            return null;
        }
    }

function no_of_users(){
        global $connection;
        
        $query  = "SELECT COUNT('id') ";
        $query .= "FROM users ";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;
    }

function find_users_from($start,$end){
        global $connection;
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "ORDER BY full_name ASC " ;
        $query .= "LIMIT {$start},{$end}";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;}


?>