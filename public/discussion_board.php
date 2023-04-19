<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "discussion_board";
	include("../includes/layouts/public_header.php"); 

	include("../includes/pagination/discussion_data_fetch.php"); 
  ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>

                <h2>
                    Welcome <?php echo $user["full_name"]; ?>
                </h2>

            </div>
        </div>
    </div>

    <a href="add_discussion"><button type="button" class="btn btn-primary btn-block">Add New
            Discussion</button></a>

    <div class="row">

        <div class="col-12 card">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Added By</th>
                        <th>Topic</th>
                        <th>No. of Replies</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($record_set)) { ?>
                    <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                    <?php $uploader = find_user_by_id($record["uploader"]); ?>
                    <tr onclick="location.href='show_discussion.php?record_id=<?php echo urlencode($record["id"]); ?>'">
                        <td><a href="profile.php?user_id=<?php echo urlencode($uploader["id"]); ?>"><?php echo htmlentities($uploader["full_name"]); ?>
                        </td>
                        <td><?php echo htmlentities($record["topic"]); ?></td>
                        <td>Replies: <?php echo htmlentities($record["replies"]); ?></td>
                        <td><a href="show_discussion.php?record_id=<?php echo urlencode($record["id"]); ?>">show</a>
                        </td>
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

<?php 
include("../includes/pagination/table_script.php"); 
include("../includes/layouts/public_footer.php"); 
?>