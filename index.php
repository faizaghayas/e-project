<?php
include("main_header.php");
?>

<div class="page-hero bg-image overlay-dark" style="background-image: url(assets/img/bg_image_1.jpg);">
  <div class="hero-section">
    <div class="container text-center wow zoomIn">
      <span class="subhead">Let's make your life happier</span>
      <h1 class="display-4">Healthy Living</h1>
      <?php
      $u_id = $_GET['u_id'];
      if(isset($u_id)) {
        echo '<a href="parent_reg.php?u_id='.$u_id.'" class="btn btn-primary">Lets Consult</a>';

      }
      ?>

    </div>
  </div>
</div>


<div class="bg-light">
  <div class="page-section py-3 mt-md-n5 custom-index">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card-service wow fadeInUp">
            <div class="circle-shape bg-secondary text-white">
              <span class="mai-chatbubbles-outline"></span>
            </div>
            <p><span>Chat</span> with a doctors</p>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card-service wow fadeInUp">
            <div class="circle-shape bg-primary text-white">
              <span class="mai-shield-checkmark"></span>
            </div>
            <p><span>One</span>-Health Protection</p>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card-service wow fadeInUp">
            <div class="circle-shape bg-accent text-white">
              <span class="mai-basket"></span>
            </div>
            <p><span>One</span>-Health Pharmacy</p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .page-section -->

  <div class="page-section pb-0">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3 wow fadeInUp">
          <h1>Now Can Register Your <br>Hospital</h1>
          <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
            tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur
            ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>
          <?php
          $u_id = $_GET['u_id'];
          if(isset($u_id)) {
            echo '<a href="hosp_reg.php?'.$u_id.'" class="btn btn-primary">Register Now</a>';

          }
          ?>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
          <div class="img-place custom-img-1">
            <img src="assets/img/blog/blog_1.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .bg-light -->
</div> <!-- .bg-light -->

<div class="page-section">
    
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp d-flex justify-content-center">Vaccines</h1>
      <div class="owl-carousel wow fadeInUp " id="doctorSlideshow">

      <?php
      include "config.php";
      $sql = "SELECT * FROM `vaccine` WHERE `vaccine_quan` > 0 ORDER BY `vaccine_id` DESC ";
      $run = mysqli_query($con, $sql);
      if(mysqli_num_rows($run)) {
        while($data = mysqli_fetch_assoc($run)) {
          ?>


          <div class="item m-4">
            <div class="card-doctor">
              <div class="header">
                <div style=" width:100%; height: 100%; "><i
                    style="color:#61b3c1; font-size:12rem; margin:2rem 1.5rem;  text-align:center;"
                    class="fa-solid fa-virus fa-lg"></i></div>
                <div class="meta">
                  <a href="#"><span class="mai-call"></span></a>
                  <a href="#"><span class="mai-logo-whatsapp"></span></a>
                </div>
              </div>
              <div class="body">
                <p class="text-xl text-center mb-0">
                  <?php echo $data['vaccine_name']; ?>
                </p>
                <?php
                $reg_id = $_GET['u_id'];
                $vacc_id = $data['vaccine_id'];
                if(isset($reg_id)) {
                  $vacc_url = "parent_reg.php?vacc_id=$vacc_id";
                } else {
                  $vacc_url = "login.php";
                }
                ?>
                <a style="width: 100%; " href="<?php echo $vacc_url; ?>"><button
                    style="width: 100%; outline: none; border: none;  background-color:#61b3c1; color: white; border-radius: 0.5rem; margin: 1rem 0; padding: 0.3rem 0;">Apply
                    Now</button></a>
              </div>
            </div>
          </div>
          <?php
        }
      }

      ?>
    </div>

  </div>
</div>

<div class="page-section bg-light">
  <div class="container">
    <h1 class="text-center wow fadeInUp">Hospitals</h1>
    <div class="row mt-5 d-flex justify-content-center">
      <?php
      $sql = "SELECT * FROM `hospital` WHERE `hospital_status`= 0 ORDER BY `hospital_id` DESC limit 3 ";
      $run = mysqli_query($con, $sql);
      if(mysqli_num_rows($run)) {
        while($data = mysqli_fetch_assoc($run)) {
          ?>
          <div class="col-lg-4 py-2 wow zoomIn">

            <div class="card-blog">
              <div class="header">
                <div class="post-category">
                  <a href="#"></a>
                </div>
                <a href="blog-details.html" class="post-thumb">
                  <img src="images/<?php echo $data['hospital_img']; ?>" alt="">
                </a>
              </div>
              <div class="body">
                <h5 class="post-title"><a href="blog-details.html">
                    <?php echo $data['hospital_name']; ?>
                  </a></h5>
                <div class="site-info">
                  <div class="avatar mr-2">
                    <span>
                      <?php echo $data['hospital_manager']; ?>
                    </span>
                  </div>
                  <span class="mai-time"></span>
                  
                 
                  
                </div>
                <?php

                ?>
              </div>
            </div>

          </div>
          <?php
        }
      }
      $u_id = $_GET['u_id'];

      ?>

      <div class="col-12 text-center mt-4 wow zoomIn">
        <a href="main_hospital.php?u_id=<?php echo $u_id ?>" class="btn btn-primary">Explore More</a>
      </div>

    </div>
  </div>
</div> <!-- .page-section -->

<div class="page-section">
  <div class="container">
    <h1 class="text-center wow fadeInUp">Contact Us</h1>


    <?php
    $res_succ = '<div class="col-md-9 py-2 wow fadeInUp" data-wow-delay="300ms">
      <div class=" p-1 px-4  mb-2" style="border-left:2px solid rgb(40, 80, 40) !important; list-style: none; color: rgb(124, 124, 124);">
        <li class="">Your Message Has Been Sent Sucessfully</li>
    </div>
        </div>';
    $res_err = '<div class="col-md-9 py-2 wow fadeInUp" data-wow-delay="300ms">
      <div class=" p-1 px-4  mb-2" style="border-left:2px solid rgb(126, 56, 44) !important; list-style: none; color: rgb(124, 124, 124);">
        <li class="">Something Went Wrong . Try Again </li>
    </div>
        </div>';
    ?>


    <form action='#' method='POST' id="create_acc_form" class="main-form">

      <div class="row mt-5 ">

        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <input type="text" class="form-control" name='name' style="text-transform:capitalize;"
            value="<?php echo $_SESSION['user_name']; ?>" readonly placeholder="Full name">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <input type="text" class="form-control" name='email' style="text-transform:capitalize;"
            value="<?php echo $_SESSION['user_email']; ?>" readonly placeholder="Email address..">
        </div>

        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" class="form-control" name='phone' style="text-transform:capitalize;"
            placeholder=" Phone Number..">
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <textarea name="message" id="message" class="form-control" style="text-transform:capitalize;" rows="6"
            placeholder="Enter message.."></textarea>
        </div>
      </div>
      <?php


      ?>
      <input type="submit" class="btn btn-primary mt-3 wow zoomIn" name="submit" value="Submit Request">

      <?php
      if(isset($u_id)) {
        if(isset($_POST["submit"])) {
          include 'config.php';
          $name = $_POST["name"];
          $email = $_POST["email"];
          $phone = $_POST["phone"];
          $msg = $_POST["message"];

          if($name != '' && $email != '' && $phone != '' && $msg != '') {
            $sql = "SELECT `email` FROM `contact` WHERE `email` = '$email' ";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) > 0) {
              $already_exist = true;
            } else {
              $sql1 = "INSERT INTO `contact`(`contact_id`, `name`, `email`, `phone`, `message`) VALUES (null,'$name','$email','$phone','$msg')";
              $q = mysqli_query($con, $sql1);
              if($q) {
                $reg_id = $_SESSION['$reg_id'];
                // echo'<script>window.location.assign("index.php?u_id='.$reg_id.'")</script>';
                $success = true;
                $error = false;
              }
              if(!$q) {
                $success = false;
                $error = true;
              }
            }
          } else {
            $fill_error = true;
            $success = false;
            $already_exist = false;
            $error = false;
          }


        }
      }

      ?>
      <script src="assets/js/sweetalert.min.js"></script>
      <?php
      error_reporting(0);
      if($success) {
        echo '<script>
              swal({
              title: "Your request has been sent successfully we will email you in 24 hours. Thank you! ",icon: "success",button: "ok!",
            });
            </script>';
      }
      if($already_exist) {
        echo '<script>
              swal({
              title: "Your request has already been sent successfully. Thank you! ",icon: "warning" ,button: "ok!",
            });
            </script>';
      }
      if($fill_error) {
        echo '<script>
              swal({
              title: "Fill out all the Fields",icon: "error",button: "ok!",
            });
            </script>';

      }
      if($error) {
        echo '<script>
              swal({
              title: "Your request was not sent. try Again ! ",icon: "error",button: "ok!",
            });
            </script>';
      }
      ?>
    </form>

  </div>
</div> <!-- .page-section -->

<div class="page-section banner-home bg-image" style="background-image: url(assets/img/banner-pattern.svg);">
  <div class="container py-5 py-lg-0">
    <div class="row align-items-center">
      <div class="col-lg-4 wow zoomIn">
        <div class="img-banner d-none d-lg-block">
          <img src="assets/img/mobile_app.png" alt="">
        </div>
      </div>
      <div class="col-lg-8 wow fadeInRight">
        <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
        <a href="#"><img src="assets/img/google_play.svg" alt=""></a>
        <a href="#" class="ml-2"><img src="assets/img/app_store.svg" alt=""></a>
      </div>
    </div>
  </div>
</div> <!-- .banner-home -->

<?php
include("main_footer.php");
?>
<?php
