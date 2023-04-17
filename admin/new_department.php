<?php
require_once("../includes/session.php");
require_once("../includes/db_connection.php");
require_once("../includes/functions.php");
require_once("../includes/validation_functions.php");
confirm_logged_in();

if (isset($_POST['submit'])) {
    // Process the form

    // validations
    $required_fields = array("name");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("name" => 30);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {
        // Perform Create

        $name = mysql_prep($_POST["name"]);
        $email = mysql_prep($_POST["email"]);
        $website = mysql_prep($_POST["website"]);

        $query  = "INSERT INTO department (";
        $query .= "  name, email, website";
        $query .= ") VALUES (";
        $query .= "  '{$name}', '{$email}', '{$website}'";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Success
            $_SESSION["message"] = "Department created.";
            redirect_to("manage_departments.php");
        } else {
            // Failure
            $_SESSION["message"] = "Department creation failed.";
        }
    }
} else {
    // This is probably a GET request
}

$layout_context = "admin";
include("../includes/layouts/header.php");
?>

<div id="main">
    <div id="navigation">
        &nbsp;
    </div>
    <div id="page">
        <?php echo message(); ?>
        <?php echo form_errors($errors); ?>

        <h2>Create Department</h2>
        <form action="new_department.php" method="post">
            <label for="name">Department Name:</label>
            <input type="text" name="name" id="name" value="" />
            <br>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="" />
            <br/>
            <label for="website">Website:</label>
            <input type="text" name="website" id="website" value="" />
            <br/><br/>

            <input type="submit" name="submit" value="Create Department" />

        </form>
        <br />
        <a href="manage_departments.php">Cancel</a>
    </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
