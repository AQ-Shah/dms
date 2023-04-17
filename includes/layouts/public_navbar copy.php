<nav class="navbar navbar-expand-sm navbar-dark noprint">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="assets/images/icon.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <?php if (user_logged_in()) {?>
            <?php if (isset($current_page)) {?>
            <ul class="navbar-nav me-auto">
                <li class="nav-item <?php if ($current_page=='home'){ echo 'active';}?>">
                    <a class="nav-link" href="home">Home</a>
                </li>
                <li class="nav-item <?php if ($current_page=='profile'){ echo 'active';}?>">
                    <a class="nav-link" href="profile">Profile</a>
                </li>
                <li class="nav-item <?php if ($current_page=='my_tasks'){ echo 'active';}?>">
                    <a class="nav-link" href="list_carriers">My Tasks</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Notifications
                        <span class="badge">
                            <?php 
							if (isset($user["id"])){
								$notification_count = max(mysqli_fetch_assoc(count_unseen_notifications_of($user["id"])));
                                if ($notification_count !=0){
                                    echo $notification_count;
                                }
							}
							?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php 
							$notifications_set = find_notifications_of_from($user["id"],0,10);
							while($notifications = mysqli_fetch_assoc($notifications_set)) { 
								$sender = find_user_by_id($notifications['sender_id']);
						?>
                        <li>
                            <a href="notification.php?id=<?php echo $notifications['id']?>">
                                <?php 
									echo $sender['username'].' '.$notifications['content'].' ';
									if (!$notifications['seen']){ 
										echo '<span class="badge">NEW</span>';
									}
								?>
                            </a>
                        </li>
                        <?php }	?>
                    </ul>
                </li>
            </ul>
            <?php }?>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item <?php if ($current_page=='forums'){ echo 'active';}?>">
                    <a class="nav-link" href="forums">Forums</a>
                </li>
                <li class="nav-item">
                    <img style="height:40px;width:40px" x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice"
                        width="100%" class="img-rounded" src="../public/assets/images/users/img_avatar1.png">
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown" href="#">Settings</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="nav-item"><a class="nav-link" href="edit_profile">Edit Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="edit_privacy">Change Privacy</a></li>
                        <li class="nav-item"><a class="nav-link" href="change_password">Change Password</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
                </li>
            </ul>
            <?php } ?>
        </div>
    </div>
</nav>