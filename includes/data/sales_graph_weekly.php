<script>
const xValues = ['mon', 'tue', 'wed', 'thu', 'fri'];
const yValues1 = [<?php echo $salesThisMon.','.$salesThisTue.','.$salesThisWed.','.$salesThisThu.','.$salesThisFri; ?>];
const yValues2 = [<?php echo $salesLastMon.','.$salesLastTue.','.$salesLastWed.','.$salesLastThu.','.$salesLastFri; ?>];

new Chart("salesWeeklyChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
            label: 'This week',
            fill: true,
            lineTension: 0,
            backgroundColor: "rgba(	114, 124, 245,0.7)",
            borderColor: "rgba(	114, 124, 245,0.1)",
            opacity: 50,
            data: yValues1
        }, {
            label: 'Last week',
            fill: true,
            lineTension: 0,
            backgroundColor: "rgba(	10, 207, 151,0.7)",
            borderColor: "rgba(	10, 207, 151,0.1)",
            opacity: 50,
            data: yValues2
        }]
    },
    options: {
        legend: {
            display: true
        },
        scales: {
            yAxes: [{
                ticks: {
                    min: 6,
                    max: 16
                }
            }],
        }
    }
});
</script>