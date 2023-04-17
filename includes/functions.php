<?php
	//setting default timezone

	include("news_functions.php");
	include("admin_functions.php");
	include("staff_functions.php");
	include("access_functions.php");
	include("../includes/pagination/pagination_functions.php");
	include("../includes/crud/carrier_search_functions.php");
	
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

	//pagination functions



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
		$query .= "WHERE reciever_id = '{$safe_user_id}' ";
		$set = mysqli_query($connection, $query);
		confirm_query($set);
		return $set;
}
function find_notifications_of_from($user_id,$start,$end){
		global $connection;
		$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		$query  = "SELECT * ";
		$query .= "FROM notification ";
		$query .= "WHERE reciever_id = '{$safe_user_id}' ";
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
		$query .= "WHERE reciever_id = '{$safe_user_id}' ";
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
	$seen = 0;
	$upload_date = date("Y-m-d");
	$upload_time = date('H:i:s');
    $query  = "INSERT INTO notification (";
    $query .= "  reciever_id, sender_id, content, link, seen, upload_date, 	upload_time ";
    $query .= ") VALUES (";
    $query .= "  '{$safe_to}', '{$safe_from}', '{$safe_content}', '{$safe_link}', '{$seen}', '{$upload_date}', '{$upload_time}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);
	confirm_query($result);
}

// forums

function find_all_forums(){
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM forum_subject ";
		$subject_set = mysqli_query($connection, $query);
		confirm_query($subject_set);
		return $subject_set;

}
function find_forum_by_id($id){
		global $connection;
		$safe_id = mysqli_real_escape_string($connection, $id);
		$query  = "SELECT * ";
		$query .= "FROM forum_subject ";
		$query .= "WHERE id = '{$safe_id}' ";
		$query .= "LIMIT 1";
		$set = mysqli_query($connection, $query);
		confirm_query($set);
		if($forum = mysqli_fetch_assoc($set)) {
			return $forum;
		} else {
			return null;
		}

}
function find_all_forums_from($start, $end){
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM forum_subject ";
		$query .= "ORDER BY id DESC ";
		$query .= "LIMIT {$start},{$end}";
		$forums_set = mysqli_query($connection, $query);
		confirm_query($forums_set);
		return $forums_set;
	}

function no_of_forums(){
		global $connection;
		$query  = "SELECT COUNT('id') ";
		$query .= "FROM forum_subject ";
		$count = mysqli_query($connection, $query);
		confirm_query($count);
		return $count;
}
function no_of_replies($topic_id){
		global $connection;
		$safe_topic_id = mysqli_real_escape_string($connection, $topic_id);
		$query  = "SELECT COUNT('id') ";
		$query .= "FROM forum_replies ";
		$query .= "WHERE topic_id = {$safe_topic_id} ";
		$count = mysqli_query($connection, $query);
		confirm_query($count);
		return $count;
}
function find_all_replies_from($topic_id, $start, $end){
		global $connection;
		$safe_topic_id = mysqli_real_escape_string($connection, $topic_id);
		$query  = "SELECT * ";
		$query .= "FROM forum_replies ";
		$query .= "WHERE topic_id = {$safe_topic_id} ";
		$query .= "ORDER BY id DESC ";
		$query .= "LIMIT {$start},{$end}";
		$replies_set = mysqli_query($connection, $query);
		confirm_query($replies_set);
		return $replies_set;
	}
function find_all_replies($topic_id){
		global $connection;
		$safe_topic_id = mysqli_real_escape_string($connection, $topic_id);
		$query  = "SELECT * ";
		$query .= "FROM forum_replies ";
		$query .= "WHERE topic_id = {$safe_topic_id} ";
		$query .= "ORDER BY id DESC ";
		$replies_set = mysqli_query($connection, $query);
		confirm_query($replies_set);
		return $replies_set;
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
		$user = find_user_by_username($username);
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
	function user_logged_in() {
		 if (isset($_SESSION['id'])){
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