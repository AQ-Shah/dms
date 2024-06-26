<?php
 if (isset($_POST['submit'])) {
  
  $id = $user["id"];
  if (isset($_POST['phone_num'])) {$phone_num = mysql_prep($_POST["phone_num"]);} else {$phone_num = "";}
  if (isset($_POST['birth_date'])) {$birth_date = mysql_prep($_POST["birth_date"]);} else {$birth_date = "";}

  $query  = "UPDATE users SET phone_num ='{$phone_num}',";
  $query .= "birth_date ='{$birth_date}'";
  $query .= "WHERE id = {$id} LIMIT 1  ";
  $result = mysqli_query($connection, $query);
  if ($result && mysqli_affected_rows($connection) == 1){
    // Success
    $_SESSION["message"] = "Profile Updated.";
    redirect_to("profile.php");
  } else {
    // Failure
    $_SESSION["message"] = "Update failed."; }
  } 
?>