<?php 


function find_all_discussions(){
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM forum_subject ";
		$query .= "WHERE company_id = '{$user['company_id']}' ";
		$subject_set = mysqli_query($connection, $query);
		confirm_query($subject_set);
		return $subject_set;

}
function find_discussion_by_id($id){
		global $connection;
		$safe_id = mysqli_real_escape_string($connection, $id);
		$query  = "SELECT * ";
		$query .= "FROM forum_subject ";
		$query .= "WHERE id = '{$safe_id}' ";
		$query .= "AND company_id = '{$user['company_id']}' ";
		$query .= "LIMIT 1";
		$set = mysqli_query($connection, $query);
		confirm_query($set);
		if($forum = mysqli_fetch_assoc($set)) {
			return $forum;
		} else {
			return null;
		}

}
function find_discussions_from($start, $end){
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM forum_subject ";
		$query .= "WHERE company_id = '{$user['company_id']}' ";
		$query .= "ORDER BY id DESC ";
		$query .= "LIMIT {$start},{$end}";
		$set = mysqli_query($connection, $query);
		
		confirm_query($set);
		echo $query." & ".$set;
		return $set;}

function no_of_discussions(){
		global $connection;
		$query  = "SELECT COUNT('id') ";
		$query .= "FROM forum_subject ";
		$query .= "WHERE company_id = '{$user['company_id']}' ";
		$set = mysqli_query($connection, $query);

		confirm_query($set);
		echo $query." & ".$set;
		return max(mysqli_fetch_assoc($set));}

//replies 
		
function no_of_replies($topic_id){
		global $connection;
		$safe_topic_id = mysqli_real_escape_string($connection, $topic_id);
		$query  = "SELECT COUNT('id') ";
		$query .= "FROM forum_replies ";
		$query .= "WHERE topic_id = {$safe_topic_id} ";
		$query .= "AND company_id = '{$user['company_id']}' ";
		$set = mysqli_query($connection, $query);
		confirm_query($set);
		return max(mysqli_fetch_assoc($set));}
		
function find_all_replies_from($topic_id, $start, $end){
		global $connection;
		$safe_topic_id = mysqli_real_escape_string($connection, $topic_id);
		$query  = "SELECT * ";
		$query .= "FROM forum_replies ";
		$query .= "WHERE topic_id = {$safe_topic_id} ";
		$query .= "AND company_id = '{$user['company_id']}' ";
		$query .= "ORDER BY id DESC ";
		$query .= "LIMIT {$start},{$end}";
		$set = mysqli_query($connection, $query);
		confirm_query($set);
		return $set;}

function find_all_replies($topic_id){
		global $connection;
		$safe_topic_id = mysqli_real_escape_string($connection, $topic_id);
		$query  = "SELECT * ";
		$query .= "FROM forum_replies ";
		$query .= "WHERE topic_id = {$safe_topic_id} ";
		$query .= "AND company_id = '{$user['company_id']}' ";
		$query .= "ORDER BY id DESC ";
		$replies_set = mysqli_query($connection, $query);
		confirm_query($replies_set);
		return $replies_set;
	}

?>