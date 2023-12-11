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
    <style>.form-control:focus{
      color:#fff !important;
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
                <?php 
                include 'config.php';                  
                $hos_id=$_GET['h_id'];
                  $u_id=$_GET['u_id'];
                $imgQ="SELECT * FROM `hospital` WHERE `user_id` = $u_id ";
                $img_result=mysqli_query($con,$imgQ);
                $img_data=mysqli_fetch_assoc($img_result);
                ?>
                  <img class="img-xs rounded-circle" src="images/<?php echo $img_data["hospital_img"];?>" alt="">
                  <span class="count bg-success"></span>
                </div>
              
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $img_data["hospital_name"];?></h5>
                  <span>Hosiptal Member</span>
                </div>
              </div>
                <div class="dropdown-divider"></div>
                <a href="hos_chg_pass.php?u_id=<?php echo $u_id?>&h_id=<?php echo $hos_id;?>" class="dropdown-item preview-item">
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
            <a class="nav-link" href="hosp_panel_main.php?h_id=<?php echo $hos_id;?>&u_id=<?php echo $u_id;?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php
          // error_reporting(0);
           
          ?>

          <li class="nav-item menu-items">
            <a class="nav-link" href="hos_vacc_quan.php?u_id=<?php echo $u_id;?>&h_id=<?php echo $hos_id;?>">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Vaccines</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
                </span>
              <span>Child Details</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="hosp_pat_detail.php?u_id=<?php echo $u_id;?>&h_id=<?php echo $hos_id;?>">Child </a></li>
                <li class="nav-item"> <a class="nav-link" href="hosp_pat_dos.php?u_id=<?php echo $u_id;?>&h_id=<?php echo $hos_id;?>">Child Dose Details </a></li>
                <li class="nav-item"> <a class="nav-link" href="hosp_reject_pat.php?u_id=<?php echo $u_id;?>&h_id=<?php echo $hos_id;?>">Rejected Child </a></li>
                <li class="nav-item"> <a class="nav-link" href="hosp_approve_pat.php?u_id=<?php echo $u_id;?>&h_id=<?php echo $hos_id;?>">Approved Child</a></li>
                <li class="nav-item"> <a class="nav-link" href="hosp_pend_pat.php?u_id=<?php echo $u_id;?>&h_id=<?php echo $hos_id;?>">Pending Child </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="logout.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Logout</span>
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
           
             
              
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="images/<?php echo $img_data["hospital_img"];?>" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $img_data["hospital_name"];?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
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