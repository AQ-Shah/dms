   <?php 
    if (isset ($_GET['id'])){
            $userData = find_user_by_id($_GET['id']);
            if (!$userData){
                $_SESSION["message"] = "User not found";
                redirect_to("home");
                }
                
                $permission = $userData['permission'];
            }  else { 
                $userData = $user;
            } 
    ?>

   <?php  if ((check_access("dispatch_agent_performance_1") && $user['id'] === $userData['id']) || (($current_page != 'home') && is_executive($user['permission']))){ ?>

   <?php if (is_dispatch_agent($userData['department_id'])) { ?>

   <div class="row">
       <div class="col-12">

           <div class="row text-center">
               <div class="col-12">
                   <div class="page-title-box">
                       <h2>
                           Dispatch Stats
                       </h2>

                   </div>
               </div>
           </div>


           <div class="row">
               <div class="col-sm-4">
                   <div class="card widget-flat">
                       <div class="card-body">
                           <div class="float-end">
                               <i class="ri-money-dollar-circle-line widget-icon"></i>
                           </div>
                           <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Last Month</h5>
                           <h3 class="mt-3 mb-3">
                               <?php echo '$'.find_dispatch_commission_paid_last_month_by_user($userData['id']);?></h3>
                           <p class="mb-0 text-muted">
                               <span class="text-nowrap">Total dispatch :
                                   <?php echo '$'.find_dispatch_commission_last_month_by_user($userData['id']);?></span></br>
                               <?php if (find_dispatch_commission_last_month_by_user($userData['id']) != 0 ){
                                            if ((find_dispatch_commission_last_month_by_user($userData['id']) - find_dispatch_commission_paid_last_month_by_user($userData['id'])) == 0 ) 
                                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.' All Paid </span>'; 
                                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> $'.(find_dispatch_commission_last_month_by_user($userData['id']) - find_dispatch_commission_paid_last_month_by_user($userData['id'])).' remaining </span>';
                                                    }?>
                           </p>
                       </div> <!-- end card-body-->
                   </div> <!-- end card-->
               </div>

               <div class="col-sm-4">
                   <div class="card widget-flat">
                       <div class="card-body">
                           <div class="float-end">
                               <i class="ri-money-dollar-circle-line widget-icon"></i>
                           </div>
                           <h5 class="text-muted fw-normal mt-0" title="Number of Customers">This Month</h5>
                           <h3 class="mt-3 mb-3">
                               <?php echo '$'.find_dispatch_commission_paid_this_month_by_user($userData['id']);?></h3>
                           <p class="mb-0 text-muted">
                               <span class="text-nowrap">Total dispatch :
                                   <?php echo '$'.find_dispatch_commission_this_month_by_user($userData['id']);?></span></br>
                               <?php if (find_dispatch_commission_this_month_by_user($userData['id']) != 0 ){
                                            if ((find_dispatch_commission_this_month_by_user($userData['id']) - find_dispatch_commission_paid_this_month_by_user($userData['id'])) == 0 ) 
                                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.' All Paid </span>'; 
                                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> $'.(find_dispatch_commission_this_month_by_user($userData['id']) - find_dispatch_commission_paid_this_month_by_user($userData['id'])).' remaining </span>';
                                                    }?>
                           </p>
                       </div> <!-- end card-body-->
                   </div> <!-- end card-->
               </div>

               <div class="col-sm-4">
                   <div class="card widget-flat">
                       <div class="card-body">
                           <div class="float-end">
                               <i class="ri-money-dollar-circle-line widget-icon"></i>
                           </div>
                           <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Last Week</h5>
                           <h3 class="mt-3 mb-3">
                               <?php echo '$'.find_dispatch_commission_paid_last_week_by_user($userData['id']);?></h3>
                           <p class="mb-0 text-muted">
                               <span class="text-nowrap">Total dispatch :
                                   <?php echo '$'.find_dispatch_commission_last_week_by_user($userData['id']);?></span></br>
                               <?php if (find_dispatch_commission_last_week_by_user($userData['id']) != 0 ){
                                            if ((find_dispatch_commission_last_week_by_user($userData['id']) - find_dispatch_commission_paid_last_week_by_user($userData['id'])) == 0 ) 
                                                        {echo '<span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>'.' All Paid </span>'; 
                                                        } else echo '<span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> $'.(find_dispatch_commission_last_week_by_user($userData['id']) - find_dispatch_commission_paid_last_week_by_user($userData['id'])).' remaining </span>';
                                                    }?>
                           </p>
                       </div> <!-- end card-body-->
                   </div> <!-- end card-->
               </div>
           </div>
           <!-- end row -->
       </div>
   </div>

   <?php } ?>
   <?php } ?>