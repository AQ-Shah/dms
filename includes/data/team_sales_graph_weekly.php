<script>
const teamSalesGraphWeeklyXValue = ['mon', 'tue', 'wed', 'thu', 'fri'];
const teamSalesGraphWeeklyYValues1 = [
    <?php echo $salesThisMonByTeam.','.$salesThisTueByTeam.','.$salesThisWedByTeam.','.$salesThisThuByTeam.','.$salesThisFriByTeam; ?>
];
const teamSalesGraphWeeklyYValues2 = [
    <?php echo $salesLastMonByTeam.','.$salesLastTueByTeam.','.$salesLastWedByTeam.','.$salesLastThuByTeam.','.$salesLastFriByTeam; ?>
];

var teamSaleGraphWeekly = document.getElementById('teamSalesGraphWeekly').getContext('2d');
var teamSaleGraphWeeklyCreation = new Chart(teamSaleGraphWeekly, {
    type: 'bar',
    data: {
        labels: teamSalesGraphWeeklyXValue,
        datasets: [{
            label: 'This week',
            fill: true,
            lineTension: 0,
            backgroundColor: "rgba(	114, 124, 245,0.7)",
            borderColor: "rgba(	114, 124, 245,0.1)",
            opacity: 50,
            data: teamSalesGraphWeeklyYValues1
        }, {
            label: 'Last week',
            fill: true,
            lineTension: 0,
            backgroundColor: "rgba(	10, 207, 151,0.7)",
            borderColor: "rgba(	10, 207, 151,0.1)",
            opacity: 50,
            data: teamSalesGraphWeeklyYValues2
        }]
    }

});
</script>