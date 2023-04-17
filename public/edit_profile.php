<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "settings";
	include("../includes/layouts/public_header.php"); 
   	include("../includes/crud/update_user.php");
?>

<div class="container">

    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="panel panel-default panel-body">
                <?php echo message(); ?>
                <form class="form-inline" role="form" action="edit_profile.php" method="post">

                    <?php if ($user["designation"]==1) {?>
                    <label>Proficiency :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="form-control" name="proficiency"
                        value="<?php echo htmlentities($user["proficiency"]); ?>" />
                    <?php }?>


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
                    <div class="form-group">
                        <label>E-Mail:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" name="email"
                            value="<?php echo htmlentities($user["email"]); ?>">
                    </div>
                    <!--<div class="form-group">
								<label>Website:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="text" class="form-control" name="website" value="<?php echo htmlentities($user["website"]); ?>">
						</div>
						<div class="form-group">
								<label>About Me:</label>
								<textarea class="form-control" name="about_me" rows="6" cols="30"><?php echo htmlentities($user["about_me"]);?></textarea>
						</div>-->

                    <input class="btn btn-default" type="submit" name="submit" value="Save" />
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>

</div>

<?php include("../includes/layouts/public_footer.php"); ?>