<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="assets/css/maicons.css">

  <link rel="stylesheet" href="assets/css/bootstrap.css">

  <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="assets/vendor/animate/animate.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/theme.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    * {
      font-family: 'Poppins', sans-serif;
      ;
    }

    #dropdown-bttn:hover {
      color: #5faac7 !important;
    }
    .btn-primary {
      background-color: #61b3c1;
    }

    .banner-home {
      background-color: #61b3c1;
    }
    a:hover {
      text-decoration: none;
    }
    .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active, .show > .btn-primary.dropdown-toggle {
      background-color: #61b3c1;
    }
    .navbar-light .navbar-nav .show > .nav-link, .navbar-light .navbar-nav .active > .nav-link, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .nav-link.active {
      color: #61b3c1;
    }
    .text-primary {
      color: #61b3c1 !important;

    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
   <?php
   error_reporting(0);
   if(isset($_SESSION["user_email"])){

   
      $regi_id = $_GET['u_id'];
      $_SESSION['$reg_id'] = $regi_id;
      $reg_id=$_SESSION['$reg_id'];

   }else{
    $_SESSION['$reg_id'] = "  ";
   }

    if (isset($_SESSION["user_email"]) && isset($reg_id)){
   ?>
        <a class="navbar-brand" href="index.php?u_id=<?php echo $reg_id; ?>"><span class="text-primary">One</span>-Health</a>
<?php
    }
    else{
      ?>
        <a class="navbar-brand" href="index.php"><span class="text-primary">One</span>-Health</a>
      <?php
    }
?>
        <!-- <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username"
              aria-describedby="icon-addon1">
          </div>
        </form> -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
          aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
     <?php
          if (isset($_SESSION["user_email"]) && isset($reg_id)){
   ?>
            <li class="nav-item active">
              <a class="nav-link" href="index.php?u_id=<?php echo $reg_id; ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php?u_id=<?php echo $reg_id; ?>">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="main_hospital.php?u_id=<?php echo $reg_id; ?>">Hospitals</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="main_vaccines.php?u_id=<?php echo $reg_id; ?>">Vaccine</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php?u_id=<?php echo $reg_id; ?>">Contact</a>
            </li>
            <?php
          }
          else{
            ?>
             <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="main_hospital.php">Hospitals</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="main_vaccines.php">Vaccine</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <?php
          }
            ?>
            <?php
            include "config.php";
            $regi_id = $_GET['u_id'];
        $_SESSION['$reg_id'] = $regi_id;
        $reg_id=$_SESSION['$reg_id'];
            
            if (isset($_SESSION["user_email"])) {
              ?>
              <li style="margin-left: 3rem;" class="nav-item">
                <div class="dropdown">
                  <a href="#" id="imageDropdown" data-toggle="dropdown">
                    <img class="rounded-circle" src="images/<?php echo $_SESSION["user_img"]; ?>" width="23px" alt="assets/img/person/profile.png">
                    <span
                      style="color:rgba(110, 128, 122, 0.8); font-size: 1rem; text-transform: capitalize; padding:0 0.2rem;">
                      <?php echo $_SESSION["user_name"]; ?>
                    </span>

                  </a>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="imageDropdown"
                    style="  color:#665d5d !important; text-decoration: none; font-size: 0.9rem;padding: 0.9rem 1rem; text-transform: capitalize; border: none; outline: none;">
                    <li role="presentation" style=" padding: 0.3rem 0;"><a role="menuitem"
                        style="color:#665d5d !important; text-decoration: none;" tabindex="-1" href="#">
                        <?php echo $_SESSION["user_email"]; ?>
                      </a></li>
                      <?php
                      //  $sql= "SELECT * FROM `parent` WHERE `user_id` = $reg_id ";
                      //  $result=mysqli_query($con,$sql);
                      //  $row=mysqli_fetch_assoc($result);
                      //  if(isset($reg_id)){
                      //   if(mysqli_num_rows($result) == 0){
                      //     $app_msg= 'Book Appointment';
                      //     $app_url= 'parent_reg.php';
                      //   }
                      //   else if($row['parent_status'] == 0){
                      //     $app_msg= ' ';
                      //     $app_url= ' ';
                      //   }
                      //   else if($row['parent_status'] == 1){
                      //     $app_msg= ' ';
                      //     $app_url= ' ';
                      //   }
                      //   else if($row['parentstatus'] == 2){
                      //     $app_msg= 'Book Appointment';
                      //     $app_url= 'parent_reg.php';
                      //   }
                      // }
                     
                      // if(mysqli_num_rows($result) == 0){
                      //  echo' <li role="presentation" style=" padding: 0.3rem 0;"><a role="menuitem"
                      //   style="color:rgba(39, 39, 39, 0.8) !important; text-decoration: none;" tabindex="-1" href="parent_reg.php">Book Appointment
                      // </a></li>';
                      // }
                      ?>
                   
                    <?php
                    // error_reporting(0);
                    //   
                    $hos_sql= "SELECT * FROM `hospital` WHERE `user_id` = $reg_id ";
                    $hos_result=mysqli_query($con,$hos_sql);
                    $hos_row=mysqli_fetch_assoc($hos_result);  
                    $pat_sql= "SELECT * FROM `parent` WHERE `user_id` = $reg_id ";
                    $pat_result=mysqli_query($con,$pat_sql);
                    $pat_row=mysqli_fetch_assoc($pat_result);
                      if(isset($reg_id)){
                        
                      


                      if(mysqli_num_rows($hos_result) == 0 && mysqli_num_rows($pat_result) == 0){
                        $pat_msg= "Book Appointment";
                        $pat_url= "parent_reg.php?u_id=$reg_id";
                        $hos_msg= "Hospital Register";
                          $hos_url= "hosp_reg.php?u_id=$reg_id";
                      }  
                      
                      else if(mysqli_num_rows($hos_result) == 1){
                         if($hos_row['hospital_status'] == 1){
                          $pat_msg= " ";
                              $pat_url= "";
                              $hos_msg= "Hospital Pending";
                                $hos_url= " ";
                            }
                            if($hos_row['hospital_status'] == 2){
                              $pat_msg= " ";
                              $pat_url= "";
                              $hos_msg= "Hospital Register";
                                $hos_url= "hosp_reg.php";
                              
                                }
                             } 
                      else if(mysqli_num_rows($pat_result) == 1){
                        $pat_msg= "Appoint Pending ";
                        $pat_url= " ";
                        $hos_msg= " ";
                          $hos_url= " ";
                          if($pat_row['parent_status'] == 0){
                            $pat_msg= "Appoint info ";
                            $pat_url= "appoint_info.php?u_id=$reg_id";
                            $hos_msg= " ";
                              $hos_url= " ";
                          }
                      }

                    }
                                       ?>

                     <li role="presentation" style=" padding: 0.3rem 0;"><a role="menuitem"
                        style="color:rgba(39, 39, 39, 0.8) !important; text-decoration: none;" tabindex="-1" href="<?php
                        echo $pat_url;?>"><?php echo $pat_msg;?></a></li>
                      <li role="presentation" style=" padding: 0.3rem 0;"> <a role="menuitem"
                        style="  color:rgba(39, 39, 39, 0.8) !important; text-decoration: none; " tabindex="-1"
                        href="<?php
                        echo $hos_url;
                        ?>">
                        <?php
                        echo $hos_msg;
                        ?>
                      </a></li>
                    <li role="presentation" style=" padding: 0.3rem 0;"><a role="menuitem"
                        style="  color:rgba(39, 39, 39, 0.8) !important; text-decoration: none;" tabindex="-1"
                        href="main_settings.php?u_id=<?php echo $reg_id?>">settings</a></li>
                  
                    <li role="presentation" class="divider"></li>
                    <hr style="margin:0.3rem 0;">
                    <li role="presentation" style=" padding: 0.3rem 0;"><a role="menuitem"
                        style="  color:rgba(39, 39, 39, 0.8) !important; text-decoration: none;" tabindex="-1"
                        href="logout.php">Logout</a></li>
                  </ul>
                </div>
              </li>

              <?php
            } else {
              ?>
              <li class="nav-item">
                <div class="btn-group dropdown">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Login/Register
                  </button>
                  <div class="dropdown-menu px-3 py-3" style="border: none; outline: none;">
                    <a href="login.php"><span class="btn" id="dropdown-bttn"
                        style="color: rgb(48, 47, 47); font-size: 0.9rem; padding: 0rem 0.5rem;">Parent Sign up</span></a>
                    <hr style="margin:0.4rem 0;">

                    <a href="login.php"><span class="btn" id="dropdown-bttn"
                        style="color: rgb(48, 47, 47); font-size: 0.9rem; padding: 0rem 0.3rem;">Hospital Sign
                        up</span></a>

                    <br>
                  </div>
                </div>
              </li>
              <?php
            }
            ?>
          </ul>

        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->

    </nav>
  </header>