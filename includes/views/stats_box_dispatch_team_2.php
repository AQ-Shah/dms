<?php if (not_executive($user["permission"])){ 

    include("../includes/data/team_dispatch_data_fetch.php");
    include("dispatch_stats_dashboard_1.php");
    

    include("../includes/data/team_dispatch_graph_weekly.php");
    include("../includes/data/team_dispatch_graph_by_agents.php");
 
} ?>