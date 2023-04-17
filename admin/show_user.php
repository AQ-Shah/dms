<?php require_once("../includes/db_connection.php"); ?>
<?php include("admin_head.php"); ?>


<?php
if (isset($_GET["id"])){
  $user = find_user_by_id($_GET["id"]);
}
else {
  $_SESSION["message"] = "User not found.";
  redirect_to("admin.php");}

/*  if you want to give access to only manager then use this funcation
  if (!$user || $user["designation"]!=1) {
    // user ID was missing or invalid or 
    // user couldn't be found in database
    redirect_to("admin.php");
  }*/
?> 

<?php
  // $work_set = find_all_work_of_user($_GET["id"]);
?>

<div class="container">
    <div style ="padding-left: 20em;">
        <div style="border-style: groove;width:40%;">
            <h2>user: <?php echo htmlentities($user["full_name"]); ?></h2>
            <table>
                <tr id="footer">
                    <th style="text-align: left; width: 20%;">ID</th>
                    <th style="text-align: left; width: 20%;">Full Name</th>
                  </tr>
                <tr>
                    <td><?php echo htmlentities($user["id"]); ?></td>
                    <td><?php echo htmlentities($user["full_name"]); ?></td>
                  </tr>
              
              </table>
              <br />
          </div>
      </div>
  </div>
<?php include("../includes/layouts/footer.php"); ?>
