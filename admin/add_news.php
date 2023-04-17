<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("heading", "content");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Perform Create

    $heading = mysql_prep($_POST["heading"]);
    $content = mysql_prep($_POST["content"]);
    $course_id = mysql_prep($_POST["course_id"]);
    $query  = "INSERT INTO news (";
    $query .= " heading, content";
    $query .= ") VALUES (";
    $query .= "  '{$heading}', '{$content}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "News added";
      redirect_to("admin.php");
    } else {
      // Failure
      $_SESSION["message"] = "Failure.";
	  redirect_to("admin.php");
    }
  }
}
?>

<?php include("../includes/layouts/header.php"); ?>
<div id="navigation">
    &nbsp;
  </div>
<div class="container">
	<div class="col-md-6">
		<div class="row">
			<?php echo message(); ?>
			<?php echo form_errors($errors); ?>
			<h2>Add News Form:</h2><br/>
				<form class="form-inline" role="form" action="add_news.php" method="post">
					
					<div class="form-group">
						<label>Heading :</label>
						<input type="text" class="form-control" name="heading">
					</div>
					<div class="form-group">
							<label>Content:</label>
							<textarea class="form-control" name="content" rows="6" cols="30"></textarea>
					</div>
					<br/>
					<input class="btn btn-default" type="submit" name="submit" value="Submit" />
				</form>
		</div>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
