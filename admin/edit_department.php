<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
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
?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("name");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("name" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    // Perform Update

    $id = $department["id"];
	$name = mysql_prep($_POST["name"]);
	$email = mysql_prep($_POST["email"]);
	$website = mysql_prep($_POST["website"]);
  
    $query  = "UPDATE department SET name = '{$name}', ";
	$query .= "email ='{$email}',";
	$query .= "website ='{$website}' ";
	$query .= "WHERE id = {$id} LIMIT 1  ";
    
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Department updated.";
      redirect_to("manage_departments.php");
    } else {
      // Failure
      $_SESSION["message"] = "Department update failed.";
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
    
    <h2>Edit Department: <?php echo htmlentities($department["name"]); ?></h2>
    <form action="edit_department.php?id=<?php echo urlencode($department["id"]); ?>" method="post">
      <p>Name:
        <input type="text" name="name" value="<?php echo htmlentities($department["name"]); ?>" /></p>
      <p>Email:
        <input type="text" name="email" value="<?php echo htmlentities($department["email"]); ?>" /></p>
      <p>Website:
        <input type="text" name="website" value="<?php echo htmlentities($department["website"]); ?>" /></p>
      
      <input type="submit" name="submit" value="Edit department" />
    </form>
    <br />
    <a href="manage_departments.php">Cancel</a>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
