<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "profile";
	include("../includes/layouts/public_header.php"); 

	if (isset ($_GET['id'])){
		$userData = find_user_by_id($_GET['id']);
		if (!$userData || ($userData["compnay_id"] != $user["compnay_id"] )){
            $_SESSION["message"] = "User not found";
			redirect_to("home");
			}
		}  else { 
            $userData = $user;
        } 
           ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <!-- Profile -->
            <div class="card bg-primary">
                <div class="card-body profile-user-box">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-lg">
                                        <img src="assets/images/users/img_avatar1.png" alt=""
                                            class="rounded-circle img-thumbnail">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <h4 class="mt-1 mb-1 text-white"><?php echo $userData["full_name"]; ?></h4>
                                        <p class="font-13 text-white-50"><?php echo $userData["designation"]; ?></p>

                                        <ul class="mb-0 list-inline text-light">
                                            <li class="list-inline-item me-3">
                                                <h5 class="mb-1 text-white">
                                                    <?php if($userData['email_privacy'] || $userData["id"]=== $user["id"] || !not_executive($user['permission'])) { echo $userData['email'] ; }?>

                                                </h5>
                                                <p class="mb-0 font-13 text-white-50">Email</p>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <h5 class="mb-1 text-white">
                                                    <?php if($userData['phone_num'] || $userData["id"]=== $user["id"] || !not_executive($user['permission'])) { echo $userData['phone_num'] ; }?>

                                                </h5>
                                                <p class="mb-0 font-13 text-white-50">Contact</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="mb-1 text-white">
                                                    <?php if($userData["id"]=== $user["id"] || !not_executive($user['permission'])) { echo date('d-M-Y', strtotime($userData['join_date']));}?>
                                                </h5>
                                                <p class="mb-0 font-13 text-white-50">Joining Date</p>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-sm-4">
                            <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                <button type="button" class="btn btn-light">
                                    <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                                </button>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row -->

                </div> <!-- end card-body/ profile-user-box-->
            </div>
            <!--end profile/ card -->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <?php include("../includes/views/dispatch_agent_performance_1.php"); ?>

    <?php include("../includes/views/sales_agent_performance_1.php"); ?>

</div>

<?php 
include("../includes/pagination/table_script.php"); 
include("../includes/layouts/public_footer.php"); 
?>