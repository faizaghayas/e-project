<?php
session_start();
if(!isset($_SESSION["user_email"])){
    echo'<script>window.location.assign("login.php");</script>';
};
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-vaccine - Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Varela+Round&display=swap" rel="stylesheet">
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
       <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
    .form-control:focus{
      color:#fff !important;
    }
    #barChart{
      width: 100% !important;
      height: 400px !important;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" style="text-decoration: none; font-family: 'Varela Round', sans-serif; color: white; letter-spacing: 0.2rem; margin-left: 0.8rem; font-size:1.5rem;" href="index.html">E-VACCINE</a>
          <a class="sidebar-brand brand-logo-mini" style="text-decoration: none; color: white;" href="index.html">V</a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="images/Profile-1.webp" alt="">
                  <span class="count bg-success"></span>
                </div>
                <?php
                include 'config.php';
                $u_id=$_GET['u_id'];
                $user="SELECT * FROM `user` WHERE user_id = $u_id";
                $user_Q=mysqli_query($con,$user);
                $user_data=mysqli_fetch_assoc($user_Q);

                ?>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $user_data['username'];?></h5>
                  <span>Admin</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
               
                <div class="dropdown-divider"></div>
                <a href="admin_change_pass.php?u_id=<?php echo $u_id;?>" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
              
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="admin_main.php?u_id=<?php echo $u_id?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
        
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
             
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Hospitals</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="hospitals.php?u_id=<?php echo $u_id;?>">Hospitals</a></li>
                <li class="nav-item"> <a class="nav-link" href="reject_hosp.php?u_id=<?php echo $u_id;?>">Rejected Hospitals</a></li>
                <li class="nav-item"> <a class="nav-link" href="approve_hosp.php?u_id=<?php echo $u_id;?>">Approved Hospitals</a></li>
                <li class="nav-item"> <a class="nav-link" href="pend_hosp.php?u_id=<?php echo $u_id;?>">Pending Hospitals</a></li>
              </ul>
            </div>
          </li>
         
          <li class="nav-item menu-items">
            <a class="nav-link" href="admin_vacc.php?u_id=<?php echo $u_id;?>">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Vaccines</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="logout.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Logout</span>
            </a>
          </li>
         
          <li class="nav-item menu-items">
            <a class="nav-link" href="user.php?u_id=<?php echo $u_id;?>">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Users</span>
            </a>
          </li>
        </ul>
      </nav>
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
            
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <?php
               $msg_sql = "SELECT * FROM `contact` WHERE is_viewed = 0";
               $msg_result= mysqli_query($con,$msg_sql);
               $count = mysqli_num_rows($msg_result);
              ?>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <?php
                   if(mysqli_num_rows($msg_result)> 0){
                  ?>
                 
                  <span class="count bg-success"></span>
                  <?php
                   }
                  ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <?php
            $query = "SELECT * FROM `contact` WHERE is_viewed = 0 ORDER BY `contact_id` DESC LIMIT 3";
            $result_notification = mysqli_query($con,$query);
            $count_notification = mysqli_num_rows($result_notification);
                if ($count_notification > 0){
                    while($rows = mysqli_fetch_array($result_notification)){
                ?>
                  <a class="dropdown-item preview-item" >
                    <!-- <div class="preview-thumbnail">
                      <img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div> -->
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1"><?php echo $rows['name'];?> send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <?php
                    }}
                  ?>
                 
                  <div class="dropdown-divider"></div>
                  <a href="message.php?u_id=<?php echo $u_id;?>"><p class="p-3 mb-0 text-center"><?php echo $count;  ?> new messages</p></a>
                </div>
              </li>
             
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="images/Profile-1.webp" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $user_data['username'];?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-message text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1"><?php echo $user_data['user_email'];?></p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="logout.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                 
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>