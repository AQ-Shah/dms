<script>
const invoicesGraphMonthlyXValues = ['9 Weeks', '8 Weeks', '7 Weeks', '6 Weeks', "5 Weeks", "4 Weeks", "3 Weeks",
    "2 Weeks", "1 Week", "Current Week"
];

const invoicesGraphMonthlyYValues1 = [
    <?php echo $totalInvoicesAmountWeek9.','.$totalInvoicesAmountWeek8.','.$totalInvoicesAmountWeek7.','.$totalInvoicesAmountWeek6.','.$totalInvoicesAmountWeek5.','.$totalInvoicesAmountWeek4.','.$totalInvoicesAmountWeek3.','.$totalInvoicesAmountWeek2.','.$totalInvoicesAmountWeek1.','.$totalInvoicesAmountWeek0; ?>

];
const invoicesGraphMonthlyYValues2 = [
    '0', '0', '0', '0', '0'
];


var invoicesGraphMonthly = document.getElementById('invoiceGraphMonthly').getContext('2d');
var invoicesGraphMonthlyCreation = new Chart(invoicesGraphMonthly, {
    type: 'bar',
    data: {
        labels: invoicesGraphMonthlyXValues,
        datasets: [{
            label: 'This Month',
            fill: true,
            lineTension: 0,
            backgroundColor: "rgba(	114, 124, 245,0.7)",
            borderColor: "rgba(	114, 124, 245,0.1)",
            opacity: 50,
            data: invoicesGraphMonthlyYValues1
        }, {
            label: 'Last Month',
            fill: true,
            lineTension: 0,
            backgroundColor: "rgba(	10, 207, 151,0.7)",
            borderColor: "rgba(	10, 207, 151,0.1)",
            opacity: 50,
            data: invoicesGraphMonthlyYValues2
        }]
    },

    options: {
        maintainAspectRatio: false
    }
});
</script>