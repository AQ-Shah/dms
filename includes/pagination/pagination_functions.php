<?php

	function add_pagination ($page,$total_pages,$current_page,$record_per_page){
		
		if ($total_pages>=1 && $page <= $total_pages){
			echo '<ul class="pagination">';
			  for ($x=1;$x<=$total_pages;$x++){
				if ($x == $page){
				  echo '<li class="page-item active">';
				}
				else {
				  echo '<li class="page-item">';
				}
				echo '<a class="page-link" href="'.$current_page.'?page='.$x.'&&no_of_record='.$record_per_page;
				echo '">'.$x.'</a></li> ';

			  }
			echo '</ul>';
			}
		}
		
	function filter_users($filter, $search) {
  		global $connection;
  
  		$query = "SELECT *
            FROM users
            WHERE LOWER($filter) LIKE '%" . mysqli_real_escape_string($connection, strtolower($search)) . "%'
            ORDER BY id ASC";
            
		$record_set = mysqli_query($connection, $query);
		confirm_query($record_set);
		return $record_set;}
	function total_user_pages($record_per_page){
			$count_query = no_of_users();
			$no_of_records = max(mysqli_fetch_assoc($count_query));
			$total_pages = ceil($no_of_records/$record_per_page);
			return $total_pages;
		}

	function pagination_for_users($record_per_page,$page){
			$total_pages = total_user_pages($record_per_page);
			$start = ($page-1) * $record_per_page;
			$record_set = find_users_from($start,$record_per_page);
			return $record_set;
		}
	function total_news_pages($record_per_page){
			$count_query = no_of_news();
			$no_of_records = max(mysqli_fetch_assoc($count_query));
			$total_pages = ceil($no_of_records/$record_per_page);
			return $total_pages;
		}

	function pagination_for_news($record_per_page,$page){
			$total_pages = total_news_pages($record_per_page);
			$start = ($page-1) * $record_per_page;
			$record_set = find_news_from($start,$record_per_page);
			return $record_set;
		}

?>