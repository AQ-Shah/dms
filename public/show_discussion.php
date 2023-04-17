<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "forums";
	include("../includes/layouts/public_header.php"); ?>
<?php 

if (isset($_GET["forum_id"])){
	if (!($forum = find_forum_by_id($_GET["forum_id"]))){
		redirect_to("home.php");
	}
}
else 
{
	redirect_to("home.php");
}
if (isset($_POST['submit'])) {
  // validations
  $required_fields = array("content");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Perform Create
	$forum_id = mysql_prep($forum["id"]);
    $content = mysql_prep($_POST["content"]);
    $replied_by = mysql_prep($user["id"]);
	
	$upload_date = date("Y-m-d");
	$upload_time = date('H:i:s');
    $query  = "INSERT INTO forum_replies (";
    $query .= "  topic_id, replied_by, content, upload_date, upload_time ";
    $query .= ") VALUES (";
    $query .= "  '{$forum_id}', '{$replied_by}', '{$content}', '{$upload_date}','{$upload_time}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
		$replies = $forum["replies"];
		$replies++;
		$query  = "UPDATE forum_subject SET replies = '{$replies}' ";
		$query .= "WHERE id = {$forum['id']} LIMIT 1  ";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		if ($forum['uploader'] != $user['id']) {
			create_notification($forum['uploader'],$user['id'],'Has Replied To Your Post',"show_discussion.php?forum_id={$forum_id}");
		}
		$repliers_set = find_all_replies($forum["id"]);
		while($replies = mysqli_fetch_assoc($repliers_set)){
			$replier[]= $replies["replied_by"];
		}
		$replier = array_unique($replier);
		for ($counter=0,$index =0;$counter< count($replier);$counter++,$index++){
			while(!isset($replier[$index])){
				$index++;
			}
			if ($forum['uploader'] != $replier[$index]) {
				if ($user['id'] != $replier[$index]){
					create_notification($replier[$index],$user['id'],'Has Replied To The Post You Have Commented On',"show_discussion.php?forum_id={$forum_id}");
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
<?php 
  $record_per_page =10;
  // pagination for replies
  $count_query = no_of_replies($forum["id"]);
  $no_of_replies = max(mysqli_fetch_assoc($count_query));
  $pages_for_replies = ceil($no_of_replies/$record_per_page);
  $page_no = (isset ($_GET['page_no'])) ? (int)$_GET['page_no'] : 1 ;
  $page_start = ($page_no-1) * $record_per_page;
  $replies_set = find_all_replies_from($forum["id"],$page_start,$record_per_page);

  ?>


	<div class="container">
	<div class="col-md-8">
	<?php echo message(); ?>
	
		<div class="panel panel-default">
			<h3>Topic : <?php echo $forum["topic"]; ?></h3>

		</div>
		
		
			
		<div class="panel panel-default">
		
		<div class="panel-body">
				<table class="table table-hover">
					<thead>

						<tr>
							<td></td>
							<th> <form class="form-inline" role="form" action="" method="post">
											<div class="form-group">
												<input type="text" class="form-control" name="content">
												</div>
											<input class="btn btn-default" type="submit" name="submit" value="Reply" />
							</form></th>
						 </tr>
					</thead>
					<tbody>
						
					<?php if (isset($replies_set)) { ?>
						<?php while($replies = mysqli_fetch_assoc($replies_set)) { ?>
						<?php $replied_by = find_user_by_id($replies["replied_by"]); ?>
							<tr>
								<td><a href="profile.php?user_id=<?php echo urlencode($replied_by["id"]); ?>"><?php echo htmlentities($replied_by["username"]); ?></td>
								<td><?php echo htmlentities($replies["content"]); ?></td>
								<td></td>
								<td><?php echo htmlentities($replies["upload_time"]); ?> , <?php echo htmlentities($replies["upload_date"]); ?></td>
							</tr>
						<?php } ?> 
					<?php } ?> 
					</tbody>
				</table>
					<?php 
					if ($pages_for_replies>=1 && $page_no <= $pages_for_replies){
					echo '<ul class="pagination">';
						for ($x=1;$x<=$pages_for_replies;$x++){
							if ($x == $page_no){
								echo '<li class="active">';
							}
							else {
								echo '<li>';
							}
							echo '<a href="forums.php?page_no='.$x;
							echo '">'.$x.'</a></li> ';

						}
					echo '</ul>';
					}
	 ?>
			</div>
			</div>
		</div>
	</div>

	<?php include("../includes/layouts/public_footer.php"); ?>
