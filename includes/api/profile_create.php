  <?php 
  
  $prev_url = $_POST['prev_url'];
  
    // Process the form
  
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);
	$full_name = mysql_prep($_POST["full_name"]);

    // validations
    $required_fields = array("username", "password","full_name");
    validate_presences($required_fields);
    
    $fields_with_max_lengths = array("username" => 30, "full_name" => 30, "password" => 20,);
    validate_max_lengths($fields_with_max_lengths);
    
    if (find_user_by_username($username)) {
        global $errors;
        $errors[$username] =  "Username (".fieldname_as_text($username) .") already exists";
    }
    if (empty($errors)) {
        // Perform Create
	
    if (isset($_GET['department_id'])) {
        $department_id = mysql_prep($_GET["department_id"]);
        $permission = find_permission($department_id);
        $designation = find_designation($department_id);
    } 	else  {
             $_SESSION["message"] = "something went wrong";
             redirect_to("home");
        };
        
	if (isset($_POST['phone_num'])) {$phone_num = mysql_prep($_POST["phone_num"]);}
		else  $phone_num = Null;
	if (isset($_POST['email'])) {$email = mysql_prep($_POST["email"]);}
		else  $email = Null;
	if (isset($_POST['gender'])) {$gender = mysql_prep($_POST["gender"]);}
		else  $gender = 'male';
	if (isset($_POST['emergency_contact'])) {$emergency_contact = mysql_prep($_POST["emergency_contact"]);}
		else  $emergency_contact = Null;
	if (isset($_POST['about_me'])) {$about_me = mysql_prep($_POST["about_me"]);}
		else  $about_me = Null;

	if (!empty($_POST['birth_date']))  {$birth_date = mysql_prep($_POST["birth_date"]);} 

	if (!empty($_POST['join_date'])) {$join_date = mysql_prep($_POST["join_date"]);}

	if (isset($_POST['email_privacy'])) {$email_privacy = mysql_prep($_POST["email_privacy"]);}
		else  $email_privacy = 0;
	if (isset($_POST['phone_privacy'])) {$phone_privacy = mysql_prep($_POST["phone_privacy"]);}
		else  $phone_privacy = 0;
	if (isset($_POST['birthday_privacy'])) {$birthday_privacy = mysql_prep($_POST["birthday_privacy"]);}
		else  $birthday_privacy = 0;
	if (isset($_POST['emergency_privacy'])) {$emergency_privacy = mysql_prep($_POST["emergency_privacy"]);}
		else  $emergency_privacy = 0;
	if (isset($_POST['about_privacy'])) {$about_privacy = mysql_prep($_POST["about_privacy"]);}
		else  $about_privacy = 0;

    $query  = "INSERT INTO users (";
    $query .= "  username, hashed_password, department_id, designation, full_name, permission, phone_num,  email, gender, emergency_contact, about_me, email_privacy, phone_privacy, birthday_privacy, emergency_privacy, about_privacy";
    if (isset($birth_date) && isset ($join_date)) $query .= ",birth_date, join_date";
    $query .= ") VALUES (";
    $query .= "  '{$username}', '{$hashed_password}', '{$department_id}', '{$designation}', '{$full_name}', '{$permission}', '{$phone_num}', '{$email}', '{$gender}', '{$emergency_contact}', '{$about_me}', '{$email_privacy}', '{$phone_privacy}', '{$birthday_privacy}', '{$emergency_privacy}', '{$about_privacy}'";
    if (isset($birth_date) && isset ($join_date)) $query .= ", '{$birth_date}', '{$join_date}'";
    $query .= ")";
    echo $query;
    $result = mysqli_query($connection, $query);

    if ($result) {
         // Success
        $_SESSION["message"] = "User created.";
        header("Location: " . $prev_url);
        exit;
	 
    } else {
        // Failure
        // $_SESSION["message"] = "User creation failed.";
        // header("Location: " . $prev_url);
        // exit;

    }
  } else {
     $_SESSION["message"] = send_errors($errors);
        header("Location: " . $prev_url);
        exit;
  }

  ?>