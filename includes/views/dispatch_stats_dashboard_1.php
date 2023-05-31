<div class="row">

    <div class="col-xl-7 col-lg-6">
        <div class="card card-h-100">
            <div class="d-flex card-header justify-content-between align-items-center">
                <h4 class="header-title">Dispatch Agents </h4>
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
                <canvas id="dispatchGraphByAgents" style="width:100%;max-width:700px;height:90%"></canvas>

            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div> <!-- end col -->

    <div class="col-xl-5 col-lg-6">

        <div class="row">

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-truck-fill widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Monthly Dispatch</h5>
                        <h3 class="mt-3 mb-3"><?php echo $thisMonthDispatch;?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Last month :
                                <?php echo $lastMonthDispatch;?></span></br>
                            <?php if ($monthlyDispatchDifference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$monthlyDispatchDifference.' more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$monthlyDispatchDifference.' less </span>';?>

                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-truck-fill widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Weekly Dispatch</h5>
                        <h3 class="mt-3 mb-3"><?php echo $thisWeekDispatch;?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Last week :
                                <?php echo $lastWeekDispatch;?></span></br>
                            <?php if ($weeklyDispatchDifference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$weeklyDispatchDifference.' more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$weeklyDispatchDifference.' less </span>';?>

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
                            <i class="ri-truck-fill widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Today's Dispatch</h5>
                        <h3 class="mt-3 mb-3"><?php echo $todayDispatch;?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Yesterday :
                                <?php echo $yesterdayDispatch;?></span>
                            <?php if ($oneDayDispatchDifference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$oneDayDispatchDifference.' more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$oneDayDispatchDifference.' less </span>';?>
                            <span class="text-nowrap">Same Day Last Week :
                                <?php echo $sameDayLastWeekDispatch;?></span>
                            <?php if ($sameDayDispatchDifference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$sameDayDispatchDifference.' more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$sameDayDispatchDifference.' less </span>';?>

                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->


        </div> <!-- end row -->

    </div> <!-- end col -->
</div>

<div class="row">
    <div class="col-12 col-12">
        <div class="card card-h-100">
            <div class="d-flex card-header justify-content-between align-items-center">
                <h4 class="header-title">Weekly Dispatch Graph </h4>
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
                <canvas id="dispatchGraphWeekly" style="width:100%;max-height: 300px;"></canvas>

            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div> <!-- end col -->
</div>