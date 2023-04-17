<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "profile";
	include("../includes/layouts/public_header.php"); 

	if (isset ($_GET['user_id'])){
		$user = find_user_by_id($_GET['user_id']);
		if ($user){
			$permission = $user['permission'];
			$current_page = "profile";}
		else {
			$_SESSION["message"] = "User not found";
			redirect_to("home");} } ?>

<div class="container">

    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <h1><?php echo $user["full_name"]; ?></h1>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Username</th>
                    <th><?php echo $user['username'];?></th>
                </tr>
                <tr>
                    <th>Gender</th>
                    <th><?php echo $user['gender'];?></th>
                </tr>
                <tr>
                    <th>Designation</th>
                    <th><?php echo $user['designation']; ?></th>
                </tr>
                <?php if($user['phone_privacy'] || $user["id"]=== $_SESSION["id"]) {?>
                <tr>
                    <th>Phone Number</th>
                    <th><?php echo $user['phone_num'];?></th>
                </tr>
                <?php }?>
                <?php if($user['birthday_privacy'] || $user["id"]=== $_SESSION["id"]) {?>
                <tr>
                    <th>Birth Date</th>
                    <th><?php echo $user['birth_date'];?></th>
                </tr>
                <?php }?>
                <tr>
                    <th>Joining Date</th>
                    <th><?php echo $user['join_date'];?></th>
                </tr>
                <?php if($user['email_privacy'] || $user["id"]=== $_SESSION["id"]) {?>
                <tr>
                    <th>Email</th>
                    <th><?php echo $user['email'];?></th>
                </tr>
                <?php }?>


                <?php if($user['about_privacy'] || $user["id"]=== $_SESSION["id"]) {?>
                <tr>
                    <th>About Me</th>
                    <th><?php echo $user['about_me'];?></th>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<?php include("../includes/layouts/public_footer.php"); ?>