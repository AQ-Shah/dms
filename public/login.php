<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>
<?php include("../includes/layouts/public_stylesheets.php"); ?>
<?php
$username = "";

if (isset($_POST['submit'])) {
  $required_fields = array("username", "password");
  validate_presences($required_fields);

  if (empty($errors)) {
    // Attempt Login
		$username = $_POST["username"];
		$password = $_POST["password"];
		$found_user = attempt_login_user($username, $password);

    if ($found_user) {
      // Success
			// Mark user as logged in
			$_SESSION["id"] = $found_user["id"];
			$_SESSION["username"] = $found_user["username"];
			$_SESSION["full_name"] = $found_user["full_name"];
			$_SESSION["designation"] = $found_user["designation"];
			$_SESSION["permission"] = $found_user["permission"];
            redirect_to("home");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
}
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="login-container">
                <div class="d-flex justify-content-center mb-3">
                    <!-- add your logo image here -->
                    <img src="assets/images/logo-dark.png" alt="Logo" class="logo rounded-pill">
                </div>

                <?php echo message(); ?>
                <?php echo form_errors($errors); ?>

                <form role="form" action="login" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                        <label for="username">Username:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            name="password">
                        <label for="password">Password:</label>
                    </div>

                    <button class="btn btn-primary btn-block mb-3" type="submit" name="submit"
                        value="Submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>