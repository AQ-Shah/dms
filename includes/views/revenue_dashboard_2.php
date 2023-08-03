<?php 
include("../includes/data/invoices_data_fetch.php");
?>

<?php if (check_access("revenue_dashboard_2")){ ?>
<div class="row">
    <div class="col-12">


        <div class="row">
            <div class="col-12 col-12">
                <div class="card card-h-100">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h4 class="header-title">This Month Invoice States </h4>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <canvas id="invoiceGraphMonthly" style="width:100%;max-height: 300px;"></canvas>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
    </div>
</div>

<?php } ?>

<?php
include("../includes/data/invoices_graph_monthly.php");

?>