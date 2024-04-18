<?php 
if (isset($_POST['submit'])) {

    // validations
    $required_fields = array("team_name", "department_id", "prev_url");
    validate_presences($required_fields);

    //validating the length
    $fields_with_max_lengths = array("team_name" => 30);
    validate_max_lengths($fields_with_max_lengths);
    
    // setting the values
     if (isset($_POST['team_name'])) $team_name = mysql_prep($_POST["team_name"]);
     if (isset($_POST['department_id'])) $department_id = mysql_prep($_POST["department_id"]);
     if (isset($_POST['prev_url'])) $prev_url = mysql_prep($_POST["prev_url"]);


    if (empty($errors)) {

        //find department by department ID, fetch company ID from that as well, valid user from same company. 
     
        $department = find_department_by_id($department_id);

        if ($department["company_id"] === $user("company_id")) { 
            $company_id = $department["company_id"];
        } else {
            $_SESSION["message"] = "Not Authorised";
            redirect_to("departments");
        }

        // Perform Create

        $sql = "INSERT INTO teams (name,  department_id) VALUES ('$team_name', '$department_id')";
        $result = mysqli_query($connection, $sql);
    

        if ($result) {
            // DB Success
            $_SESSION["message"] = "Successfully Updated";
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