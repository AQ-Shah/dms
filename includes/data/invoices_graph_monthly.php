<script>
const invoicesGraphMonthlyXValues = ['9 Weeks', '8 Weeks', '7 Weeks', '6 Weeks', "5 Weeks", "4 Weeks", "3 Weeks",
    "2 Weeks", "1 Week", "Current Week"
];

const invoicesGraphMonthlyYValues1 = [
    <?php echo $totalPaidInvoicesAmountWeek9.','.$totalPaidInvoicesAmountWeek8.','.$totalPaidInvoicesAmountWeek7.','.$totalPaidInvoicesAmountWeek6.','.$totalPaidInvoicesAmountWeek5.','.$totalPaidInvoicesAmountWeek4.','.$totalPaidInvoicesAmountWeek3.','.$totalPaidInvoicesAmountWeek2.','.$totalPaidInvoicesAmountWeek1.','.$totalPaidInvoicesAmountWeek0; ?>

];
const invoicesGraphMonthlyYValues2 = [
    <?php echo $totalUnpaidInvoicesAmountWeek9.','.$totalUnpaidInvoicesAmountWeek8.','.$totalUnpaidInvoicesAmountWeek7.','.$totalUnpaidInvoicesAmountWeek6.','.$totalUnpaidInvoicesAmountWeek5.','.$totalUnpaidInvoicesAmountWeek4.','.$totalUnpaidInvoicesAmountWeek3.','.$totalUnpaidInvoicesAmountWeek2.','.$totalUnpaidInvoicesAmountWeek1.','.$totalUnpaidInvoicesAmountWeek0; ?>

];


var invoicesGraphMonthly = document.getElementById('invoiceGraphMonthly').getContext('2d');
var invoicesGraphMonthlyCreation = new Chart(invoicesGraphMonthly, {
    type: 'bar',
    data: {
        labels: invoicesGraphMonthlyXValues,
        datasets: [{
            label: 'Paid Amount',
            backgroundColor: "rgba(114, 124, 245, 0.7)",
            borderColor: "rgba(114, 124, 245, 0.1)",
            data: invoicesGraphMonthlyYValues1
        }, {
            label: 'Unpaid Amount',
            backgroundColor: "rgba(10, 207, 151, 0.7)",
            borderColor: "rgba(10, 207, 151, 0.1)",
            data: invoicesGraphMonthlyYValues2
        }]
    },
    options: {
        maintainAspectRatio: false,
        indexAxis: 'x',
        plugins: {
            legend: {
                display: true,
                position: 'top',
            },
            tooltip: {
                mode: 'index',
                intersect: false,
                callbacks: {
                    label: function(context) {
                        var datasetLabel = context.dataset.label || '';
                        var value = context.parsed.y;
                        var sumPaid = 0;
                        var sumUnpaid = 0;
                        var total = 0;

                        // Calculate the sum of paid and unpaid amounts for the corresponding week
                        if (context.dataIndex >= 0 && context.dataIndex < invoicesGraphMonthlyYValues1
                            .length) {
                            sumPaid = invoicesGraphMonthlyYValues1[context.dataIndex];
                            sumUnpaid = invoicesGraphMonthlyYValues2[context.dataIndex];
                            total = sumPaid + sumUnpaid;
                        }

                        return datasetLabel + ': $' + value + ' (Total Invoices: $' + total + ')';
                    }
                }
            },
            datalabels: {
                color: 'black',
                anchor: 'end',
                align: 'end',
                formatter: function(value, context) {
                    return value;
                },
            },
        },
        scales: {
            x: {
                stacked: true,
            },
            y: {
                stacked: true,
                ticks: {
                    callback: function(value, index, values) {
                        if (index % 2 === 0) {
                            return value;
                        }
                        return ''; // Hide every other tick label on the Y-axis to create space for the tall bars
                    },
                },
            },
        },
        elements: {
            bar: {
                borderWidth: 2,
                barThickness: 'flex', // This will make the bars stand tall
                categoryPercentage: 0.8, // Adjust the width of the bars
            },
        },
        responsive: true,
    },
});
</script>