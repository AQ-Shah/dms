<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password","full_name");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

	
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);
	$full_name = mysql_prep($_POST["full_name"]);
    if (isset($_POST['department_id'])) {$department_id = mysql_prep($_POST["department_id"]);} 
		else  $department_id = Null;
	if (isset($_POST['proficiency'])) {$proficiency = mysql_prep($_POST["proficiency"]);}
		else  $proficiency = Null;
	if (isset($_POST['phone_num'])) {$phone_num = mysql_prep($_POST["phone_num"]);}
		else  $phone_num = Null;
	if (isset($_POST['email'])) {$email = mysql_prep($_POST["email"]);}
		else  $email = Null;
	if (isset($_POST['gender'])) {$gender = mysql_prep($_POST["gender"]);}
		else  $gender = Null;
	if (isset($_POST['website'])) {$website = mysql_prep($_POST["website"]);}
		else  $website = Null;
	if (isset($_POST['about_me'])) {$about_me = mysql_prep($_POST["about_me"]);}
		else  $about_me = Null;
	if (isset($_POST['designation'])) {$designation = mysql_prep($_POST["designation"]);}
		else  $designation = Null;
	if (isset($_POST['birth_date'])) {$birth_date = mysql_prep($_POST["birth_date"]);}
		else  $birth_date = Null;
	if (isset($_POST['join_date'])) {$join_date = mysql_prep($_POST["join_date"]);}
		else  $join_date = Null;
	if (isset($_POST['email_privacy'])) {$email_privacy = mysql_prep($_POST["email_privacy"]);}
		else  $email_privacy = Null;
	if (isset($_POST['phone_privacy'])) {$phone_privacy = mysql_prep($_POST["phone_privacy"]);}
		else  $phone_privacy = Null;
	if (isset($_POST['birthday_privacy'])) {$birthday_privacy = mysql_prep($_POST["birthday_privacy"]);}
		else  $birthday_privacy = Null;
	if (isset($_POST['webisite_privacy'])) {$webisite_privacy = mysql_prep($_POST["webisite_privacy"]);}
		else  $webisite_privacy = Null;
	if (isset($_POST['about_privacy'])) {$about_privacy = mysql_prep($_POST["about_privacy"]);}
		else  $about_privacy = Null;

    $query  = "INSERT INTO users (";
    $query .= "  username, hashed_password, department_id, designation, full_name, proficiency, phone_num, birth_date, join_date, email, gender, website, about_me, email_privacy, phone_privacy, birthday_privacy, webisite_privacy, about_privacy";
    $query .= ") VALUES (";
    $query .= "  '{$username}', '{$hashed_password}', '{$department_id}', '{$designation}', '{$full_name}', '{$proficiency}', '{$phone_num}', '{$birth_date}', '{$join_date}', '{$email}', '{$gender}', '{$website}', '{$about_me}', '{$email_privacy}', '{$phone_privacy}', '{$birthday_privacy}', '{$webisite_privacy}', '{$about_privacy}'";
    $query .= ")";
	echo $query;
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "User created.";
	  if ($designation==1)
      redirect_to("manage_departments.php");
	else 
		redirect_to("manage_users.php");
    } else {
      // Failure
      $_SESSION["message"] = "User creation failed.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Create <?php 
	if (isset($_GET["designation"])){
	if ($_GET["designation"]){
		echo "Manager";}
	else 
		echo "Worker";
	}
	else 
		echo "User";
	
	?></h2>
    <form action="new_user.php" method="post">
      Username:
        <input type="text" name="username" value="" />
    
      Password:
        <input type="password" name="password" value="" />
      <br/><br/>
	<input type="radio" name="gender" value="male" checked> Male 
	<input type="radio" name="gender" value="female"> Female<br><br>
	<?php 
	if((isset($_GET["department_id"])) || ( (isset($_GET["designation"]))&&($_GET["designation"]==1)) ){
		echo '<input type="radio" name="designation" value="1" checked> Manager<br/><br/>';
		echo 'Department ID: <input type="text" name="department_id" value="';
			if(isset($_GET["department_id"])){
				echo $_GET["department_id"].'"'.'READONLY';
			}
			else {echo '"/>';}
		echo ' Proficiency:<input type="text" name="proficiency" value="" /><br/>';
	}
	elseif((isset($_GET["designation"]))&&($_GET["designation"]==0))
		echo  '<input type="radio" name="designation" value="0" checked> Worker<br/>';
	
	else {
		echo '<input type="radio" name="designation" value="1"> Manager ';	
		echo '<input type="radio" name="designation" value="0" checked> Worker<br/>';
	}
	 ?>
	<br/>
	Full Name:
        <input type="text" name="full_name" value="" />
     
	  <p>Joining Date:
        <input type="date" name="join_date" />
      </p>
	   <p>
	   Birth Date:
        <input type="date" name="birth_date"/>
		Private :  
	    <input type="radio" name="birthday_privacy" value="1" checked> Yes 
		<input type="radio" name="birthday_privacy" value="0"> No
      </p>
	  <p>
	  Phone Number:
        <input type="text" name="phone_num" value="" />
		Private :  
	    <input type="radio" name="phone_privacy" value="1" checked> Yes 
		<input type="radio" name="phone_privacy" value="0"> No
      </p>
	<p>
	Email Adress:
        <input type="text" name="email" value="" />
		Private :  
	    <input type="radio" name="email_privacy" value="1" checked> Yes 
		<input type="radio" name="email_privacy" value="0"> No
      </p>
	  <p>
<!-- Website:
        <input type="text" name="website" value="" />
		Private :  
	    <input type="radio" name="webisite_privacy" value="1" checked> Yes 
		<input type="radio" name="webisite_privacy" value="0"> No 
      </p>
	   <p> 
	   About Me: Private :  
	    <input type="radio" name="about_privacy" value="1" checked> Yes 
		<input type="radio" name="about_privacy" value="0"> No</p>
	    <textarea name="about_me" rows="6" cols="30"></textarea>
		-->
      <input type="submit" name="submit" value="Create User" />
    </form>
    <br />

   <?php 
	if(((isset($_GET["designation"])) && ($_GET["designation"])==1)|| (isset($_GET["department_id"])) ){
		echo '<a href="show_department.php?id=';
			if (isset($_GET["department_id"]))
				echo $_GET["department_id"];
			else echo 0;
		echo '">Cancel';
		}
	elseif ((isset($_GET["designation"])) && ($_GET["designation"])==0)
		echo '<a href="manage_students.php">Cancel' ;
	else
		echo '<a href="admin.php">Cancel';
	?></a>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
