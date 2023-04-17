<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("password");
  validate_presences($required_fields);
  if ($_POST["password"] === $_POST["validate_new_password"]){
	 $password_check = attempt_login_user($user["username"], $_POST["current_password"]);
	 if (!$password_check){ 
		$_SESSION["message"] = "Please type correct password";
		redirect_to("change_password.php");
	 }
  }
  else {
	  $_SESSION["message"] = "New Password didnot Match";
	  redirect_to("change_password.php");
  }
  if (empty($errors)) {
    
    // Perform Update

    $id = $user["id"];
    $hashed_password = password_encrypt($_POST["password"]);
  
    $query  = "UPDATE users SET ";
    $query .= "hashed_password = '{$hashed_password}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Password Changed";
      redirect_to("home.php");
    } else {
      // Failure
      $_SESSION["message"] = "Couldnt Change the Password.";
    }
  }
}
?>