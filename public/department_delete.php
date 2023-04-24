<?php 
  require_once("../includes/public_require.php"); 
    $current_page = "department_create";
   include("../includes/layouts/public_header.php"); 

    //once verified the access it will continue 
    
  $department = find_department_by_id($_GET["id"]);

  if (!$department) {
    // department ID was missing or invalid or 
    // department couldn't be found in database
    redirect_to("departments");
  }
  
  $id = $department["id"];
  $safe_admin_id = mysqli_real_escape_string($connection, $id);
  $query = "DELETE FROM department WHERE id = {$safe_admin_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Department deleted.";
    redirect_to("departments");
  } else {
    // Failure
    $_SESSION["message"] = "something went wrong.";
    redirect_to("departments");
  }
  
?>