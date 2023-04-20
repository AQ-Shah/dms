<?php

// validations
  $required_fields = array("topic");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Perform Create

    $topic = mysql_prep($_POST["topic"]);
    $uploader = mysql_prep($user["id"]);
    $replies = 0 ;
	$upload_date = date("Y-m-d");
	$upload_time = date('H:i:s');
    $query  = "INSERT INTO forum_subject (";
    $query .= "  topic, uploader, replies, upload_date, upload_time ";
    $query .= ") VALUES (";
    $query .= "  '{$topic}', '{$uploader}', '{$replies}', '{$upload_date}','{$upload_time}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Topic added";
      redirect_to("discussion_board");
    } else {
      // Failure
      $_SESSION["message"] = "Unable Add Topic";
    }
  }

?>