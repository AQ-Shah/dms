<?php
	    $record_per_page = (isset ($_POST['no_of_record'])) ? (int)$_POST['no_of_record']  : 50 ;
		if (isset ($_GET['no_of_record']) && is_numeric($_GET['no_of_record'])) {
			$record_per_page= $_GET['no_of_record'];
			}
			
		if ($record_per_page > 0 && $record_per_page <= 100) {
				//for Executives
				if (check_access("list_carriers")) {
					if (isset ($_GET['only_available'])) {

						if (isset ($_GET['keyword'])) {
							if (isset ($_GET['keyword']) && isset ($_GET['only_available']))
							$no_of_records = no_of_available_carrier_form_by_keyword($_GET['keyword']);
							$total_pages = ceil($no_of_records/$record_per_page);
							$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
							$start = ($page-1) * $record_per_page;
							$record_set = find_available_carrier_form_by_keyword_from($_GET['keyword'],$start,$record_per_page);
						}
						else {
							$no_of_records = no_of_working_carriers();
							$total_pages = ceil($no_of_records/$record_per_page);
							$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
							$start = ($page-1) * $record_per_page;
							$record_set = find_working_carrier_form_from($start,$record_per_page);
						}

						}  
					else if (isset ($_GET['only_unavailable'])){

						if (isset ($_GET['keyword'])) {
							$no_of_records = no_of_unavailable_carrier_form_by_keyword($_GET['keyword']);
							$total_pages = ceil($no_of_records/$record_per_page);
							$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
							$start = ($page-1) * $record_per_page;
							$record_set = find_unavailable_carrier_form_by_keyword_from($_GET['keyword'],$start,$record_per_page);
						} else {
							$no_of_records = no_of_unavailable_carriers();
							$total_pages = ceil($no_of_records/$record_per_page);
							$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
							$start = ($page-1) * $record_per_page;
							$record_set = find_unavailable_carrier_form_from($start,$record_per_page);
						}
						} 
						
					else if (isset ($_GET['only_removed'])){

						if (isset ($_GET['keyword'])) {
							$no_of_records = no_of_removed_carrier_form_by_keyword($_GET['keyword']);
							$total_pages = ceil($no_of_records/$record_per_page);
							$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
							$start = ($page-1) * $record_per_page;
							$record_set = find_removed_carrier_form_by_keyword_from($_GET['keyword'],$start,$record_per_page);
						} else {
							$no_of_records = no_of_removed_carriers();
							$total_pages = ceil($no_of_records/$record_per_page);
							$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
							$start = ($page-1) * $record_per_page;
							$record_set = find_removed_carrier_form_from($start,$record_per_page);
						}
						}

					else if (isset ($_GET['keyword'])) {
						$no_of_records = no_of_carrier_form_by_keyword($_GET['keyword']);
						$total_pages = ceil($no_of_records/$record_per_page);
						$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
						$start = ($page-1) * $record_per_page;
						$record_set = find_carrier_form_by_keyword_from($_GET['keyword'],$start,$record_per_page);
						} 
					
					else {
					$no_of_records = no_of_carrier_form();
					$total_pages = ceil($no_of_records/$record_per_page);
					$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
					$start = ($page-1) * $record_per_page;
					$record_set = find_carrier_form_from($start,$record_per_page);
					}
				}
				//for Dispatch team lead
				else if (check_access("list_dispatch_team_carriers")) {
					echo "team dispatch";
				}
				//for Sales team lead
				else if (check_access("list_sale_team_carriers")) {
					echo "team sale";
				}
				//for dispatch agent lead
				else if (check_access("list_dispatch_agent_carriers")) {
					echo " dispatch agent";
				}
				//for sales agent lead
				else if (check_access("list_sale_agent_carriers")) {
					echo " sale agent";
				}
				
		}
		else { 
			$_SESSION["message"] = "Something went wrong.";
			redirect_to("list_carriers");
		} 
?>