<script>
var dispatchGraphByAgents = document.getElementById('dispatchGraphByAgents').getContext('2d');
var dispatchGraphByAgentsCreation = new Chart(dispatchGraphByAgents, {
    type: 'bar',
    data: {
        labels: ['Person 1', 'Person 2', 'Person 3', 'Person 4', 'Person 5'],
        datasets: [{
            label: 'Dispatch Agents',
            data: [
                Math.random() * 100,
                Math.random() * 100,
                Math.random() * 100,
                Math.random() * 100,
                Math.random() * 100
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