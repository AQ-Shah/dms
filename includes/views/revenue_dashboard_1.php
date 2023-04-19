<?php 
include("../includes/data/dispatch_data_fetch.php");
?>

<div class="row">

    <div class="col-12">

        <div class="row">

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Monthly Dispatch
                                    Amount
                                </h5>
                                <h3 class="mt-3 mb-3"><?php echo '$'.$total_rate_this_month;?></h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-nowrap">Last Month :
                                        <?php echo '$'.$total_rate_last_month;?></span></br>
                                    <?php if ($monthlyRateDifference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$monthlyRateDifference.' more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$monthlyRateDifference.' less </span>';?>

                                </p>
                            </div>
                            <div class="col-sm-6">
                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">ATC Commission</h5>
                                <h3 class="mt-3 mb-3"><?php echo $thisWeekDispatch;?></h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-nowrap">Last week :
                                        <?php echo $lastWeekDispatch;?></span></br>
                                    <?php if ($weeklyDispatchDifference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$weeklyDispatchDifference.' more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$weeklyDispatchDifference.' less </span>';?>

                                </p>
                            </div>
                        </div> <!-- end text row -->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
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

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
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

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
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

<?php
include("../includes/data/dispatch_graph_weekly.php");
include("../includes/data/dispatch_graph_by_agents.php");
?>