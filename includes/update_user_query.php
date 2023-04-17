<?php
$query  = "UPDATE users SET full_name ='{$full_name}',";
if (isset($_POST["proficiency"])) { $query .= "proficiency ='{$proficiency}',";}
if (isset($_POST["phone_num"])) {$query .= "phone_num ='{$phone_num}',";}
if (isset($_POST["email"])) {$query .= "email ='{$email}',";}
if (isset($_POST["department_id"])) {$query .= "department_id ='{$department_id}',";}
if (isset($_POST["designation"])) {$query .= "designation ='{$designation}',";}
if (isset($_POST["website"])) {$query .= "website ='{$website}',";}
if (isset($_POST["about_me"])) {$query .= "about_me ='{$about_me}',";}
if (isset($_POST["birth_date"])) {$query .= "birth_date ='{$birth_date}',";}
if (isset($_POST["join_date"])) {$query .= "join_date ='{$join_date}', ";}
if (isset($_POST["email_privacy"])) {$query .= "email_privacy ='{$email_privacy}', ";}
if (isset($_POST["phone_privacy"])) {$query .= "phone_privacy ='{$phone_privacy}', ";}
if (isset($_POST["birthday_privacy"])) {$query .= "birthday_privacy ='{$birthday_privacy}', ";}
if (isset($_POST["webisite_privacy"])) {$query .= "webisite_privacy ='{$webisite_privacy}', ";}
if (isset($_POST["about_privacy"])) {$query .= "about_privacy ='{$about_privacy}', ";}
$query .= "gender ='{$gender}'";
$query .= "WHERE id = {$id} LIMIT 1  ";
$result = mysqli_query($connection, $query);
echo "hello";
if ($result && mysqli_affected_rows($connection) == 1){
    // Success
    $_SESSION["message"] = "Profile Updated.";
    redirect_to("home.php");
  } else {
    // Failure
    $_SESSION["message"] = "Update failed."; }
?>