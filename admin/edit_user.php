<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
if(isset($_GET["id"])){
  $user = find_user_by_id($_GET["id"]);
  }
else
	redirect_to("admin.php");
  if (!$user) {
    // user ID was missing or invalid or 
    // user couldn't be found in database
    redirect_to("admin.php");
  }
?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("full_name");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Perform Create
	$id = $user["id"];
    $department_id = mysql_prep($_POST["department_id"]);
	$full_name = mysql_prep($_POST["full_name"]);
	$proficiency = mysql_prep($_POST["proficiency"]);
	$phone_num = mysql_prep($_POST["phone_num"]);
	$email = mysql_prep($_POST["email"]);
	$gender = mysql_prep($_POST["gender"]);
	$website = mysql_prep($_POST["website"]);
	$about_me = mysql_prep($_POST["about_me"]);
	$designation = mysql_prep($_POST["designation"]);
	$birth_date = mysql_prep($_POST["birth_date"]);
	$join_date = mysql_prep($_POST["join_date"]);
	$email_privacy = mysql_prep($_POST["email_privacy"]);
	$phone_privacy = mysql_prep($_POST["phone_privacy"]);
	$birthday_privacy = mysql_prep($_POST["birthday_privacy"]);
	$webisite_privacy = mysql_prep($_POST["webisite_privacy"]);
	$about_privacy = mysql_prep($_POST["about_privacy"]);
	
     $query  = "UPDATE users SET department_id = '{$department_id}', ";
	$query .= "full_name ='{$full_name}',";
	$query .= "proficiency ='{$proficiency}',";
	$query .= "phone_num ='{$phone_num}',";
	$query .= "email ='{$email}',";
	$query .= "gender ='{$gender}',";
	$query .= "website ='{$website}',";
	$query .= "about_me ='{$about_me}',";
	$query .= "designation ='{$designation}',";
	$query .= "birth_date ='{$birth_date}',";
	$query .= "join_date ='{$join_date}',";
	$query .= "email_privacy ='{$email_privacy}',";
	$query .= "phone_privacy ='{$phone_privacy}',";
	$query .= "birthday_privacy ='{$birthday_privacy}',";
	$query .= "webisite_privacy ='{$webisite_privacy}',";
	$query .= "about_privacy ='{$about_privacy}' ";
	$query .= "WHERE id = {$id} LIMIT 1  ";
    
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "User updated.";
      redirect_to("manage_departments.php");
    } else {
      // Failure
      $_SESSION["message"] = "User update failed.";
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
    
    <h2>Edit User: <?php echo htmlentities($user["full_name"]); ?></h2>
    <form action="edit_user.php?id=<?php echo urlencode($user["id"]); ?>" method="post">
      
	  <?php 
	 if ($user["designation"]==1) {?>
	 <input type="radio" name="designation" value="1" checked> Teacher <?php } ?>
	<?php 
	 if ($user["designation"]==0) { ?>
		 <input type="radio" name="designation" value="0" checked> Student <?php } ?><br>
	<br/>
	<input type="radio" name="gender" value="male"<?php 
	 if ($user["gender"]=='male')
	echo 'checked';
	 ?>> Male 
		 <input type="radio" name="gender" value="female"<?php 
	 if ($user["gender"]=='female')
	echo 'checked';
	 ?>> Female 
	 <br/>
	 <?php if ($user["designation"]==1) {?>
	  <p>Department ID:
        <input type="text" name="department_id" value="<?php echo htmlentities($user["department_id"]); ?>"/>
      
	  Proficiency:
        <input type="text" name="proficiency" value="<?php echo htmlentities($user["proficiency"]); ?>" />
		</p>
	<?php }?>
		<p>
		Full Name:
        <input type="text" name="full_name" value="<?php echo htmlentities($user["full_name"]); ?>" />
      </p>
	  <p>Joining Date:
        <input type="date" name="join_date" value="<?php echo htmlentities($user["join_date"]); ?>" />
      </p>
	   <p>
	   Birth Date:
        <input type="date" name="birth_date" value="<?php echo htmlentities($user["birth_date"]); ?>"/>
		Private :  
	    <input type="radio" name="birthday_privacy" value="1" <?php 
	 if ($user["birthday_privacy"]=='1')
	echo 'checked';
	 ?>> Yes 
		<input type="radio" name="birthday_privacy" value="0"<?php 
	 if ($user["birthday_privacy"]=='0')
	echo 'checked';
	 ?>> No
      </p>
	  <p>
	  Phone Number:
        <input type="text" name="phone_num" value="<?php echo htmlentities($user["phone_num"]); ?>" />
		Private :  
	    <input type="radio" name="phone_privacy" value="1"<?php 
	 if ($user["phone_privacy"]=='1')
	echo 'checked';
	 ?>> Yes 
		<input type="radio" name="phone_privacy" value="0"<?php 
	 if ($user["phone_privacy"]=='0')
	echo 'checked';
	 ?>> No
      </p>
	<p>
	Email Adress:
        <input type="text" name="email" value="<?php echo htmlentities($user["email"]); ?>" />
		Private :  
	    <input type="radio" name="email_privacy" value="1"<?php 
	 if ($user["email_privacy"]=='1')
	echo 'checked';
	 ?>> Yes 
		<input type="radio" name="email_privacy" value="0"<?php 
	 if ($user["email_privacy"]=='0')
	echo 'checked';
	 ?>> No
      </p>
	  <p>
	  Website:
        <input type="text" name="website" value="<?php echo htmlentities($user["website"]); ?>" />
		Private :  
	    <input type="radio" name="webisite_privacy" value="1"<?php 
	 if ($user["webisite_privacy"]=='1')
	echo 'checked';
	 ?>> Yes 
		<input type="radio" name="webisite_privacy" value="0"<?php 
	 if ($user["webisite_privacy"]=='0')
	echo 'checked';
	 ?>> No 
      </p>
	   <p> 
	   About Me: Private :  
	    <input type="radio" name="about_privacy" value="1"<?php 
	 if ($user["about_privacy"]=='1')
	echo 'checked';
	 ?>> Yes 
		<input type="radio" name="about_privacy" value="0"<?php 
	 if ($user["about_privacy"]=='0')
	echo 'checked';
	 ?>> No</p>
	    <textarea name="about_me" rows="6" cols="30"><?php echo htmlentities($user["about_me"]); ?></textarea>
      <input type="submit" name="submit" value="edit User" />
    </form>
    <br />
    <a href="manage_departments.php">Cancel</a>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
