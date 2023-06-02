   <?php   include("../includes/pagination/carriers_by_sales_agent_data_fetch.php");  ?>

   <?php if (check_access("sales_agent_performance_1")){ ?>
   <div class="row">

       <div class="col-12">


           <div class="row">
               <div class="col-sm-4">
                   <div class="card tilebox-one">
                       <div class="card-body">
                           <i class="ri-shopping-basket-2-line float-end text-muted"></i>
                           <h6 class="text-muted text-uppercase mt-0">Total Sales</h6>
                           <h2 class="m-b-20">0</h2>

                       </div> <!-- end card-body-->
                   </div>
                   <!--end card-->
               </div><!-- end col -->

               <div class="col-sm-4">
                   <div class="card tilebox-one">
                       <div class="card-body">
                           <i class="ri-archive-line float-end text-muted"></i>
                           <h6 class="text-muted text-uppercase mt-0">This Month</h6>
                           <h2 class="m-b-20"><span>0</span></h2>
                           <!-- <span class="badge bg-danger"> -0% </span> <span class="text-muted">From
                               previous Month</span> -->
                       </div> <!-- end card-body-->
                   </div>
                   <!--end card-->
               </div><!-- end col -->

               <div class="col-sm-4">
                   <div class="card tilebox-one">
                       <div class="card-body">
                           <i class="ri-vip-diamond-line float-end text-muted"></i>
                           <h6 class="text-muted text-uppercase mt-0">Total Active</h6>
                           <h2 class="m-b-20">0</h2>

                       </div> <!-- end card-body-->
                   </div>
                   <!--end card-->
               </div><!-- end col -->

           </div>
           <!-- end row -->


           <div class="card">
               <div class="card-body">
                   <h4 class="header-title mb-3">My Products</h4>

                   <div class="row panel table-primary p-2">
                       <div class="panel-body table-responsive">
                           <table class="table table-hover" id="currentTable">
                               <thead>
                                   <tr>
                                       <th onclick="sortTable(0)">Carrier Name
                                           <span class="sort-arrows"></span>
                                       </th>
                                       <th onclick="sortTable(1)">Truck Type
                                           <span class="sort-arrows"></span>
                                       </th>

                                       <th onclick="sortTable(2)">Driver Name
                                           <span class="sort-arrows"></span>
                                       </th>
                                       <th onclick="sortTable(3)">Driver Number
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
                                   <?php if (isset($record_set)) { ?>
                                   <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                                   <tr>
                                       <td><?php echo htmlentities($record["b_name"]); ?></td>
                                       <td><?php echo htmlentities($record["truck_type"]); ?></td>
                                       <td><?php echo htmlentities($record["d_name"]); ?> </td>
                                       <td><?php echo htmlentities($record["d_number"]); ?> </td>
                                       <td><?php echo htmlentities($record["sale_active"]); ?> </td>
                                       <?php if($record["status"] == 'unavailable') { ?>
                                       <td style="color: red;">Unavailable</td>
                                       <?php } else { ?>
                                       <td style="color: green;">Available</td>
                                   </tr>
                                   <?php } ?>
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

       </div>
       <!-- end col -->

   </div>

   <?php } ?>