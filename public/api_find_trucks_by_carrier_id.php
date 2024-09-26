<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "home";
	
    confirm_access($current_page);

function find_trucks($id, $user) {
    global $connection;

    $safe_id = mysqli_real_escape_string($connection, $id);
    $safe_company_id = $user["company_id"]; 

    $query = "
        SELECT *
        FROM trucks_info
        WHERE carrier_id = '{$safe_id}'
        AND company_id = '{$safe_company_id}' 
    ";

    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set, "find_trucks_by_carrier_id");

    $trucks = [];
    if ($data_set) {
        while ($data = mysqli_fetch_assoc($data_set)) {
            $trucks[] = $data;
        }
    }

   return json_encode($trucks);
}

$id = $_GET['id'];
if (find_carrier_form_by_id($id)) {
    $trucks = find_trucks($id, $user);
    echo $trucks;
}


?>