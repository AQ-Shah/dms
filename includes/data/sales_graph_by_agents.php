<?php

$record_set = find_all_sales_agent();

?>
<script>
var saleGraphByAgent = document.getElementById('salesGraphByAgents').getContext('2d');
var saleGraphByAgentCreation = new Chart(saleGraphByAgent, {
    type: 'bar',
    data: {
        labels: [
            <?php while($record = mysqli_fetch_assoc($record_set)) {echo "'".$record['full_name']."',"; }?>
        ],
        <?php $record_set = find_all_sales_agent(); ?>
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