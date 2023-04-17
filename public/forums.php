<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "forums";
	include("../includes/layouts/public_header.php"); ?>
<?php 
  $record_per_page =10;
  // pagination for forums 
  $count_query = no_of_forums();
  $no_of_forums = max(mysqli_fetch_assoc($count_query));
  $pages_for_forum = ceil($no_of_forums/$record_per_page);
  $page_no = (isset ($_GET['page_no'])) ? (int)$_GET['page_no'] : 1 ;
  $page_start = ($page_no-1) * $record_per_page;
  $forums_set = find_all_forums_from($page_start,$record_per_page);

  ?>

	<div class="container">
	<div class="col-md-8">
	<?php echo message(); ?>
		<div class="panel panel-default">
			<h3>Welcome to Forums : <?php echo $user["full_name"]; ?></h3>

		</div>
		
		<a href="add_discussion.php"><button type="button" class="btn btn-primary btn-block">Add New Discussion</button></a>
			
		<div class="panel panel-default">
		
		<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Topics</th>
						 </tr>
					</thead>
					<tbody>
					<?php if (isset($forums_set)) { ?>
						<?php while($forum = mysqli_fetch_assoc($forums_set)) { ?>
						<?php $uploader = find_user_by_id($forum["uploader"]); ?>
							<tr onclick="location.href='show_discussion.php?forum_id=<?php echo urlencode($forum["id"]); ?>'">
								<td><a href="profile.php?user_id=<?php echo urlencode($uploader["id"]); ?>"><?php echo htmlentities($uploader["username"]); ?></td>
								<td><?php echo htmlentities($forum["topic"]); ?></td>
								<td>Replies: <?php echo htmlentities($forum["replies"]); ?></td>
								<td><a href="show_discussion.php?forum_id=<?php echo urlencode($forum["id"]); ?>">show</a></td>
							</tr>
						<?php } ?> 
					<?php } ?> 
					</tbody>
				</table>
					<?php 
					if ($pages_for_forum>=1 && $page_no <= $pages_for_forum){
					echo '<ul class="pagination">';
						for ($x=1;$x<=$pages_for_forum;$x++){
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
