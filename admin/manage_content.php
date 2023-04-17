<?php require_once("../includes/db_connection.php"); ?>
<?php include("admin_head.php"); ?>

<?php 
  $record_per_page = 5;
  // pagination for News 
  $count_query = no_of_news();
  $no_of_news = max(mysqli_fetch_assoc($count_query));
  $total_pages = ceil($no_of_news/$record_per_page);
  $page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
  $start = ($page-1) * $record_per_page;
  $record_set = find_news_from($start,$record_per_page);

  ?>
	<div class="container">
			<div class="row">
					<div class="col-md-4" id="admin_main_container">
						&nbsp;
						<h2>News Section</h2>
						&nbsp;
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Heading</th>
											<a href="add_news.php">Add News</a>
											</tr>
											<tr> </tr>
									</thead>
									<tbody>
									<?php if (isset($record_set)) { ?>
										<?php while($news = mysqli_fetch_assoc($record_set)) { ?>
											<tr onclick="location.href='show_news.php?news_id=<?php echo urlencode($news["id"]); ?>'">
												<td><?php echo htmlentities($news["heading"]); ?></td>
												<td><a href="delete_news.php?id=<?php echo urlencode($news["id"]); ?>">Delete</a></td>
											</tr>
										<?php } ?> 
									<?php } ?> 
									</tbody>
								</table>
								<?php 
                  						 add_pagination ($page,$total_pages,'manage_content');
                 					 ?>
							</div>
						</div>
						</div>
				</div>
		</div>

<?php include("../includes/layouts/footer.php"); ?>
