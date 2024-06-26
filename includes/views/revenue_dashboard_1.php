<?php 
include("../includes/data/dispatch_data_fetch.php");
?>

<?php if (check_access("revenue_dashboard_1")){ ?>
<div class="row">
    <div class="col-12">
        <div class="row text-center">
            <div class="col-12">
                <div class="page-title-box">
                    <h2>
                        Dispatching Commission Stats
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
                            <h5> Monthly Dispatch Commission </h5>
                            <h3 class="mt-3 mb-3"><?php echo '$'.$total_commission_this_month;?></h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Last Month :
                                    <?php echo '$'.$total_commission_last_month;?></span></br>
                                <?php if ($monthly_commission_difference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$monthly_commission_difference.' $ more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$monthly_commission_difference.' $ less </span>';?>

                            </p>
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
                            <h5>Weekly Dispatch Commission </h5>
                            <h3 class="mt-3 mb-3"><?php echo '$'.$total_commission_this_week;?></h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Last Week :
                                    <?php echo '$'.$total_commission_last_week;?></span></br>
                                <?php if ($weekly_commission_difference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$weekly_commission_difference.' $ more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$weekly_commission_difference.' $ less </span>';?>

                            </p>
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
                            <h5>Today's Dispatch Commission </h5>
                            <h3 class="mt-3 mb-3"><?php echo '$'.$total_commission_today;?></h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Yesterday :
                                    <?php echo '$'.$total_commission_yesterday;?></span></br>
                                <?php if ($daily_commission_difference >0 ) 
                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.$daily_commission_difference.' $ more </span>'; 
                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>'.$daily_commission_difference.' $ less </span>';?>

                            </p>
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