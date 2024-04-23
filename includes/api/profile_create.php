  <?php 
  
      // Process the form
      if (isset($_POST['prev_url'])) {$prev_url = $_POST["prev_url"];} else { $prev_url = 'home';}
      if (isset($_POST['email'])) {$email = mysql_prep($_POST["email"]);}
      if (isset($_POST['password'])) {$hashed_password = password_encrypt($_POST["password"]);}
      if (isset($_POST['full_name'])) {$full_name = mysql_prep($_POST["full_name"]);}
      if (isset($_POST['company_id'])) {$company_id = mysql_prep($_POST["company_id"]);}
      if (isset($_POST['department_id'])) {$department_id = mysql_prep($_POST["department_id"]);}
      if (!empty($_POST['birth_date']))  {$birth_date = mysql_prep($_POST["birth_date"]);} 
      if (!empty($_POST['join_date'])) {$join_date = mysql_prep($_POST["join_date"]);}
      
      $team_id = isset($_POST['team_id']) ? mysql_prep($_POST["team_id"]) : 0;
      $phone_num = isset($_POST['phone_num']) ? mysql_prep($_POST["phone_num"]) : NULL;
      $gender = isset($_POST['gender']) ? mysql_prep($_POST["gender"]) : 'male';
      $emergency_contact = isset($_POST['emergency_contact']) ? mysql_prep($_POST["emergency_contact"]) : NULL;
      $about_me = isset($_POST['about_me']) ? mysql_prep($_POST["about_me"]) : NULL;
      $email_privacy = isset($_POST['email_privacy']) ? mysql_prep($_POST["email_privacy"]) : 0;
      $phone_privacy = isset($_POST['phone_privacy']) ? mysql_prep($_POST["phone_privacy"]) : 0;
      $birthday_privacy = isset($_POST['birthday_privacy']) ? mysql_prep($_POST["birthday_privacy"]) : 0;
      $emergency_privacy = isset($_POST['emergency_privacy']) ? mysql_prep($_POST["emergency_privacy"]) : 0;
      $about_privacy = isset($_POST['about_privacy']) ? mysql_prep($_POST["about_privacy"]) : 0;
    
      if (find_department_is_executive($department_id))
        $role_id = 1; 
      else  $role_id = isset($_POST['role_id']) ? mysql_prep($_POST["role_id"]) : 0;
      $permission = find_permission($role_id);
      $designation = find_designation($role_id);

    // validations
    $required_fields = array("email", "password", "full_name", "company_id", "department_id");
    validate_presences($required_fields);
    
    $fields_with_max_lengths = array("email" => 30, "full_name" => 30, "password" => 20,);
    validate_max_lengths($fields_with_max_lengths);
    
    if (find_user_by_email($email)) {
        global $errors;
        $errors[$email] =  "email (".fieldname_as_text($email) .") already exists";
    }
    if (empty($errors)) {

        $query  = "INSERT INTO users (";
        $query .= "  email, hashed_password, company_id, department_id, team_id, designation, full_name, permission, phone_num, gender, emergency_contact, about_me, email_privacy, phone_privacy, birthday_privacy, emergency_privacy, about_privacy";
        if (isset($birth_date) && isset ($join_date)) $query .= ", birth_date, join_date";
        $query .= ") VALUES (";
        $query .= "  '{$email}', '{$hashed_password}', '{$company_id}', '{$department_id}', '{$team_id}', '{$designation}', '{$full_name}', '{$permission}', '{$phone_num}', '{$gender}', '{$emergency_contact}', '{$about_me}', '{$email_privacy}', '{$phone_privacy}', '{$birthday_privacy}', '{$emergency_privacy}', '{$about_privacy}'";
        if (isset($birth_date) && isset ($join_date)) $query .= ", '{$birth_date}', '{$join_date}'";
        $query .= ")";
        
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Success
            $_SESSION["message"] = "User created.";
            header("Location: " . $prev_url);
            exit;
        
        } else {
            // Failure
            // $_SESSION["message"] = "something went wrong.";
            // header("Location: " . $prev_url);
            // exit;

        }
  } else {
     $_SESSION["message"] = send_errors($errors);
        header("Location: " . $prev_url);
        exit;
  }

  ?>