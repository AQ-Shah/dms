<?php
	    $record_per_page = (isset ($_POST['no_of_record'])) ? (int)$_POST['no_of_record']  : 50 ;
		if (isset ($_GET['no_of_record']) && is_numeric($_GET['no_of_record'])) {
			$record_per_page= $_GET['no_of_record'];
			}
			
		if ($record_per_page > 0 && $record_per_page <= 100) {
				//for Executives
				if (check_access("list_all_carriers")) {
					//GET information if any
					$no_of_records = (
						isset($_GET['keyword']) 
						? (
							isset($_GET['only_available']) ? no_of_available_carrier_form_by_keyword($_GET['keyword']) :
							(isset($_GET['only_unavailable']) ? no_of_unavailable_carrier_form_by_keyword($_GET['keyword']) :
							(isset($_GET['only_removed']) ? no_of_removed_carrier_form_by_keyword($_GET['keyword']) :
							no_of_carriers_by_company_by_keyword($user['company_id'],$_GET['keyword']))
							)
						)
						: (
							isset($_GET['only_available']) ? no_of_active_carriers_by_company() :
							(isset($_GET['only_unavailable']) ? no_of_unavailable_carriers():
							(isset($_GET['only_removed']) ? no_of_removed_carriers():
							no_of_carriers_by_company())
							)
						)
					);
					
					$total_pages = ceil($no_of_records/$record_per_page);
					$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
					$start = ($page-1) * $record_per_page;
					
					$record_set = (
						isset($_GET['keyword']) 
						? (
							isset($_GET['only_available']) ? find_available_carrier_form_by_keyword_from($_GET['keyword'], $start, $record_per_page) :
							(isset($_GET['only_unavailable']) ? find_unavailable_carrier_form_by_keyword_from($_GET['keyword'], $start, $record_per_page) :
							(isset($_GET['only_removed']) ? find_removed_carrier_form_by_keyword_from($_GET['keyword'], $start, $record_per_page) :
							find_carrier_form_by_keyword_from($_GET['keyword'], $start, $record_per_page))
							)
						)
						: (
							isset($_GET['only_available']) ? find_working_carrier_form_from($start, $record_per_page) :
							(isset($_GET['only_unavailable']) ? find_unavailable_carrier_form_from($start, $record_per_page) :
							(isset($_GET['only_removed']) ? find_removed_carrier_form_from($start, $record_per_page) :
							find_carrier_form_from($start, $record_per_page))
							)
						)
					);
				}
				//for Dispatch team lead
				else if (check_access("list_dispatch_team_carriers")) {
					$no_of_records = (
						isset($_GET['only_available']) ? no_of_available_carriers_by_team_dispatch($user["team_id"]) :
						(isset($_GET['only_unavailable']) ? no_of_unavailable_carriers_by_team_dispatch($user["team_id"]) :
						no_of_all_carriers_by_team_dispatch($user["team_id"]))
					);

					$total_pages = ceil($no_of_records/$record_per_page);
					$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
					$start = ($page-1) * $record_per_page;
					
					$record_set = (
						isset($_GET['only_available']) ? find_available_carriers_by_team_dispatch_form_from($user["team_id"],$start, $record_per_page) :
						(isset($_GET['only_unavailable']) ? find_unavailable_carriers_by_team_dispatch_form_from($user["team_id"],$start, $record_per_page) :
						find_all_carriers_by_team_dispatch_form_from($user["team_id"],$start, $record_per_page))
					);
				}
				//for Sales team lead
				else if (check_access("list_sales_team_carriers")) {
					$no_of_records = (
						isset($_GET['only_available']) ? no_of_available_carriers_by_team_sales($user["team_id"]) :
						(isset($_GET['only_unavailable']) ? no_of_unavailable_carriers_by_team_sales($user["team_id"]) :
						no_of_all_carriers_by_team_sales($user["team_id"])
						)
					);

					$total_pages = ceil($no_of_records/$record_per_page);
					$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
					$start = ($page-1) * $record_per_page;
					
					$record_set = (
						isset($_GET['only_available']) ? find_available_carriers_by_team_sales_form_from($user["team_id"],$start, $record_per_page) :
						(isset($_GET['only_unavailable']) ? find_unavailable_carriers_by_team_sales_form_from($user["team_id"],$start, $record_per_page) :
						find_all_carriers_by_team_sales_form_from($user["team_id"],$start, $record_per_page)
						)
					);
				}
				//for dispatch agent lead
				else if (check_access("list_dispatch_agent_carriers")) {
					$no_of_records = (
						isset($_GET['only_available']) ? no_of_available_carriers_by_dispatcher($user["id"]) :
						(isset($_GET['only_unavailable']) ? no_of_unavailable_carriers_by_dispatcher($user["id"]) :
						no_of_all_carriers_by_dispatcher($user["id"]))
					);

					$total_pages = ceil($no_of_records/$record_per_page);
					$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
					$start = ($page-1) * $record_per_page;
					
					$record_set = (
						isset($_GET['only_available']) ? find_available_carriers_by_dispatcher_form_from($user["id"],$start, $record_per_page) :
						(isset($_GET['only_unavailable']) ? find_unavailable_carriers_by_dispatcher_form_from($user["id"],$start, $record_per_page) :
						find_all_carriers_by_dispatcher_form_from($user["id"],$start, $record_per_page))
					);
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