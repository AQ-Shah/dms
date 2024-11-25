<?php
if (isset($_GET['id'])) {

  if (isset($_GET['prev_url'])) {$prev_url = $_GET["prev_url"];} else { $prev_url = 'departments';}
  $department = find_department_by_id(decrypt_id($_GET["id"]));

  if (!$department) {
    // department ID was missing or invalid or 
    $_SESSION["message"] = "Unit Not Found.";
    header("Location: " . $prev_url);
    exit;  }


  if ($department["company_id"] != $user["company_id"]) {
    $_SESSION["message"] = "Unit Not Found.";
    header("Location: " . $prev_url);
    exit;  }

  if ($department["is_executive"]) {
    $_SESSION["message"] = "Cannot Remove the Executive Unit.";
    header("Location: " . $prev_url);
    exit;  }

  if (no_of_teams_by_department($department["id"])) {
    $_SESSION["message"] = "Unit Has Staff in it, please remove or transfer them before deleting.";
    header("Location: " . $prev_url);
    exit;  }
  
  

  if (empty($errors)) {
    
    // Perform Update

    $id = $department["id"];
    $safe_department_id = mysqli_real_escape_string($connection, $id);
    $query = "DELETE FROM department WHERE id = {$safe_department_id} LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Unit deleted.";
      header("Location: " . $prev_url);
      exit;    
    } else {
      // Failure
      $_SESSION["message"] = "something went wrong. Please contact Admin";
      header("Location: " . $prev_url);
      exit;
    }
    
  } else {
      // Errors due to form
        $_SESSION["message"] = send_errors($errors);
        header("Location: " . $prev_url);
        exit;
    }
} else {
    //if not a Get request
        $_SESSION["message"] = 'Something went wrong';
        header("Location: " . $prev_url);
        exit;
}
?>