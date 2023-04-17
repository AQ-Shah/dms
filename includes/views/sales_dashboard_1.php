<?php 
include("../includes/data/sales_data_fetch.php");
?>

<div class="row">
    <div class="col-xl-5 col-lg-6">

        <div class="row">

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Monthly Sales</h5>
                        <h3 class="mt-3 mb-3"><?php echo $thisMonthSale;?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Last month :
                                <?php echo $lastMonthSale;?></span></br>
                            <?php if ($monthlySalesDifference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$monthlySalesDifference.' more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$monthlySalesDifference.' less </span>';?>

                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Weekly Sales</h5>
                        <h3 class="mt-3 mb-3"><?php echo $thisWeekSale;?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Last week :
                                <?php echo $lastWeekSale;?></span></br>
                            <?php if ($weeklySalesDifference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$weeklySalesDifference.' more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$weeklySalesDifference.' less </span>';?>

                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->


        </div>
        <!-- end row -->

        <div class="row">

            <div class="col-sm-12">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Today's Sales</h5>
                        <h3 class="mt-3 mb-3"><?php echo $todaySale;?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Yesterday :
                                <?php echo $yesterdaySale;?></span>
                            <?php if ($oneDaySalesDifference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$oneDaySalesDifference.' more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$oneDaySalesDifference.' less </span>';?>
                            <span class="text-nowrap">Same Day Last Week :
                                <?php echo $sameDayLastWeekSale;?></span>
                            <?php if ($sameDaySalesDifference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$sameDaySalesDifference.' more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$sameDaySalesDifference.' less </span>';?>

                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->


        </div> <!-- end row -->

    </div> <!-- end col -->

    <div class="col-xl-7 col-lg-6">
        <div class="card card-h-100">
            <div class="d-flex card-header justify-content-between align-items-center">
                <h4 class="header-title">Sales Agents </h4>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <canvas id="salesGraphByAgents" style="width:100%;max-width:700px;height:90%"></canvas>

            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div> <!-- end col -->
</div>

<div class="row">
    <div class="col-12 col-12">
        <div class="card card-h-100">
            <div class="d-flex card-header justify-content-between align-items-center">
                <h4 class="header-title">Weekly Sales Graph </h4>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <canvas id="salesWeeklyChart" style="width:100%;max-height: 400px;"></canvas>

            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div> <!-- end col -->
</div>

<?php
include("../includes/data/sales_graph_weekly.php");
include("../includes/data/sales_graph_by_agents.php");
?>