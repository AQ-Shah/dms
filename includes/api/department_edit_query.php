<?php
if (isset($_POST['submit'])) {



      $department = find_department_by_id(decrypt_id($_GET["id"]));

      if (!$department) {
        // department ID was missing or invalid or 
        $_SESSION["message"] = "Unit Not Found.";
        redirect_to("departments");
      }
    
    
      if ($department["company_id"] != $user["company_id"]) {
        $_SESSION["message"] = "Unit Not Found.";
        redirect_to("departments");
      }
    
      if ($department["is_executive"]) {
        $_SESSION["message"] = "Cannot Edit the Executive Unit.";
        redirect_to("departments");
      }
      

  // Process the form

      // setting the values
      if (isset($_POST['prev_url'])) {$prev_url = $_POST["prev_url"];} else { $prev_url = 'home';}
      if (isset($_POST['name'])) {$name = mysql_prep($_POST["name"]);} else {$name = '';}
      if (isset($_POST['function-type'])) {$functionType = mysql_prep($_POST["function-type"]);} else {$functionType = '';}
  // validations
    $required_fields = array("name");
    validate_presences($required_fields);
  
    $fields_with_max_lengths = array("name" => 30 , "function-type" => 2);
    validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    // Perform Update

    $id = $department["id"];
  
    $query  = "UPDATE department SET name = '{$name}', ";
    $query .= "function_code ='{$functionType}' ";
    $query .= "WHERE id = {$id} LIMIT 1  ";
    
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // DB Success
        $_SESSION["message"] = "Unit updated.";
        header("Location: " . $prev_url);
        exit;
    } else {
      // DB Failure
        $_SESSION["message"] = send_errors($errors);
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
    //if not a post request
        $_SESSION["message"] = 'Something went wrong';
        header("Location: " . $prev_url);
        exit;
}
?>