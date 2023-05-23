<?php
	    $record_per_page = (isset ($_POST['no_of_record'])) ? (int)$_POST['no_of_record']  : 50 ;
		if (isset ($_GET['no_of_record']) && is_numeric($_GET['no_of_record'])) {
			$record_per_page= $_GET['no_of_record'];
			}
			
			if ($record_per_page > 0 && $record_per_page <= 100) {
			$no_of_records = no_of_my_cancelled_dispatch_list($user["id"]);
			$total_pages = ceil($no_of_records/$record_per_page);
			$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
			$start = ($page-1) * $record_per_page;
			$record_set = find_my_cancelled_dispatch_list_from($user["id"],$start,$record_per_page);
		}
		else { 
			$_SESSION["message"] = "Something went wrong.";
      		redirect_to("home");
		} 
?>