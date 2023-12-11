<?php
include 'hosp_panel_head.php';
?>
<div class="main-panel" style="min-height:calc(120vh - 70px)">
  <div class="content-wrapper">
    <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav> -->
    <div class="row">
      <div class="col-5 grid-margin mx-auto stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Basic form elements</h4>
            <p class="card-description"> Basic form elements </p>
            <form method="POST" class="forms-sample" enctype="multipart/form-data">
              <div class="col-12 mt-4">
                <label>Father/Guardian Name</label>
                <input type="text" class="form-control" name="parent_name" style="text-transform:capitalize;"
                  placeholder="">
              </div>
              <div class="col-12 mt-4">
                <label> Father/Guardian Email</label>
                <input type="text" class="form-control" name="parent_email" placeholder="">
              </div>
              <div class="col-12 mt-4">
                <label> Father/Guardian Contact</label>
                <input type="tel" class="form-control" name="parent_phone" style="text-transform:capitalize;"
                  placeholder="">
              </div>
              <div class="col-12 mt-4">
                <label>Father/Guardian CNIC</label>
                <input type="text" class="form-control" name="parent_cnic" style="text-transform:capitalize;"
                  placeholder="">
              </div>
              <div class="col-12 mt-4">
                <label>Child Name</label>
                <input type="text" class="form-control" name="child_name" style="text-transform:capitalize;"
                  placeholder="">
              </div>
              <div class="col-12 mt-4">
                <label>Appointment Day</label>
                <input type="date" class="form-control" name="app_date" style="text-transform:capitalize;"
                  placeholder="">
              </div>

              <div class="col-12 mt-4 my-3">
                <label>Child Age</label>
                <input type="number" class="form-control" name="child_age" style="text-transform:capitalize;"
                  placeholder="">
              </div>
              <div class="col-12 mt-4 my-3">
              <label>Child Gender</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male">
                  <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                    value="female">
                  <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                    value="other">
                  <label class="form-check-label" for="inlineRadio3">Other</label>
                </div>
              </div>



              <div class="col-12  form-group mt-4">
                <label class="form-label">Hospital</label><br>
                <select name="hospital" class="form-select form-control" id="hospital">
                  <option value="">Select hospital</option>
                  <?php
                  $u_id = $_GET['u_id'];
                  $sql = "SELECT * FROM `hospital` WHERE `user_id` = $u_id";
                  $hos_qry = mysqli_query($con, $sql);
                  $hos_data = mysqli_fetch_assoc($hos_qry);
                  echo '<option selected value="'.$hos_data['hospital_id'].'">'.$hos_data['hospital_name'].'</option>';


                  ?>
                </select>
              </div>

              <div class="col-12 form-group mt-4 ">
                <label class="form-label">Vaccine</label><br>
                <select name="vaccine" class="form-select form-control" id="vaccine">
                  <option value="">Select vaccine</option>
                  <?php 
                  $h_id = $_GET['h_id'];
                  $sql = "SELECT * FROM `vaccine` WHERE `hospital_id` = $h_id";
                  $vacc_qry = mysqli_query($con, $sql);
                  while($vacc_data = mysqli_fetch_assoc($vacc_qry)){
                  echo '<option  value="'.$vacc_data['vaccine_id'].'">'.$vacc_data['vaccine_name'].'</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="col-12 mt-4">
                <label class="form-label">Child Picture</label><br>
                <input type="file" name="file" id="">
              </div>
          </div>

          <div style="margin: 1rem 0;" class="col-12">
            <input type="submit" style=" margin: auto; width: 94%; background-color: #61b3c1; color: white; "
              class="form-control" name="submit" placeholder=" ">
          </div>
          </form>
        </div>
    </div>
    </div>

        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;


        if(isset($_POST["submit"])) {

          require 'phpmailer/src/Exception.php';
          require 'phpmailer/src/PHPMailer.php';
          require 'phpmailer/src/SMTP.php';
          if(isset($_POST["submit"])) {

            include 'config.php';
            $p_name = $_POST["parent_name"];
            $p_email = $_POST["parent_email"];
            $p_phone = $_POST["parent_phone"];
            $child_name = $_POST["child_name"];
            $child_age = $_POST["child_age"];
            $p_cnic = $_POST["parent_cnic"];
            $appo_date = $_POST["app_date"];
            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $path = "C:/xampp/htdocs/one-health/images/$file_name";
            move_uploaded_file($file_tmp, $path);

            $hospital = $_POST["hospital"];
            $hos = "SELECT * FROM `hospital` WHERE `hospital_id` = '$hospital'";
            $hos_q = mysqli_query($con, $hos);
            $hos_d = mysqli_fetch_assoc($hos_q);
            $hos_val = $hos_d['hospital_name'];

            $vaccine = $_POST["vaccine"];
            $radioval = $_POST["inlineRadioOptions"];
            $user_id = $_SESSION["user_id"];

            $vac_quan = "SELECT * FROM `vaccine` WHERE `vaccine_id` = '$vaccine'";
            $vac_Q = mysqli_query($con, $vac_quan);
            $vacc_data = mysqli_fetch_assoc($vac_Q);
            $vacc_val = $vacc_data["vaccine_name"];

          


            //     $mail = new PHPMailer(true);
            //     $mail->isSMTP();
            //     $mail->Host = "smtp.gmail.com";
            //     $mail->SMTPAuth = true;
            //     $mail->Username = "faizaghayas16@gmail.com";
            //     $mail->Password = "fohlaivlpzhtjmvw";
            //     $mail->SMTPSecure = 'ssl';
            //     $mail->Port = 465;
        
            //     $mail->setFrom('faizaghayas16@gmail.com','E-vaccine');
            //     $mail->addAddress($p_email);
            //     $mail->isHTML(true);
            //     $mail->Subject = "Appointment Report";
            //     $mail->Body = "<div>
            //     <h4>Your Request is send to hospital. We will inform you in 24 hours.</h5>
            //     <table>
            //     <tr>
            //       <th>Parent Name:</th>
            //       <td>$p_name</td>
            //     </tr>
            //     <tr>
            //     <th>Child Name:</th>
            //       <td>$child_name</td>
            //     </tr>
            //     <tr>
            //     <th>Child Age:</th>
            //       <td>$child_age</td>
            //     </tr>
            //     <tr>
            //     <th>Child Gender:</th>
            //       <td>$radioval</td>
            //     </tr> 
            //     <tr>
            //     <th>CNIC:</th>
            //       <td>$p_cnic</td>
            //     </tr>
            //     <tr>
            //     <th>Appointment Day:</th>
            //       <td>$appo_date</td>
            //     </tr>
            //     <tr>
            //     <th>Hospital:</th>
            //     <td>$hos_val</td>
            //   </tr>
            //   <tr>
            //   <th>Vaccine:</th>
            //   <td>$vacc_val</td>
            // </tr>
            //   </table>
            //    </div>";
        

           
            if($p_name != '' && $p_email != '' && $p_phone != '' && $child_name != '' && $child_age != '' && $p_cnic != '' && $appo_date != '' && $hospital != '' && $vaccine != '' && $radioval != '' && $file_name != '') {
              $sql = "SELECT `parent_email` FROM `parent` WHERE `parent_email` = '$email' ";
              $result = mysqli_query($con, $sql);

              // $mail->send();
        
              if(mysqli_num_rows($result) > 0) {
                $already_exist = true;
              } else {
                $sql1 = "INSERT INTO `parent`(`parent_id`, `parent_name`, `parent_email`, `parent_phone`, `child_name`, `child_age`, `child_gender`, `child_img`, `parent_CNIC`, `appoint_day`, `parent_hosp`, `parent_vacc`, `user_id`) VALUES (null , '$p_name','$p_email','$p_phone','$child_name','$child_age','$radioval','$file_name','$p_cnic', '$appo_date' ,'$hospital' , '$vaccine','$user_id')";
                $q = mysqli_query($con, $sql1);

                if($q) {
                  $reg_id = $_SESSION['$reg_id'];
                  // echo '<script>window.location.assign("index.php?u_id='.$reg_id.'");</script>';
                  $success = true;
                  $error = false;

                }
                if(!$q) {
                  $reg_id = $_SESSION['$reg_id'];
                  $success = false;
                  $error = true;

                }
              }

            } else {
              $fill_error = true;
              $success = false;
              $already_exist = false;
              $error = false;
              // header('location: index.php?u_id=$reg_id');
            }
          }
        }
        ?>
      <br>
      <br>

      <script src="assets/js/sweetalert.min.js"></script>
      <?php
      error_reporting(0);
      if($success) {
        echo '<script>
              swal({
              title: "Your appointment request has been sent successfully we will email you in 24 hours. Thank you! ",icon: "success",button: "ok!",
            })
            .then(function() {
                window.location = "hosp_pat_detail.php?u_id='.$reg_id.'h_id='.$_id.'";
            });
            </script>';
      }
      if($already_exist) {
        echo '<script>
              swal({
              title: "Your appointment request has already been sent successfully! ",icon: "warning" ,button: "ok!",
            })
            </script>';
      }
      if($fill_error) {
        echo '<script>
              swal({
              title: "Fill out all the Fields",icon: "error",button: "ok",
            })
            </script>';




      }
      if($error) {
        echo '<script>
              swal({
              title: "Your appointment request was not sent. try Again ! ",icon: "error",button: "ok!",
            });
            </script>';
      }

      ?>
    <?php
    include 'hosp_panel_footer.php';
    ?>