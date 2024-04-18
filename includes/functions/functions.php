<?php
	//setting default timezone

	require_once("news_functions.php");
	require_once("admin_functions.php");
	require_once("staff_functions.php");
	require_once("access_functions.php");
	require_once("pagination_functions.php");
	require_once("carrier_search_functions.php");
	require_once("truck_search_functions.php");
	require_once("dispatch_search_functions.php");
	require_once("invoice_functions.php");
	require_once("discussion_functions.php");
	require_once("validation_functions.php");
	
	
	function redirect_to($url)
    {
        if (!headers_sent())
        {    
            header('Location: '.$url);
            exit;
            }
        else
            {  
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>'; exit;
        }
    }

	function goBack() {
  		header("Location: {$_SERVER['HTTP_REFERER']}");
  		exit;
	}
	
	function mysql_prep($string) {
		global $connection;

		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}
	function dateTime_to_string($datetime){
		$date= $datetime;
		$result = $date->format('Y-m-d-H-i-s');
		$krr = explode('-',$result);
		$result = implode("",$krr);
		return $result;
	}
	function find_day ($date){
		return date('l',strtotime($date));
	}
	function find_week($date){
		return date('W',strtotime($date));
	}
	function add_day($date){
		return date('Y-m-d', strtotime($date . ' +1 day'));
	}
	function allowed_ext(){
		return array ('docx','doc','txt','pdf','pptx','zip');
	}
	function remove_spaces($string){
		return $string = str_replace(' ', '', $string);
	}

	function find_commission($percentage, $rate){
		  return ($percentage / 100) * $rate; 
	}


		// Notification functions
	function find_notification($id){
			global $connection;

			$safe_id = mysqli_real_escape_string($connection, $id);

			$query  = "SELECT * ";
			$query .= "FROM notification ";
			$query .= "WHERE id = '{$safe_id}' ";
			$query .= "LIMIT 1";
			$notification_set = mysqli_query($connection, $query);
			confirm_query($notification_set);
			if($notification = mysqli_fetch_assoc($notification_set)) {
				return $notification;
			} else {
				return null;
			}
	}
	function find_notifications_of($user_id){
			global $connection;
			$safe_user_id = mysqli_real_escape_string($connection, $user_id);
			$query  = "SELECT * ";
			$query .= "FROM notification ";
			$query .= "WHERE receiver_id = '{$safe_user_id}' ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
	}
	function find_notifications_of_from($user_id,$start,$end){
			global $connection;
			$safe_user_id = mysqli_real_escape_string($connection, $user_id);
			$query  = "SELECT * ";
			$query .= "FROM notification ";
			$query .= "WHERE receiver_id = '{$safe_user_id}' ";
			$query .= "ORDER BY id DESC ";
			$query .= "LIMIT {$start},{$end}";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
	}

	function count_unseen_notifications_of($user_id){
			global $connection;
			$safe_user_id = mysqli_real_escape_string($connection, $user_id);
			$query  = "SELECT COUNT('id') ";
			$query .= "FROM notification ";
			$query .= "WHERE receiver_id = '{$safe_user_id}' ";
			$query .= "AND seen = 0 ";
			$set = mysqli_query($connection, $query);
			confirm_query($set);
			return $set;
	}
	function create_notification($to,$from,$content,$link){
		global $connection;
		$safe_to = mysqli_real_escape_string($connection, $to);
		$safe_from = mysqli_real_escape_string($connection, $from);
		$safe_content = mysqli_real_escape_string($connection, $content);
		$safe_link = mysqli_real_escape_string($connection, $link);
		$upload_date = date("Y-m-d");
		$upload_time = date('H:i:s');
		$query  = "INSERT INTO notification (";
		$query .= "  receiver_id, sender_id, content, link ";
		$query .= ") VALUES (";
		$query .= "  '{$safe_to}', '{$safe_from}', '{$safe_content}', '{$safe_link}'";
		$query .= ")";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
	}

//encryption functions 

	function get_encryption_key() {
		require_once("../includes/config.php");
		return ENCRYPTION_KEY;
	}
	function get_id_vector_key() {
		require_once("../includes/config.php");
		return ID_VECTOR_KEY;
	}
	function get_permission_vector_key() {
		require_once("../includes/config.php");
		return PERMISSION_VECTOR_KEY;
	}


//PASSWORD FUNCTIONS
	function password_encrypt($password) {
  	$hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
	  $salt_length = 22; 					// Blowfish salts should be 22-characters or more
	  $salt = generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
		return $hash;
	}

	function generate_salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));

		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);

		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);

		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);

		return $salt;
	}

	function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
	}


	function attempt_login_user($username, $password) {
		$user = find_user_by_email($username);
		if (!$user) $user = find_user_by_username($username);
		
		if ($user) {
			// found user, now check password
			if (password_check($password, $user["hashed_password"])) {
				// password matches
				return $user;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
	}
	function attempt_login($username, $password) {
		$admin = find_admin_by_username($username);
		if ($admin) {
			// found admin, now check password
			if (password_check($password, $admin["hashed_password"])) {
				// password matches
				return $admin;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
	}

	function logged_in() {
		 if (isset($_SESSION['admin_id'])){
			 return true ;
		}
	}

	function find_user_id(){
		$encryption_key = get_encryption_key();
		$id_vector_key = get_id_vector_key();

		$user_id =  openssl_decrypt($_COOKIE["id"], "AES-256-CBC", $encryption_key, 0, $id_vector_key);
		return $user_id;
	}


	function user_logged_in() {
		$user_id = find_user_id();
		if (isset($user_id) && !empty($user_id)) {
			 return true ;
		}
	}

	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login");
		}
	}
	function confirm_user_logged_in() {
		if (!user_logged_in()) {
			redirect_to("login");
		}
	}


?>