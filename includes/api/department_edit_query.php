<?php
if (isset($_POST['submit'])) {

    //location from which the redirect came
      $prev_url = $_POST['prev_url'];

    if($_GET["id"]){
        $department = find_department_by_id($_GET["id"]);
        }
    else
        redirect_to("manage_departments.php");
    
    if (!$department) {
        // department ID was missing or invalid or 
        // department couldn't be found in database
        redirect_to("manage_departments.php");
    }

  // Process the form

  
  // validations
    $required_fields = array("name");
    validate_presences($required_fields);
  
    $fields_with_max_lengths = array("name" => 30 , "email" => 30);
    validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    // Perform Update

    $id = $department["id"];
    $name = mysql_prep($_POST["name"]);
    $email = mysql_prep($_POST["email"]);
  
    $query  = "UPDATE department SET name = '{$name}', ";
    $query .= "email ='{$email}',";
    $query .= "website ='1' ";
    $query .= "WHERE id = {$id} LIMIT 1  ";
    
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // DB Success
        $_SESSION["message"] = "Department updated.";
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