<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "show_discussion";
	include("../includes/layouts/public_header.php"); 

	include("../includes/pagination/discussion_replies_data_fetch.php"); 


if (isset($_POST['submit'])) {
  // validations
  $required_fields = array("content");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Perform Create
	$record_id = mysql_prep($discussion["id"]);
    $content = mysql_prep($_POST["content"]);
    $replied_by = mysql_prep($user["id"]);
	
	$upload_date = date("Y-m-d");
	$upload_time = date('H:i:s');
    $query  = "INSERT INTO forum_replies (";
    $query .= "  topic_id, replied_by, content, upload_date, upload_time ";
    $query .= ") VALUES (";
    $query .= "  '{$record_id}', '{$replied_by}', '{$content}', '{$upload_date}','{$upload_time}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
		$replies = $discussion["replies"];
		$replies++;
		$query  = "UPDATE forum_subject SET replies = '{$replies}' ";
		$query .= "WHERE id = {$discussion['id']} LIMIT 1  ";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		if ($discussion['uploader'] != $user['id']) {
			create_notification($discussion['uploader'],$user['id'],'Has Replied To Your Post',"show_discussion.php?record_id={$record_id}");
		}
		$repliers_set = find_all_replies($discussion["id"]);
		while($replies = mysqli_fetch_assoc($repliers_set)){
			$replier[]= $replies["replied_by"];
		}
		$replier = array_unique($replier);
		for ($counter=0,$index =0;$counter< count($replier);$counter++,$index++){
			while(!isset($replier[$index])){
				$index++;
			}
			if ($discussion['uploader'] != $replier[$index]) {
				if ($user['id'] != $replier[$index]){
					create_notification($replier[$index],$user['id'],'Has Replied To The Post You Have Commented On',"show_discussion.php?record_id={$record_id}");
				}
			}
		}
		$_SESSION["message"] = "Replied";
		} else {
      // Failure
      $_SESSION["message"] = "Couldnot Reply";
    }
  }
}

?>


<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>

                <h2>
                    Topic :
                </h2>

            </div>
        </div>
    </div>



    <div class="row">

        <div class="col-12 card">
            <table class="table table-hover">
                <thead>

                    <tr>
                        <td></td>
                        <th>
                            <form class="form-inline" role="form" action="" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="content">
                                </div>
                                <input class="btn btn-default" type="submit" name="submit" value="Reply" />
                            </form>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (isset($record_set)) { ?>
                    <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                    <?php $replied_by = find_user_by_id($record["replied_by"]); ?>
                    <tr>
                        <td><a href="profile.php?user_id=<?php echo urlencode($replied_by["id"]); ?>"><?php echo htmlentities($replied_by["username"]); ?>
                        </td>
                        <td><?php echo htmlentities($record["content"]); ?></td>
                        <td></td>
                        <td><?php echo htmlentities($record["upload_time"]); ?> ,
                            <?php echo htmlentities($record["upload_date"]); ?></td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="row form_panel">
                <?php include("../includes/pagination/bottom_pagination_bar.php");?>
            </div>
        </div>
    </div>
</div>
</div>

<?php 
include("../includes/pagination/table_script.php"); 
include("../includes/layouts/public_footer.php"); 
?>