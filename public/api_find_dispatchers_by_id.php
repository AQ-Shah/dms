<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "home";
	
    confirm_access($current_page);

function json_dispatchers_by_carrier_id($id, $user) {
    global $connection;

    $safe_id = mysqli_real_escape_string($connection, $id);
    $safe_company_id = $user["company_id"]; 

    // Fetch all dispatchers for this carrier
    $query = "
        SELECT u.id, u.full_name
        FROM carrier_dispatcher d
        JOIN users u ON d.d_id = u.id
        WHERE d.c_id = {$safe_id}
        AND company_id = '{$safe_company_id}' 
        ";
    $data_set = mysqli_query($connection, $query);
    confirm_query($data_set);

    $dispatchers_info = [];
    if ($data_set) {
        while ($data = mysqli_fetch_assoc($data_set)) {
            $dispatchers_info[] = $data;
        }
    }

   return json_encode($dispatchers_info);
}

$id = mysql_prep($_GET['id']);
if (find_carrier_form_by_id($id)) {
    $trucks_info = json_dispatchers_by_carrier_id($id, $user);
    echo $trucks_info;
}


?>