<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "settings";
	include("../includes/layouts/public_header.php");
	include("../includes/crud/change_password.php"); ?>



<div class="container">
    <div class="col-md-6">
        <div class="panel panel-default panel-body">
            <table class="table table-hover">
                <?php echo message(); ?>
                <?php echo form_errors($errors); ?>
                <h2>Change Password:</h2><br />
                <form class="form-inline" role="form" action="change_password.php" method="post">
                    <div class="form-group">
                        <label>Current Password :</label>
                        <input type="password" class="form-control" name="current_password">
                    </div>
                    <div class="form-group">
                        <label>New Password :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label>New Password :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="password" class="form-control" name="validate_new_password">
                    </div>
                    <br />
                    <input class="btn btn-default" type="submit" name="submit" value="Submit" />
                </form>
            </table>
        </div>
    </div>
</div>
</div>

<?php include("../includes/layouts/public_footer.php"); ?>