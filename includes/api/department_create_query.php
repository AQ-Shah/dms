<?php 
if (isset($_POST['submit'])) {


    
    // setting the values
    if (isset($_POST['prev_url'])) {$prev_url = $_POST["prev_url"];} else { $prev_url = 'home';}
    if (isset($_POST['name'])) {$name = mysql_prep($_POST["name"]);} else {$name = '';}
    if (isset($_POST['function-type'])) {$functionType = mysql_prep($_POST["function-type"]);} else {$functionType = '';}
   
    $company_id = $user['company_id'];

    // validations
    $required_fields = array("name","function-type");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("name" => 30 , "function-type" => 2);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {
        // Perform Create
        
        $query  = "INSERT INTO department (";
        $query .= "  name, function_code, company_id";
        $query .= ") VALUES (";
        $query .= "  '{$name}', '{$functionType}', '{$company_id}'";
        $query .= ")";
        $result = mysqli_query($connection, $query);
        if ($result) {
            // DB Success
            $_SESSION["message"] = "Unit created.";
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