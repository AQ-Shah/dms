<?php

if (isset($_POST['submit'])) {
  
  if (empty($errors)) {
    // Perform Create
    if (isset($_POST['prev_url'])) {$prev_url = $_POST["prev_url"];} else { $prev_url = 'home';}
	  $id = $user["id"];
    $email_privacy = mysql_prep($_POST["email_privacy"]);
    $phone_privacy = mysql_prep($_POST["phone_privacy"]);
    $birthday_privacy = mysql_prep($_POST["birthday_privacy"]);
    $about_privacy = mysql_prep($_POST["about_privacy"]);
    $emergency_privacy = mysql_prep($_POST["emergency_privacy"]);
	
    $query  = "UPDATE users SET email_privacy ='{$email_privacy}',";
    $query .= "phone_privacy ='{$phone_privacy}',";
    $query .= "birthday_privacy ='{$birthday_privacy}',";
    $query .= "emergency_privacy ='{$emergency_privacy}',";
    $query .= "about_privacy ='{$about_privacy}' ";
    $query .= "WHERE id = {$id} LIMIT 1  ";
    
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
        // Success
        $_SESSION["message"] = "Profile Privacy Updated.";
        redirect_to("edit_privacy");
    } else {
      // Failure
      $_SESSION["message"] = "Something Went Wrong.";
    }
  }
} 

?>