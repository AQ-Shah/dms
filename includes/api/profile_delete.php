<?php

if (isset($_GET['id'])) {
  // Process the form
  if (isset($_GET['prev_url'])) {$prev_url = $_GET["prev_url"];} else { $prev_url = 'departments';}
  
  $user_id = mysql_prep($_GET["id"]);
  $userData = find_user_by_id(decrypt_id($user_id));

  if (!$userData) {
    // User ID was missing or invalid or 
    $_SESSION["message"] = "User Not Found.";
    header("Location: " . $prev_url);
    exit;  }

  if ($userData["is_main"]) {
    $_SESSION["message"] = "Main Id cannot be Deleted.";
    header("Location: " . $prev_url);
    exit;  }
  
  if ($userData["company_id"] != $user["company_id"]) {
    $_SESSION["message"] = "Something went wrong.";
    header("Location: " . $prev_url);
    exit;  }


  if (empty($errors)) {

    $safe_user_id = mysqli_real_escape_string($connection, $userData["id"]);
    $query = "DELETE FROM users WHERE id = {$safe_user_id} LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "User deleted.";
      header("Location: " . $prev_url);
      exit;    
    } else {
      // Failure
      $_SESSION["message"] = "something went wrong. Please contact Admin";
      header("Location: " . $prev_url);
      exit;
    }
      
  } else {
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