<?php 
include("../includes/data/invoices_data_fetch.php");
?>

<?php if (check_access("revenue_dashboard_2")){ ?>
<div class="row">
    <div class="col-12">
        <div class="row text-center">
            <div class="col-12">
                <div class="page-title-box">
                    <h2>
                        Revenue Stats
                    </h2>

                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-money-dollar-circle-line widget-icon"></i>
                        </div>
                        <div class="row">
                            <h5> Last Month Invoices amount</h5>
                            <h3 class="mt-3 mb-3"><?php echo '$'.$lastMonthInvoices;?></h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Paid :
                                    <?php echo '$'.$lastMonthPaidInvoices;?></span></br>
                                <?php 
                                    if ($lastMonthUnpaidInvoices > 0 ) 
                                        echo '<span class="text-danger me-2"> Unpaid : $ '.$lastMonthUnpaidInvoices.'  </span>'; 
                                    ?>
                        </div>
                    </div> <!-- end text row -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->

            <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-money-dollar-circle-line widget-icon"></i>
                        </div>
                        <div class="row">
                            <h5> This Month Invoices amount</h5>
                            <h3 class="mt-3 mb-3"><?php echo '$'.$thisMonthInvoices;?></h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Paid :
                                    <?php echo '$'.$thisMonthPaidInvoices;?></span></br>
                                <?php 
                                    if ($thisMonthUnpaidInvoices > 0 ) 
                                        echo '<span class="text-danger me-2"> Unpaid : $ '.$thisMonthUnpaidInvoices.'  </span>'; 
                                    ?>
                        </div>
                    </div> <!-- end text row -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->

            <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-money-dollar-circle-line widget-icon"></i>
                        </div>
                        <div class="row">
                            <h5> Last Week Invoices amount</h5>
                            <h3 class="mt-3 mb-3"><?php echo '$'.$totalInvoicesAmountWeek1;?></h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Paid :
                                    <?php echo '$'.$totalPaidInvoicesAmountWeek1;?></span></br>
                                <?php 
                                    if ($totalUnpaidInvoicesAmountWeek1 > 0 ) 
                                        echo '<span class="text-danger me-2"> Unpaid : $ '.$totalUnpaidInvoicesAmountWeek1.'  </span>'; 
                                    ?>
                        </div>
                    </div> <!-- end text row -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div>
    </div>
</div>

<?php } ?>

<?php
include("../includes/data/dispatch_graph_weekly.php");
include("../includes/data/dispatch_graph_by_agents.php");
?>