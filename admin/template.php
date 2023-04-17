<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

  <div id="navigation">
    &nbsp;
  </div>
    <h2>Admin Menu</h2>
    <h4>Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]); ?>.</h4>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				
		
			</div>
		</div>
	</div>
 
<?php include("../includes/layouts/footer.php"); ?>
