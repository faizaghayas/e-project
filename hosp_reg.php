<?php
session_start();
include 'config.php';
$reg_id=$_SESSION['$reg_id'];
$sql="SELECT * FROM `hospital` WHERE `user_id` = $reg_id ";
$check_qry=mysqli_query($con,$sql);
$sql2="SELECT * FROM `parent` WHERE `user_id` = $reg_id ";
$check_qry2=mysqli_query($con,$sql2);
if(!isset($_SESSION["user_email"])){
    echo'<script>window.location.assign("login.php");</script>';
}
if(mysqli_num_rows($check_qry)>= 1 || mysqli_num_rows($check_qry2) >= 1){
    echo '<script>window.location.assign("index.php?u_id='.$reg_id.'");</script>';
}
;
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

    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .col-5 {
            margin: 0.5rem 0.8rem;
        }

        input {
            width: 80%;
        }

        * {
            font-family: 'Poppins', sans-serif;
            ;

        }

        .reg_hd {
            display: flex;
        }

        .reg_hd::before {
            content: "";
            width: 4px;
            height: 2.1rem;
            margin-top: 0rem;
            margin-right: 0.8rem;
            background-color: #61b3c1;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border: 1px solid #61b3c1;
            outline: 0;
            box-shadow: 0 0 0 0rem #61b3c1;
        }
    </style>
</head>

<body style="background-color: #eee !important;">

    <!-- Back to top button -->
    <div class="back-to-top"></div>

  
    <br>
    <br>

    <div style="width: 70%; padding: 2rem 1rem; background-color: #ffff; border-radius: 1rem;" class="container">
        <h1 class=" reg_hd"
            style="text-align: left; padding-left: 4rem; margin-bottom: 2rem; text-transform:uppercase; font-size: 1.7rem; color: #000000ad;">
            Hospital Registration</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-row" style="display: flex; justify-content: center; align-items: center;">
                <div class="col-5">
                    <label>Hospital Name</label>
                    <input type="text" class="form-control" name="name" style="text-transform:capitalize;" placeholder="">
                </div>
                <div class="col-5">
                    <label>Official Email</label>
                    <input type="text" class="form-control" name="email" style="text-transform:capitalize;" placeholder="">
                </div>
                <div class="col-5">
                    <label>Hospital Contact</label>
                    <input type="tel" class="form-control" name="phone" style="text-transform:capitalize;" placeholder="">
                </div>
                <div class="col-5">
                    <label>Manager Name</label>
                    <input type="text" class="form-control" name="manger_name" style="text-transform:capitalize;" value='<?php echo $_SESSION['user_name']?>'placeholder="">
                </div>
                <div class="col-5">
                    <label>Manager CNIC</label>
                    <input type="text" class="form-control" name="manager_cnic" style="text-transform:capitalize;" placeholder="">
                </div>
                <div class="col-5">
                    <label>Location</label>
                    <input type="text" class="form-control" name="location" style="text-transform:capitalize;" placeholder="">
                </div>
                <div class="col-5">
                    <label>Open Time</label>
                    <input type="time" class="form-control" name="op_time" style="text-transform:capitalize;" placeholder=" ">
                </div>
                <div class="col-5">
                    <label>Close Time</label>
                    <input type="time" class="form-control" name="clo_time" style="text-transform:capitalize;" placeholder=" ">
                </div>
                <div class="col-5">
                    <label>Hospital Image</label>
                    <input type="file"  name="fileimg" class="form-control"  placeholder=" ">
                </div>
                <div class="col-5">
                    <label>Password</label>
                    <input type="password"  name="pass" class="form-control"  placeholder=" ">
                </div>
                <div style="margin: 1rem 0;" class="col-11">
                    <input type="submit" style=" margin: auto; width: 94%; background-color: #61b3c1; color: white; "
                        class="form-control" name="submit" placeholder=" ">
                </div>

            </div>
        </form>
        <?php
       

            // use PHPMailer\PHPMailer\PHPMailer;
            // use PHPMailer\PHPMailer\Exception;
        
            // require 'phpmailer/src/Exception.php';
            // require 'phpmailer/src/PHPMailer.php';
            // require 'phpmailer/src/SMTP.php';
            if (isset($_POST["submit"])) {
        
                include 'config.php';
                $name = $_POST["name"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $manager_name = $_POST["manger_name"];
                $manager_cnic = $_POST["manager_cnic"];
                $location = $_POST["location"];
                $op_time = $_POST["op_time"];
                $clo_time = $_POST["clo_time"];
                $file_name=$_FILES["fileimg"]["name"]; 
                $file_tmp=$_FILES["fileimg"]["tmp_name"]; 
                $path="C:/xampp/htdocs/one-health/images/".$file_name;
                move_uploaded_file($file_tmp,$path);
                $user_id=$_SESSION["user_id"];
                $pass=md5($_POST["pass"]);
               
    
        
            //     $mail = new PHPMailer(true);
            //     $mail->isSMTP();
            //     $mail->Host = "smtp.gmail.com";
            //     $mail->SMTPAuth = true;
            //     $mail->Username = "faizaghayas16@gmail.com";
            //     $mail->Password = "fohlaivlpzhtjmvw";
            //     $mail->SMTPSecure = 'ssl';
            //     $mail->Port = 465;
        
            //     $mail->setFrom('faizaghayas16@gmail.com','E-vaccine');
            //     $mail->addAddress($email);
            //     $mail->isHTML(true);
            //     $mail->Subject = "Hospital Report";
            //     $mail->Body = "<div>
            //     <h4>Your Request is send. We will inform you in 24 hours.</h5>
            //     <table align='left'>
            //     <tr>
            //       <th>Hospital Name:</th>
            //       <td>$name</td>
            //     </tr>
            //     <tr>
            //     <th>Official Email:</th>
            //       <td>$email</td>
            //     </tr>
            //     <tr>
            //     <th>Phone:</th>
            //     <td>$phone</td>
            //   </tr>
            //     <tr>
            //     <th>Manager_name:</th>
            //       <td>$manager_name </td>
            //     </tr>
            //     <tr>
            //     <th>Manager_CNIC:</th>
            //       <td>$manager_cnic</td>
            //     </tr> 
            //     <tr>
            //     <th>Location:</th>
            //       <td>$location</td>
            //     </tr>
            //     <tr>
            //     <th>Open Time</th>
            //       <td>$op_time</td>
            //     </tr>
            //     <tr>
            //     <th>Close Time</th>
            //     <td>$clo_time</td>
            //   </tr>
             
            //   </table>
            //    </div>";
            $created=date("Y-m-d");
        if ($name != '' && $email != '' && $phone != '' && $manager_name != '' && $manager_cnic != '' && $location != '' && $op_time != '' && $clo_time != '' && $pass != '' && $file_name != '') {
        
            $sql = "SELECT `hospital_name` FROM `hospital` WHERE `hospital_name` = '{$name}' ";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                $already_exist = true;
                $error = false;
            } else {
                $reg_id=$_SESSION['$reg_id'];
                $sql1 = "INSERT INTO `hospital`(`hospital_id`, `hospital_name`, `hospital_email`, `hospital_contact`, `hospital_manager`, `manager_cnic`, `hospital_location`, `hospital_img`, `hospital_op_time`, `hospital_close_time`,`pass`, `user_id`, `Created_at`) VALUES (null , '$name','$email','$phone','$manager_name','$manager_cnic','$location','$file_name' ,'$op_time' ,'$clo_time' ,'$pass', $user_id , '$created' )";
                $q=mysqli_query($con, $sql1);
            // $mail->send();
                if($q){
                    $success = true;
                    $error = false;
                }
                if(!$q){
                    $success = false;
                    $error = true;
                }

            }
        } else {
            $fill_error=true;
            $success=false;
            $already_exist = false;
            $error = false;
        }
        }
        ?>
    </div>
    <br>
    <br>
    
    <script src="assets/js/sweetalert.min.js"></script>
    <?php
    error_reporting(0);
    if ($success) {
        echo '<script>
              swal({
              title: "Your request has been sent successfully we will email you in 24 hours. Thank you! ",icon: "success",button: "ok!",
            }).then(function() {
                window.location = "index.php?u_id=' . $reg_id . '";
            });
            </script>';
    }
    if ($already_exist) {
        echo '<script>
              swal({
              title: "Your request has already been sent successfully. Thank you! ",icon: "warning" ,button: "ok!",
            }).then(function() {
                window.location = "index.php?u_id=' . $reg_id . '";
            });
            </script>';
    }
    if ($fill_error) {
        echo '<script>
              swal({
              title: "Fill out all the Fields",icon: "error",button: "ok",
            })
            </script>';
    }
    if ($error) {
        echo '<script>
              swal({
              title: "Your request was not sent. try Again ! ",icon: "error",button: "ok!",
            });
            </script>';
    }
    ?>