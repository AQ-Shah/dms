<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "settings";
	include("../includes/layouts/public_header.php");
	include("../includes/crud/change_password.php"); ?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h1 class="text-center mb-4">Change Password </h1>
            <?php echo message(); ?>
            <?php echo form_errors($errors); ?>
            <form class="row g-3" role="form" action="change_password" method="post">
                <div class="col-md-12">
                    <label for="current_password" class="form-label">Current Password:</label>
                    <input type="password" class="form-control" name="current_password" id="current_password">
                </div>
                <div class="col-md-12">
                    <label for="password" class="form-label">New Password:</label>
                    <input type="password" class="form-control" name="password" id="password" data-toggle="tooltip"
                        data-placement="top"
                        title="Password must be between 8-20 characters, contain at least one number and special character">
                </div>
                <div class="col-md-12">
                    <label for="validate_new_password" class="form-label">Confirm New Password:</label>
                    <input type="password" class="form-control" name="validate_new_password" id="validate_new_password">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>


<?php include("../includes/layouts/public_footer.php"); ?>