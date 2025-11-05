<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "invoice_view";
	include("../includes/layouts/public_header.php");
    
    include("../includes/api/invoice_created_find_query.php"); 
?>
<!-- to add the Carrier name and invoice in the title -->
<script>
document.getElementById("pageTitle").innerHTML =
    "<?php echo $carrier['b_name'].' - Invoice #786-'.htmlentities($carrier['id']).'-'.htmlentities($invoice['id'])?>";
</script>

<div class="container">
    <div class="row">

        <div class="col-6">
            <div class="page-title-box">
                <h2>
                    Invoice Management
                </h2>
            </div>
        </div>
        <div class="col-6 text-end">
            <div class="page-title-box mt-1">
                <button type="button" class="btn btn-danger mb-2 me-2" onclick="invoicePrintFunction()">
                    <i class=" mdi mdi-basket me-1"></i>
                    Print</button>
            </div>
        </div>
    </div>

    <div class="row card">

        <div class="container-fluid py-3 bg-light border-bottom">
            <div class="row mb-3">
                <div class="col-6 justify-content-start">
                <img src="get_image.php?path=<?php echo urlencode($company['logo_path']); ?>" alt="Company Logo" height="50">
                </div>

                <div class="col-6 text-end">
                    <h4 class="mb-1">Invoice
                        #<?php echo '786-'.htmlentities($carrier["id"]).'-'.htmlentities($invoice["id"])?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-6 justify-content-start">
                    <p class="mb-1"><?php echo htmlentities($company['c_name']); ?></p>
                    <p class="mb-1"><?php echo htmlentities($company['c_number']); ?></p>
                    <h6>Billing To:</h6>
                    <p class="mb-0"><?php echo htmlentities($carrier["b_name"]); ?></p>
                    <p class="mb-0"><?php echo htmlentities($carrier["b_address"]); ?></p>
                    <p class="mb-0"><?php echo htmlentities($carrier["b_email"]); ?></p>
                </div>
                <div class="col-6 text-end">
                    <p class="mb-1">Date:
                        <?php echo htmlentities(date("d-M-Y", strtotime($invoice["creation_date"]))); ?></p>
                    <p class="mb-1">Payment Terms: Quick Pay</p>
                    <p class="mb-1">Due Date: <?php echo htmlentities(date("d-M-Y", strtotime($invoice["due_date"])));?>
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="row card">
        <div class="col-12">

            <div class="row panel">
                <div class="panel-body">
                    <?php
                    // Group records by driver and calculate totals
                    $grouped_by_driver = [];
                    $total_rate_con = 0;

                    if (isset($record_set)) {
                        foreach ($record_set as $record) {
                            $driver_name = 'Unassigned';
                            if($record["truck_id"]){
                                $dispatcher = find_truck_by_id($record["truck_id"]);
                                $driver_name = $dispatcher['d_name'];
                            }

                            if (!isset($grouped_by_driver[$driver_name])) {
                                $grouped_by_driver[$driver_name] = [];
                            }
                            $grouped_by_driver[$driver_name][] = $record;
                            $total_rate_con += $record["rate"];
                        }
                    }

                    // Display each driver's data
                    foreach ($grouped_by_driver as $driver_name => $driver_records) {
                    ?>

                    <div class="driver-section mb-4">
                        <h4 class="driver-header bg-primary text-white p-2 mb-0"><?php echo htmlentities($driver_name); ?></h4>
                        <table class="table table-hover mb-2">
                            <thead>
                                <tr>
                                    <th> Dispatch Date</span> </th>
                                    <th> From</span> </th>
                                    <th> To</span> </th>
                                    <th> Loaded Miles</span> </th>
                                    <th> Rate Con.</span> </th>
                                    <th> Rate/Mile</span> </th>
                                    <th> Dispatch Fee</span> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $driver_total_miles = 0;
                                $driver_total_rate = 0;
                                $driver_total_commission = 0;

                                foreach ($driver_records as $record) {
                                    $loaded_miles = $record["loaded_miles"] ?? 0;
                                    $rate = $record["rate"] ?? 0;
                                    $commission = $record["commission"] ?? 0;
                                    $rate_per_mile = ($loaded_miles > 0) ? ($rate / $loaded_miles) : 0;
                                ?>
                                <tr>
                                    <td><?php echo htmlentities(date("M-d-Y", strtotime($record["dispatch_time"]))); ?></td>
                                    <td><?php echo htmlentities($record["current_location"]); ?></td>
                                    <td><?php echo htmlentities($record["new_location"]); ?></td>
                                    <td><?php echo htmlentities($loaded_miles); ?></td>
                                    <td><?php echo '$'.number_format($rate, 2); ?></td>
                                    <td><?php echo '$'.number_format($rate_per_mile, 2); ?></td>
                                    <td><?php echo '$'.number_format($commission, 2); ?></td>
                                </tr>
                                <?php
                                    $driver_total_miles += $loaded_miles;
                                    $driver_total_rate += $rate;
                                    $driver_total_commission += $commission;
                                ?>
                                <?php }
                                $driver_avg_rate_per_mile = ($driver_total_miles > 0) ? ($driver_total_rate / $driver_total_miles) : 0;
                                ?>
                                <tr class="table-active font-weight-bold">
                                    <td colspan="3" class="text-end"><strong>Driver Totals:</strong></td>
                                    <td><strong><?php echo number_format($driver_total_miles, 0); ?> mi</strong></td>
                                    <td><strong>$<?php echo number_format($driver_total_rate, 2); ?></strong></td>
                                    <td><strong>$<?php echo number_format($driver_avg_rate_per_mile, 2); ?></strong></td>
                                    <td><strong>$<?php echo number_format($driver_total_commission, 2); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <?php } ?>

                    <div class="invoice-summary mt-4 border-top pt-3">
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <table class="table table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-end border-0"><strong>Total Rate Con.:</strong></td>
                                            <td class="text-end border-0">$<?php echo number_format($total_rate_con, 2);?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-end border-0"><strong>Dispatch Fee (<?php echo htmlentities($carrier["percentage"]);?>%):</strong></td>
                                            <td class="text-end border-0">$<?php echo number_format($invoice["total_amount"], 2);?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-end border-0"><strong>Tax (0%):</strong></td>
                                            <td class="text-end border-0">$0.00</td>
                                        </tr>
                                        <tr class="border-top">
                                            <td class="text-end pt-2"><strong style="font-size: 1.2em;">Total Amount Due:</strong></td>
                                            <td class="text-end pt-2"><strong style="font-size: 1.2em;">$<?php echo number_format($invoice["total_amount"], 2);?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
/* Invoice Summary Styling */
.invoice-summary {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 5px;
}

.invoice-summary table {
    background-color: white;
}

.invoice-summary td {
    padding: 8px 12px !important;
}

.invoice-summary .border-top {
    border-top: 2px solid #dee2e6 !important;
}

@media print {
    /* A4 Page Setup */
    @page {
        size: A4;
        margin: 15mm;
    }

    body {
        font-size: 10pt;
        line-height: 1.3;
    }

    /* Invoice Summary Print Styling */
    .invoice-summary {
        background-color: #f8f9fa !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    /* Driver Header Styling */
    .driver-header {
        background-color: #0d6efd !important;
        color: white !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
        color-adjust: exact;
        font-weight: bold;
        border: 2px solid #0d6efd;
        padding: 8px !important;
        font-size: 12pt;
    }

    /* Prevent driver section from breaking across pages */
    .driver-section {
        page-break-inside: avoid;
        break-inside: avoid;
    }

    /* If driver section must break, keep header with at least 2 rows */
    .driver-section table {
        page-break-inside: auto;
        break-inside: auto;
    }

    .driver-section thead {
        display: table-header-group;
    }

    /* Prevent orphaned headers - keep header with content */
    .driver-section h4.driver-header {
        page-break-after: avoid;
        break-after: avoid;
    }

    /* Keep table header with first row */
    .driver-section table thead {
        page-break-after: avoid;
        break-after: avoid;
    }

    /* Allow rows to break but keep row content together */
    .driver-section table tbody tr {
        page-break-inside: avoid;
        break-inside: avoid;
    }

    /* Keep the driver totals row with previous content if possible */
    .driver-section table tbody tr.table-active {
        page-break-before: avoid;
        break-before: avoid;
    }

    /* Table styling for print */
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 9pt;
    }

    table th,
    table td {
        padding: 4px 6px;
        border: 1px solid #dee2e6;
    }

    table thead {
        background-color: #f8f9fa !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    /* Compact spacing for print */
    .driver-section {
        margin-bottom: 15px !important;
    }

    .container, .row, .col-12 {
        width: 100% !important;
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .card {
        border: none !important;
        box-shadow: none !important;
    }

    /* Hide print button and unnecessary elements */
    .btn, button {
        display: none !important;
    }

    /* Ensure totals section stays together */
    .form_panel {
        page-break-inside: avoid;
        break-inside: avoid;
    }
}
</style>

<script>
function invoicePrintFunction() {
    window.print();
}
</script>



<?php

	include("../includes/layouts/public_footer.php");
?>