<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("password");
  validate_presences($required_fields);

  
    if ($_POST["password"] !== $_POST["validate_new_password"]) {
      $errors["validate_new_password"] = "New Password didn't Matched";
    }

    if (!attempt_login_user($user["username"], $_POST["current_password"])) {
        $errors["current_password"] = "Please type correct password.";
    }

    // Validate password length and complexity
    if (strlen($_POST["password"]) < 8 || strlen($_POST["password"]) > 20) {
        $errors["password_length"] = "Password must be between 8 and 20 characters long.";
    } 
    
    if (!preg_match("/\d/", $_POST["password"])) {
        $errors["password_without_number"] = "Password must contain at least one number.";
    }
     
    if (!preg_match("/[\W_]/", $_POST["password"])) {
        $errors["password_without_special"] = "Password must contain at least one special character.";
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
        $_SESSION["message"] = "Something went wrong.";
      }
    }
}
?>