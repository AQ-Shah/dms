<?php

if (isset($_GET["id"])){
    $department = find_department_by_id($_GET["id"]);
    if (!$department) {
    // department ID was missing or invalid or 
    // department couldn't be found in database
    redirect_to("departments");
    } else {

      $record_per_page = (isset ($_POST['no_of_record'])) ? (int)$_POST['no_of_record']  : 10 ;
      if (isset ($_GET['no_of_record']) && is_numeric($_GET['no_of_record'])) {
			$record_per_page= $_GET['no_of_record'];
			}
			
			if ($record_per_page > 0 && $record_per_page <= 100) {
			$no_of_records = no_of_users_by_department($department["id"]);
			$total_pages = ceil($no_of_records/$record_per_page);
			$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
			$start = ($page-1) * $record_per_page;
			$record_set = find_users_by_department($department["id"],$start,$record_per_page);
		}
		else { 
			$_SESSION["message"] = "Something went wrong.";
      		redirect_to("departments");
		}  
    }
}
else {redirect_to("departments");}

?>