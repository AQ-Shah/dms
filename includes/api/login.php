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
            
            $encryption_key = get_encryption_key();
            $id_vector_key = get_id_vector_key();
            $permission_vector_key = get_permission_vector_key();

            $user_encrypted_id = encrypt_id($found_user["id"]);
            $user_encrypted_permission = openssl_encrypt($found_user["permission"], "AES-256-CBC", $encryption_key, 0, $permission_vector_key);
            
            setcookie("id", $user_encrypted_id, time() + 28800, "/", "", false, false);
            setcookie("permission", $user_encrypted_permission, time() + 28800, "/", "", false, false);

            setcookie("username", $found_user["username"], time() + 28800, "/", "", false, false);
            setcookie("full_name", $found_user["full_name"], time() + 28800, "/", "", false, false);
            setcookie("designation", $found_user["designation"], time() + 28800, "/", "", false, false);

            redirect_to("home");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
}
?>