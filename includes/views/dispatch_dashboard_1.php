<?php 
include("../includes/data/dispatch_data_fetch.php");
?>

<?php if (check_access("dispatch_dashboard_1")){ 
    include("dispatch_stats_dashboard_1.php");
 } ?>

<?php
include("../includes/data/dispatch_graph_weekly.php");
include("../includes/data/dispatch_graph_by_agents.php");
?>