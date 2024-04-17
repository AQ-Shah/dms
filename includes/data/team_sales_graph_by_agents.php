<?php

$record_set = find_all_active_sales_agent_by_team($user['team_id']);

?>
<script>
var teamSaleGraphByAgent = document.getElementById('teamSalesGraphByAgents').getContext('2d');
var teamSaleGraphByAgentCreation = new Chart(teamSaleGraphByAgent, {
    type: 'bar',
    data: {
        labels: [
            <?php while($record = mysqli_fetch_assoc($record_set)) {echo "'".$record['full_name']."',"; }?>
        ],
        <?php $record_set = find_all_active_sales_agent_by_team($user['team_id']); ?>
        datasets: [{
            label: 'Sales Agents',
            data: [
                <?php while($record = mysqli_fetch_assoc($record_set)) {echo "'".no_of_carrier_this_month_by_agent($record['id'])."',"; }?>
            ],
            backgroundColor: [
                'rgba(	114, 124, 245,0.7)',
                'rgba(10, 207, 151,0.7)',
                'rgba(255, 165, 0, 0.7)',
                'rgba(255, 105, 180, 0.7)',
                'rgba(204, 255, 0, 0.7)'
            ],
            borderColor: ["rgba(0, 0, 0, 0)"]
        }]
    },
    options: {

        maintainAspectRatio: false
    }
});
</script>