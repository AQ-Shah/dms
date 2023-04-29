<?php
    
    // Set the session timeout to 8 hours (28800 seconds)
    ini_set('session.gc_maxlifetime', 28800 );
    
    // Start the session
    session_start();

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

	function form_errors($errors=array()) {
        $output = "";
        if (!empty($errors)) {
        $output .= "<div class=\"message alert alert-dismissible show\" role=\"alert\">";
        $output .= "<ul>";
        $output .= "Please fix the following errors:";
        foreach ($errors as $key => $error) {
            $output .= "<li>";
                $output .= htmlentities($error);
                $output .= "</li>";
        }
        $output .= "</ul>";
		$output .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>";
        $output .= "</div>";
        }
        return $output;
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