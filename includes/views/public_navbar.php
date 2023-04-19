       <!-- ========== Topbar Start ========== -->
       <div class="navbar-custom">
           <div class="topbar container-fluid">
               <div class="d-flex align-items-center gap-lg-2 gap-1">

                   <!-- Topbar Brand Logo -->
                   <div class="logo-topbar">
                       <!-- Logo light -->
                       <a href="home" class="logo-light">
                           <span class="logo-lg">
                               <img src="assets/images/logo.png" alt="logo">
                           </span>
                           <span class="logo-sm">
                               <img src="assets/images/logo-sm.png" alt="small logo">
                           </span>
                       </a>

                       <!-- Logo Dark -->
                       <a href="home" class="logo-dark">
                           <span class="logo-lg">
                               <img src="assets/images/logo-dark.png" alt="dark logo">
                           </span>
                           <span class="logo-sm">
                               <img src="assets/images/logo-dark-sm.png" alt="small logo">
                           </span>
                       </a>
                   </div>

                   <!-- Sidebar Menu Toggle Button -->
                   <button class="button-toggle-menu">
                       <i class="mdi mdi-menu"></i>
                   </button>

                   <!-- Horizontal Menu Toggle Button -->
                   <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                       <div class="lines">
                           <span></span>
                           <span></span>
                           <span></span>
                       </div>
                   </button>

               </div>

               <ul class="topbar-menu d-flex align-items-center gap-3">


                   <li class="dropdown notification-list">
                       <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                           <i class="ri-notification-3-line font-22"></i>
                           <?php 
                                if (isset($user["id"])){
                                    $notification_count = max(mysqli_fetch_assoc(count_unseen_notifications_of($user["id"])));
                                    if ($notification_count !=0){
                                        echo '<span class="noti-icon-badge"></span>';
                                    }
                                }
                                ?>
                       </a>
                       <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                           <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                               <div class="row align-items-center">
                                   <div class="col">
                                       <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                                   </div>
                                   <div class="col-auto">
                                       <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                           <small>Clear All</small>
                                       </a>
                                   </div>
                               </div>
                           </div>

                           <div class="px-3" style="max-height: 300px;" data-simplebar>
                               <?php 
                                    $notifications_set = find_notifications_of_from($user["id"],0,10);
                                    while($notifications = mysqli_fetch_assoc($notifications_set)) { 
                                        $sender = find_user_by_id($notifications['sender_id']); ?>
                               <a href="notification.php?id=<?php echo $notifications['id']?>"
                                   class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                                   <div class="card-body">

                                       <div class="d-flex align-items-center">
                                           <div class="flex-shrink-0">
                                               <div class="notify-icon bg-primary">
                                                   <i class="mdi mdi-comment-account-outline"></i>
                                               </div>
                                           </div>
                                           <div class="flex-grow-1 text-truncate ms-2">
                                               <h5 class="noti-item-title fw-semibold font-14">
                                                   <?php echo $sender['username'];?>
                                                   <small class="fw-normal text-muted ms-1">
                                                       <?php if (!$notifications['seen']){ 
                                                            echo '<span class="badge">NEW</span>';
                                                        }?>
                                                   </small>
                                               </h5>
                                               <small
                                                   class="noti-item-subtitle text-muted"><?php  echo $sender['username'].' '.$notifications['content'].' ';?></small>
                                           </div>
                                       </div>
                                   </div>

                               </a>
                               <?php }	?>


                           </div>

                           <!-- All-->
                           <a href="javascript:void(0);"
                               class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                               View All
                           </a>

                       </div>
                   </li>

                   <li class="d-none d-sm-inline-block">
                       <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                           <i class="ri-settings-3-line font-22"></i>
                       </a>
                   </li>

                   <li class="d-none d-sm-inline-block">
                       <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left"
                           title="Theme Mode">
                           <i class="ri-moon-line font-22"></i>
                       </div>
                   </li>


                   <li class="d-none d-md-inline-block">
                       <a class="nav-link" href="#" data-toggle="fullscreen">
                           <i class="ri-fullscreen-line font-22"></i>
                       </a>
                   </li>

                   <li class="dropdown">
                       <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#"
                           role="button" aria-haspopup="false" aria-expanded="false">
                           <span class="account-user-avatar">
                               <img src="assets/images/users/img_avatar1" alt="user-image" width="32"
                                   class="rounded-circle">
                           </span>
                           <span class="d-lg-flex flex-column gap-1 d-none">
                               <h5 class="my-0"><?php echo $user["full_name"]; ?></h5>
                               <h6 class="my-0 fw-normal"><?php echo $user["designation"]; ?></h6>
                           </span>
                       </a>
                       <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                           <!-- item-->
                           <div class=" dropdown-header noti-title">
                               <h6 class="text-overflow m-0">Welcome !</h6>
                           </div>

                           <!-- item-->
                           <a href="profile" class="dropdown-item">
                               <i class="mdi mdi-account-circle me-1"></i>
                               <span>My Account</span>
                           </a>

                           <!-- item-->
                           <a href="edit_profile" class="dropdown-item">
                               <i class="mdi mdi-account-edit me-1"></i>
                               <span>Edit Account</span>
                           </a>

                           <!-- item-->
                           <a href="edit_privacy" class="dropdown-item">
                               <i class="mdi mdi-lifebuoy me-1"></i>
                               <span>Privacy Settings</span>
                           </a>

                           <!-- item-->
                           <a href="change_password" class="dropdown-item">
                               <i class="mdi mdi-lock-outline me-1"></i>
                               <span>Change Password</span>
                           </a>

                           <!-- item-->
                           <a href="logout" class="dropdown-item">
                               <i class="mdi mdi-logout me-1"></i>
                               <span>Logout</span>
                           </a>
                       </div>
                   </li>
               </ul>
           </div>
       </div>
       <!-- ========== Topbar End ========== -->


       <!-- ========== Left Sidebar Start ========== -->
       <div class="leftside-menu">

           <!-- Brand Logo Light -->
           <a href="home" class="logo logo-light">
               <span class="logo-lg">
                   <img src="assets/images/logo.png" alt="logo">
               </span>
               <span class="logo-sm">
                   <img src="assets/images/logo-sm.png" alt="small logo">
               </span>
           </a>

           <!-- Brand Logo Dark -->
           <a href="home" class="logo logo-dark">
               <span class="logo-lg">
                   <img src="assets/images/logo-dark.png" alt="dark logo">
               </span>
               <span class="logo-sm">
                   <img src="assets/images/logo-dark-sm.png" alt="small logo">
               </span>
           </a>

           <!-- Sidebar Hover Menu Toggle Button -->
           <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
               <i class="ri-checkbox-blank-circle-line align-middle"></i>
           </div>

           <!-- Full Sidebar Menu Close Button -->
           <div class="button-close-fullsidebar">
               <i class="ri-close-fill align-middle"></i>
           </div>

           <!-- Sidebar -left -->
           <div class="h-100" id="leftside-menu-container" data-simplebar>

               <!--- Sidemenu -->
               <ul class="side-nav">

                   <li class="side-nav-title">Navigation</li>

                   <li class="side-nav-item">
                       <a href="home" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                           <i class="uil-home-alt"></i>
                           <span> Home </span>
                       </a>
                   </li>

                   <li class="side-nav-title">Dispatch</li>

                   <li class="side-nav-item">
                       <a href="list_carriers" aria-expanded="false" aria-controls="sidebarDashboards"
                           class="side-nav-link">
                           <i class="uil-home-alt"></i>
                           <span> List Carriers </span>
                       </a>
                   </li>

                   <li class="side-nav-item">
                       <a href="list_dispatching" aria-expanded="false" aria-controls="sidebarDashboards"
                           class="side-nav-link">
                           <i class="uil-home-alt"></i>
                           <span> Dispatch Pending </span>
                       </a>
                   </li>

                   <li class="side-nav-item">
                       <a href="list_Unavailable" aria-expanded="false" aria-controls="sidebarDashboards"
                           class="side-nav-link">
                           <i class="uil-home-alt"></i>
                           <span> Unavailable </span>
                       </a>
                   </li>


                   <li class="side-nav-title">Sales</li>

                   <li class="side-nav-item">
                       <a href="new_carrier" aria-expanded="false" aria-controls="sidebarDashboards"
                           class="side-nav-link">
                           <i class="uil-home-alt"></i>
                           <span> New Carrier </span>
                       </a>
                   </li>



                   <li class="side-nav-title">Discussion</li>

                   <li class="side-nav-item">
                       <a href="show_news" aria-expanded="false" aria-controls="sidebarDashboards"
                           class="side-nav-link">
                           <i class="uil-home-alt"></i>
                           <span> News </span>
                       </a>
                   </li>
                   <li class="side-nav-item">
                       <a href="discussion_board" aria-expanded="false" aria-controls="sidebarDashboards"
                           class="side-nav-link">
                           <i class="uil-home-alt"></i>
                           <span> Discussion Board </span>
                       </a>
                   </li>

                   <li class="side-nav-title">Settings</li>

                   <li class="side-nav-item">
                       <a data-bs-toggle="offcanvas" href="#theme-settings-offcanvas" aria-expanded="false"
                           aria-controls="sidebarDashboards" class="side-nav-link">
                           <i class="ri-settings-3-line font-22"></i>
                           <span> Display Settings </span>
                       </a>
                   </li>



               </ul>
               <!--- End Sidemenu -->

               <div class="clearfix"></div>
           </div>
       </div>
       <!-- ========== Left Sidebar End ========== -->