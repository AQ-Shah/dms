<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "home";
	
    confirm_access($current_page);

function json_truck_by_id($id) {
    global $connection;

    $safe_id = mysqli_real_escape_string($connection, $id);
    $safe_company_id = $user["company_id"]; 

    $query = "
        SELECT *
        FROM trucks_info
        WHERE id = '{$safe_id}'
        AND company_id = '{$safe_company_id}' 
    ";
    echo $query;
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set, "find_truck_by_id");

    $truck_info = [];
    if ($data_set) {
        while ($data = mysqli_fetch_assoc($data_set)) {
            $truck_info[] = $data;
        }
    }

   return json_encode($truck_info);
}

$id = $_GET['id'];
if (find_truck_by_id($id)) {
    $trucks_info = json_truck_by_id($id);
    echo $trucks_info;
}


?>