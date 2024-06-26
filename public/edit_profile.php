<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "settings";
	include("../includes/layouts/public_header.php"); 
   	include("../includes/api/update_user.php");
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h1 class="text-center mb-4">Edit Profile </h1>
            <?php echo message(); ?>
            <?php echo form_errors($errors); ?>
            <form class="form-inline" role="form" action="edit_profile.php" method="post">

                <div class="form-group">
                    <label>Birth Date:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="date" class="form-control" name="birth_date"
                        value="<?php echo htmlentities($user["birth_date"]); ?>">
                </div>
                <div class="form-group">
                    <label>Phone Number:</label>
                    <input type="text" class="form-control" name="phone_num"
                        value="<?php echo htmlentities($user["phone_num"]); ?>">
                </div>
                <input class="btn btn-default" type="submit" name="submit" value="Save" />
            </form>
        </div>
    </div>
</div>

<?php include("../includes/layouts/public_footer.php"); ?>