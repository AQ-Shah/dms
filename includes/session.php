<?php
	session_start(); // session start
	
	function message() {

		$output = "";
		if (isset($_SESSION["message"])) {
			
			
			$output .= "<div class=\"message alert alert-dismissible show\" role=\"alert\">";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>";
			$output .= "</div>";

			// clear message after use
			$_SESSION["message"] = null;
			
			return $output;
		}
	}
	function send_errors($errors=array()) {
        $output = "";
        if (!empty($errors)) {

        foreach ($errors as $key => $error) {
                $output .= htmlentities($error);
                $output .= ' | ';
				
        }
        }
        return $output;
    }

	function errors() {
		if (isset($_SESSION["errors"])) {
			$errors = $_SESSION["errors"];
			
			// clear message after use
			$_SESSION["errors"] = null;
			
			return $errors;
		}
	}
	
?>