<script>
const dispatchGraphWeeklyXValues = ['mon', 'tue', 'wed', 'thu', 'fri'];

const dispatchGraphWeeklyYValues1 = [
    <?php echo $dispatchThisMon.','.$dispatchThisTue.','.$dispatchThisWed.','.$dispatchThisThu.','.$dispatchThisFri; ?>
];
const dispatchGraphWeeklyYValues2 = [
    <?php echo $dispatchLastMon.','.$dispatchLastTue.','.$dispatchLastWed.','.$dispatchLastThu.','.$dispatchLastFri; ?>
];


var dispatchGraphWeekly = document.getElementById('dispatchGraphWeekly').getContext('2d');
var dispatchGraphWeeklyCreation = new Chart(dispatchGraphWeekly, {
    type: 'bar',
    data: {
        labels: dispatchGraphWeeklyXValues,
        datasets: [{
            label: 'This week',
            fill: true,
            lineTension: 0,
            backgroundColor: "rgba(	114, 124, 245,0.7)",
            borderColor: "rgba(	114, 124, 245,0.1)",
            opacity: 50,
            data: dispatchGraphWeeklyYValues1
        }, {
            label: 'Last week',
            fill: true,
            lineTension: 0,
            backgroundColor: "rgba(	10, 207, 151,0.7)",
            borderColor: "rgba(	10, 207, 151,0.1)",
            opacity: 50,
            data: dispatchGraphWeeklyYValues2
        }]
    },

    options: {
        maintainAspectRatio: false
    }
});
</script>