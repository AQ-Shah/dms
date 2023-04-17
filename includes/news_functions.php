<?php
	//NEWS functions
	function find_all_news(){
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM news ";
		$query .= "ORDER BY id DESC ";
		echo $query;
		$set = mysqli_query($connection, $query);
		confirm_query($set);
		return $set;}
	function no_of_news(){
		global $connection;
		$query  = "SELECT COUNT('id') ";
		$query .= "FROM news ";
		$set = mysqli_query($connection, $query);
		confirm_query($set);
		return $set;}
	function find_news_from($start,$end) {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM news ";
		$query .= "ORDER BY id DESC ";
		$query .= "LIMIT {$start},{$end}";
		$set = mysqli_query($connection, $query);
		
		confirm_query($set);
		return $set;}
	function find_course_news_by_id($news_id){
		global $connection;
		$safe_news_id = mysqli_real_escape_string($connection, $news_id);
		$query  = "SELECT * ";
		$query .= "FROM course_news ";
		$query .= "WHERE id = {$safe_news_id} ";
		$query .= "LIMIT 1";
		$news_set = mysqli_query($connection, $query);
		confirm_query($news_set);
		if($news = mysqli_fetch_assoc($news_set)) {
			return $news;
		} else {
			return null;
		}}
	function find_news_by_id($news_id){
		global $connection;
		$safe_news_id = mysqli_real_escape_string($connection, $news_id);
		$query  = "SELECT * ";
		$query .= "FROM news ";
		$query .= "WHERE id = {$safe_news_id} ";
		$query .= "LIMIT 1";
		$news_set = mysqli_query($connection, $query);
		confirm_query($news_set);
		if($news = mysqli_fetch_assoc($news_set)) {
			return $news;
		} else {
			return null;
		}}
	function find_all_news_of_course($course_id) {
		global $connection;
		$safe_course_id = mysqli_real_escape_string($connection, $course_id);
		$query  = "SELECT * ";
		$query .= "FROM course_news ";
		$query .= "WHERE course_id = {$safe_course_id} ";
		$query .= "ORDER BY id DESC";
		$set = mysqli_query($connection, $query);
		confirm_query($set);
		return $set;}
	
	
?>
