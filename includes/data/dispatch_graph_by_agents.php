<?php

$record_set = find_all_dispatcher();

?>
<script>
var dispatchGraphByAgents = document.getElementById('dispatchGraphByAgents').getContext('2d');
var dispatchGraphByAgentsCreation = new Chart(dispatchGraphByAgents, {
    type: 'bar',
    data: {
        labels: [
            <?php while($record = mysqli_fetch_assoc($record_set)) {echo "'".$record['full_name']."',"; }?>
        ],
        <?php $record_set = find_all_dispatcher(); ?>
        datasets: [{
            label: 'Dispatch Agents',
            data: [
                <?php while($record = mysqli_fetch_assoc($record_set)) {echo "'".no_of_dispatch_this_month_by_agent($record['id'])."',"; }?>
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