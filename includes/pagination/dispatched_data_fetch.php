<?php
	    $record_per_page = (isset ($_POST['no_of_record'])) ? (int)$_POST['no_of_record']  : 50 ;
		if (isset ($_GET['no_of_record']) && is_numeric($_GET['no_of_record'])) {
			$record_per_page= $_GET['no_of_record'];
			}
			
			if ($record_per_page > 0 && $record_per_page <= 100) {

				if (isset ($_GET['keyword'])) {

					$no_of_records = count_dispatch_list_by_carrier_name($_GET['keyword']);
					$total_pages = ceil($no_of_records/$record_per_page);
					$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
					$start = ($page-1) * $record_per_page;
					$record_set = find_dispatch_list_by_carrier_name_from($_GET['keyword'],$start,$record_per_page);

				} elseif (isset ($_GET['dispatcher_id'])) {

					$no_of_records = no_of_dispatched_by_dispatcher($_GET['dispatcher_id']);
					$total_pages = ceil($no_of_records/$record_per_page);
					$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
					$start = ($page-1) * $record_per_page;
					$record_set = find_dispatched_by_id_from($_GET['dispatcher_id'],$start,$record_per_page);

				} else {

					$no_of_records = no_of_dispatch_list();
					$total_pages = ceil($no_of_records/$record_per_page);
					$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
					$start = ($page-1) * $record_per_page;
					$record_set = find_dispatch_list_from($start,$record_per_page);
					
				}
			}
			else { 
				$_SESSION["message"] = "Something went wrong.";
				redirect_to("home");
			} 
?>