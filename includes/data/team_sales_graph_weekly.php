<script>
const salesGraphWeeklyXValue = ['mon', 'tue', 'wed', 'thu', 'fri'];
const salesGraphWeeklyYValues1 = [
    <?php echo $salesThisMon.','.$salesThisTue.','.$salesThisWed.','.$salesThisThu.','.$salesThisFri; ?>
];
const salesGraphWeeklyYValues2 = [
    <?php echo $salesLastMon.','.$salesLastTue.','.$salesLastWed.','.$salesLastThu.','.$salesLastFri; ?>
];

var saleGraphWeekly = document.getElementById('teamSalesGraphWeekly').getContext('2d');
var saleGraphWeeklyCreation = new Chart(saleGraphWeekly, {
    type: 'bar',
    data: {
        labels: salesGraphWeeklyXValue,
        datasets: [{
            label: 'This week',
            fill: true,
            lineTension: 0,
            backgroundColor: "rgba(	114, 124, 245,0.7)",
            borderColor: "rgba(	114, 124, 245,0.1)",
            opacity: 50,
            data: salesGraphWeeklyYValues1
        }, {
            label: 'Last week',
            fill: true,
            lineTension: 0,
            backgroundColor: "rgba(	10, 207, 151,0.7)",
            borderColor: "rgba(	10, 207, 151,0.1)",
            opacity: 50,
            data: salesGraphWeeklyYValues2
        }]
    }

});
</script>