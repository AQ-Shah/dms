<?php 
if (isset($_POST['submit'])) {

    //previous URL
    $prev_url = $_POST['prev_url'];
    
    // setting the values
     if (isset($_POST['name'])) {$name = mysql_prep($_POST["name"]);} else {$name = '';}
     if (isset($_POST['email'])) {$email = mysql_prep($_POST["email"]);} else {$email = '';}
    
     // validations
    $required_fields = array("name");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("name" => 30, , "email" => 30);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {
        // Perform Create

        $query  = "INSERT INTO department (";
        $query .= "  name, email";
        $query .= ") VALUES (";
        $query .= "  '{$name}', '{$email}'";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // DB Success
            $_SESSION["message"] = "Department created.";
            redirect_to("departments");
        } else {
            // DB Failure
            $_SESSION["message"] = "Something went wrong.";
            header("Location: " . $prev_url);
            exit;
        }
    } else {
        //if failed due to any form error
        $_SESSION["message"] = send_errors($errors);
        header("Location: " . $prev_url);
        exit;
    }
} else {
        //if it is not post request
            $_SESSION["message"] = "Something went wrong.";
            header("Location: " . $prev_url);
            exit;
}

?>