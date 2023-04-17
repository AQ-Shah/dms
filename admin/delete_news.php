<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
if (isset($_GET["id"])){
  $news = find_news_by_id($_GET["id"]);
}
  if (!$news) {
    redirect_to("manage_admins.php");
  }
  
  $id = $news["id"];
  $safe_news_id = mysqli_real_escape_string($connection, $id);
  $query = "DELETE FROM news WHERE id = {$safe_news_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "News deleted.";
    redirect_to("admin.php");
  } else {
    // Failure
    $_SESSION["message"] = "News deletion failed.";
    redirect_to("admin.php");
  }
  ?>