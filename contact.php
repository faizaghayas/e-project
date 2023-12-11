<?php
error_reporting(0);
session_start();
if (!isset($_SESSION["user_email"])) {
    echo '<script>window.location.assign("login.php");</script>';
}
;
include "main_header.php";
?>


 <!-- <script>
        $(document).ready(function(){
            $("form").submit(function(e){
                e.preventDefault(); // Prevent the default form submission

                // Perform AJAX request to process the form
                $.ajax({
                    type: "POST",
                    url: "contact.php",
                    data: $(this).serialize(),
                    success: function(response){
                        $("#message-top").html("good"); // Update the message div with the response
                    } 
                });
            });
        });
    </script> -->
  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Contact</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Get in Touch</h1>

      <form method="POST" class="contact-form mt-5" id='form'>
        <div class="row mb-3">

        <div class="col-lg-12 col-sm-6 py-2 wow fadeInLeft">
        <div id="message-top"></div>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" name='name'  style="text-transform:capitalize;" value="<?php echo $_SESSION['user_name'];?>" readonly placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" class="form-control"  name='email' style="text-transform:capitalize;"  value="<?php echo $_SESSION['user_email'];?>" readonly placeholder="Email address..">
          </div>
        
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" class="form-control"  name='phone'  style="text-transform:capitalize;" placeholder=" Phone Number..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message"  class="form-control" style="text-transform:capitalize;" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>
        <input type="submit" class="btn btn-primary mt-3 wow zoomIn" name="submit" value="Submit Request">

        </div>
        
       

        <?php
          
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;
            require 'phpmailer/src/Exception.php';
            require 'phpmailer/src/PHPMailer.php';
            require 'phpmailer/src/SMTP.php';
            if (isset($_POST["submit"])) {

            include 'config.php';
                $name = $_POST["name"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $msg = $_POST["message"];
                
                $mail=new PHPMailer(true);  
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "faizaghayas16@gmail.com";
                $mail->Password ="fohlaivlpzhtjmvw";
                $mail->SMTPSecure = 'ssl';
                $mail->Port= 465 ;

                $mail->setFrom('faizaghayas16@gmail.com');
                $mail->addAddress($_POST["email"]);
                $mail->isHTML(true);
                $mail->Subject = "";
                $mail->Body = $_POST["message"];
                $mail->send();

                if($name != '' && $email != '' && $phone != '' && $msg != '' ){
                  $sql = "SELECT `email` FROM `contact` WHERE `email` = '$email' ";
            $result = mysqli_query($con,$sql);
            if (mysqli_num_rows($result) > 0) {
              $already_exist=true;
            } else{
                $sql1="INSERT INTO `contact`(`contact_id`, `name`, `email`, `phone`, `message`) VALUES (null,'$name','$email','$phone','$msg')";
                $q=mysqli_query($con,$sql1);
                    if($q){  
                      $reg_id=$_SESSION['$reg_id'];
                      $success=true;
                      $error=false;
                      }
                      if(!$q){
                        $success=false;
                        $error=true;
                      }
                    }
                    }else{
                      $fill_error=true;
                      $success=false;
                      $already_exist=false;
                      $error=false;
                    }
                   
              }?>
      </form>
    
      <?php
// if(isset($_SESSION['status']) && $_SESSION['status'] !='') {
 
//  echo $_SESSION['status'];
  
//   unset($_SESSION['status']);
//   session_destroy();
// }
?>
    </div>
  </div>

  <div class="maps-container wow fadeInUp">
    <div id="google-maps"></div>
  </div>

  <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="../assets/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->
  <?php
  include 'main_footer';
  ?>
    <script src="assets/js/sweetalert.min.js"></script>
      <?php
            error_reporting(0);
            if($success){
              echo '<script>
              swal({
              title: "Your request has been sent successfully we will email you in 24 hours. Thank you! ",icon: "success",button: "ok!",
            }).then(function() {
              window.location = "index.php?u_id='.$reg_id.'";
          });
            </script>';
            }
            if($already_exist){
              echo '<script>
              swal({
              title: "Your request has already been sent successfully . Thank you! ",icon: "warning" ,button: "ok!",
            }).then(function() {
              window.location = "index.php?u_id='.$reg_id.'";
          });
            </script>';
            }
            if($fill_error){
              echo '<script>
              swal({
              title: "Fill out all the Fields",icon: "error",button: "ok!",
            });
            </script>';

            }
            if($error){
              echo '<script>
              swal({
              title: "Your request was not sent. try Again ! ",icon: "error",button: "ok!",
            });
            </script>';
            }
            ?>