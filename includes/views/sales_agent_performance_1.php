   <?php 
    if (isset ($_GET['id'])){
            $userData = find_user_by_id(decrypt_id($_GET['id']));
            if (!$userData){
                $_SESSION["message"] = "User not found";
                redirect_to("home");
                }
                
                $permission = $userData['permission'];
            }  else { 
                $userData = $user;
            } 
    ?>

   <?php  if ((check_access("sales_agent_performance_1") && $user['id'] === $userData['id']) || (($current_page != 'home') && is_executive($user['permission']))){ ?>

   <?php if (is_sales_agent($userData['department_id'])) { ?>
   <?php include("../includes/pagination/carriers_by_sales_agent_data_fetch.php"); ?>

   <div class="row">
       <div class="col-12">

           <div class="row text-center">
               <div class="col-12">
                   <div class="page-title-box">
                       <h2>
                           My Sales Stats
                       </h2>

                   </div>
               </div>
           </div>


           <div class="row">
               <div class="col-sm-3">
                   <div class="card tilebox-one">
                       <div class="card-body">
                           <i class="ri-money-dollar-box-line float-end text-muted"></i>
                           <h6 class="text-muted text-uppercase mt-0">Total Sales</h6>
                           <h2 class="m-b-20">
                               <span><?php echo no_of_carrier_by_agent($userData['id']); ?></span>
                           </h2>

                       </div> <!-- end card-body-->
                   </div>
                   <!--end card-->
               </div><!-- end col -->

               <div class="col-sm-3">
                   <div class="card tilebox-one">
                       <div class="card-body">
                           <i class="ri-money-dollar-box-line float-end text-muted"></i>
                           <h6 class="text-muted text-uppercase mt-0">Month Sales</h6>
                           <h2 class="m-b-20">
                               <span><?php echo no_of_carrier_this_month_by_agent($userData['id']); ?></span>
                           </h2>
                           <!-- <span class="badge bg-danger"> -0% </span> <span class="text-muted">From
                                previous Month</span> -->
                       </div> <!-- end card-body-->
                   </div>
                   <!--end card-->
               </div><!-- end col -->

               <div class="col-sm-3">
                   <div class="card tilebox-one">
                       <div class="card-body">
                           <i class="ri-money-dollar-box-fill float-end text-muted"></i>
                           <h6 class="text-muted text-uppercase mt-0">Total Active</h6>
                           <h2 class="m-b-20"><span><?php echo no_of_active_carrier_by_agent($userData['id']); ?></span>
                           </h2>

                       </div> <!-- end card-body-->
                   </div>
                   <!--end card-->
               </div><!-- end col -->

               <div class="col-sm-3">
                   <div class="card tilebox-one">
                       <div class="card-body">
                           <i class="ri-money-dollar-box-line float-end text-muted"></i>
                           <h6 class="text-muted text-uppercase mt-0">Month Active</h6>
                           <h2 class="m-b-20">
                               <span><?php echo no_of_carrier_this_month_by_agent($userData['id']); ?></span>
                           </h2>
                           <!-- <span class="badge bg-danger"> -0% </span> <span class="text-muted">From
                                previous Month</span> -->
                       </div> <!-- end card-body-->
                   </div>
                   <!--end card-->
               </div><!-- end col -->





           </div>
           <!-- end row -->

           <?php if (!empty($record_set)) { ?>
           <div class="card">
               <div class="card-body">
                   <h4 class="header-title mb-3">Sales List</h4>

                   <div class="row panel table-primary p-2">
                       <div class="panel-body table-responsive">
                           <table class="table table-hover" id="currentTable">
                               <thead>
                                   <tr>
                                       <th onclick="sortTable(0)">Carrier Name
                                           <span class="sort-arrows"></span>
                                       </th>
                                       <th onclick="sortTable(1)">Number of Trucks
                                           <span class="sort-arrows"></span>
                                       </th>

                                       <th onclick="sortTable(2)">Owner Name
                                           <span class="sort-arrows"></span>
                                       </th>
                                       <th onclick="sortTable(3)">Business Number
                                           <span class="sort-arrows"></span>
                                       </th>
                                       <th onclick="sortTable(4)">Sale Active
                                           <span class="sort-arrows"></span>
                                       </th>
                                       <th onclick="sortTable(5)">Current Status
                                           <span class="sort-arrows"></span>
                                       </th>

                                   </tr>
                               </thead>
                               <tbody>

                                   <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                                   <tr>
                                       <td><?php echo htmlentities($record["b_name"]); ?></td>
                                       <td><?php echo no_of_trucks_by_carrier($record["id"]); ?></td>
                                       <td><?php echo htmlentities($record["o_name"]); ?> </td>
                                       <td><?php echo htmlentities($record["b_number"]); ?> </td>
                                       <td><?php echo htmlentities($record["sale_active"]); ?> </td>
                                       <?php if($record["status"] == 'unavailable') { ?>
                                       <td style="color: red;">Unavailable</td>
                                       <?php } else { ?>
                                       <td style="color: green;">Available</td>
                                   </tr>
                                   <?php } ?>
                                   <?php } ?>
                               </tbody>
                           </table>

                           <div class="row form_panel">
                               <?php include("../includes/pagination/bottom_pagination_bar.php");?>
                           </div>
                       </div>
                   </div>
               </div> <!-- end col-->
           </div> <!-- end row-->
           <?php } ?>
       </div>
   </div>

   <?php } ?>
   <?php } ?>