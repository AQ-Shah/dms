<?php 
include("../includes/data/team_dispatch_data_fetch.php");
?>

<?php if (check_access("stats_box_dispatch_team_2")){ 
    include("dispatch_stats_dashboard_1.php");
 } ?>


<?php
include("../includes/data/team_dispatch_graph_weekly.php");
include("../includes/data/team_dispatch_graph_by_agents.php");
?>