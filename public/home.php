<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "home";
	include("../includes/layouts/public_header.php"); 
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


    <?php include("../includes/views/home_buttons_view.php"); ?>

    <?php include("../includes/views/sales_dashboard_1.php"); ?>

    <?php include("../includes/views/dispatch_stats_1.php"); ?>

    <?php include("../includes/views/dispatch_agent_performance_1.php"); ?>

    <?php if (check_access("stats_box_dispatch_team_1")){ include("../includes/views/stats_box_dispatch_team_1.php"); } ?>

    <?php if (check_access("stats_box_dispatch_team_2")){  include("../includes/views/stats_box_dispatch_team_2.php"); }?>

    <?php include("../includes/views/dispatch_dashboard_1.php"); ?>

    <?php include("../includes/views/revenue_dashboard_1.php"); ?>

    <?php include("../includes/views/revenue_dashboard_2.php"); ?>

    <?php include("../includes/views/revenue_dashboard_3.php"); ?>



    <?php include("../includes/views/sales_agent_performance_1.php"); ?>


</div>

<?php 
include("../includes/pagination/table_script.php"); 
include("../includes/layouts/public_footer.php"); 
?>