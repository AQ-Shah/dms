<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "news";
	include("../includes/layouts/public_header.php"); 


	if (isset ($_GET["news_id"])){
		if (!($news = find_news_by_id($_GET["news_id"]))){
		redirect_to("home.php");
	}
	}
	else {
		redirect_to("home.php");
	}

?>

<div class="container">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><?php echo $news["heading"]?></h1>
            </div>
            <div class="panel-body">
                <h3><?php echo $news["content"]?></h2>
            </div>
        </div>
    </div>
</div>
</div>
<?php include("../includes/layouts/public_footer.php"); ?>