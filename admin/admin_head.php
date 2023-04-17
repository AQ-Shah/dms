<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php confirm_logged_in(); ?>

<div class="container bg-secondary text-white rounded" style="margin-top: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 d-grid"><img style="	height:80px;width:80px" x="0" y="0" height="100%"
                    preserveAspectRatio="xMidYMid slice" width="100%" class="rounded-pill"
                    src="../public/images/img_avatar1.png"></div>
            <div class="col-lg-10 d-grid" style="margin-top:15px">
                <h2>User :
                    <?php echo htmlentities($_SESSION["username"]); 
        ?></h2>
            </div>
        </div>
        <?php echo message(); ?>
    </div>
</div>

<div class="container" style="margin-top: 25px;">
    <div class="row">
        <div class="col-lg-3 d-grid my-2"><button type="button" class="btn btn-danger btn-lg"><a
                    href="manage_content.php">Manage Website Content</a></button></div>
        <div class="col-lg-3 d-grid my-2"><button type="button" class="btn btn-danger btn-lg"><a
                    href="manage_admins.php">Manage Admin</a></button></div>
        <div class="col-lg-3 d-grid my-2"><button type="button" class="btn btn-danger btn-lg"><a
                    href="manage_departments.php">Manage Departments</a></button></div>
        <div class="col-lg-3 d-grid my-2"><button type="button" class="btn btn-danger btn-lg"><a
                    href="manage_users.php">Manage Users</a></button></div>
    </div>
</div>