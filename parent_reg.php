<?php
error_reporting(0);
session_start();
include 'config.php';
$reg_id = $_SESSION['$reg_id'];
$sql = "SELECT * FROM `parent` WHERE `user_id` = $reg_id ";
$check_qry = mysqli_query($con, $sql);
if(!isset($_SESSION["user_email"])) {
    echo '<script>window.location.assign("login.php");</script>';
}
if(mysqli_num_rows($check_qry) >= 1) {
    $already_exist = true;
    // echo '<script>window.location.assign("index.php?u_id=' . $reg_id . '");</script>';
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
            background-color: rgb(97, 179, 194);
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
            Parent Registration</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row" style="display: flex; justify-content: center; align-items: center;">
                <div class="col-5">
                    <label>Father/Guardian Name</label>
                    <input type="text" class="form-control" name="parent_name"
                        value='<?php echo $_SESSION['user_name'] ?>' style="text-transform:capitalize;" placeholder="">
                </div>
                <div class="col-5">
                    <label> Father/Guardian Email</label>
                    <input type="text" class="form-control" name="parent_email"
                        value='<?php echo $_SESSION['user_email'] ?>' placeholder="">
                </div>
                <div class="col-5">
                    <label> Father/Guardian Contact</label>
                    <input type="tel" class="form-control" name="parent_phone" style="text-transform:capitalize;"
                        placeholder="">
                </div>
                <div class="col-5">
                    <label>Father/Guardian CNIC</label>
                    <input type="text" class="form-control" name="parent_cnic" style="text-transform:capitalize;"
                        placeholder="">
                </div>
                <div class="col-5">
                    <label>Child Name</label>
                    <input type="text" class="form-control" name="child_name" style="text-transform:capitalize;"
                        placeholder="">
                </div>
                <div class="col-5">
                    <label>Appointment Day</label>
                    <input type="date" class="form-control" name="app_date" style="text-transform:capitalize;"
                        placeholder="">
                </div>

                <div class="col-5 my-3">
                    <label>Child Age</label>
                    <input type="number" class="form-control" name="child_age" style="text-transform:capitalize;"
                        placeholder="">
                </div>
                <div class="col-5 my-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="male">
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

                <?php
                // $ch = curl_init();
                // curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json");
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                // $result = curl_exec($ch);
                // $result = json_decode($result);
                
                // if ($result->status == 'success') {
                //     $user_city = $result->city;
                // }
                

                ?>
                <script>

                    const findState = () => {
                        const status = document.querySelector('.status');

                        const success = (position) => {
                            console.log(position);
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;
                            const geoApiUrl = `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude
                                }&longitude=${longitude}&localityLanguage=en`;

                            fetch(geoApiUrl)
                                .then(res => res.json())
                                .then(data => {
                                    status.textContent = data.locality;
                                })
                        }
                        const error = () => {
                            status.textContent = 'unable to find';
                        }
                        navigator.geolocation.getCurrentPosition(success, error)
                    }
                    document.querySelector('.find_state').addEventListener('click', findState);
                </script>
                <div class="col-md-5 form-group mt-3">
                    <label class="form-label">Hospital</label><br>
                    <select name="hospital" class="form-select form-control" id="hospital">
                        <option value="">Select hospital</option>

                    </select>
                </div>

                <div class="col-md-5 form-group mt-3 ">
                    <label class="form-label">Vaccine</label><br>
                    <select name="vaccine" class="form-select form-control" id="vaccine">
                        <option value="">Select vaccine</option>
                    </select>
                </div>
                <div class="col-10">
                    <label class="form-label">Child Picture</label><br>
                    <input type="file" name="file" id="">
                </div>
            </div>

            <div style="margin: 1rem 0;" class="col-11">
                <input type="submit" style=" margin: auto; width: 94%; background-color: #61b3c1; color: white; "
                    class="form-control" name="submit" placeholder=" ">
            </div>

    </div>
    </form>

    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    if(isset($_POST["submit"])) {
        $hos = $_POST["hospital"];

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
    

            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $path = "C:/xampp/htdocs/one-health/images/$file_name";
            move_uploaded_file($file_tmp, $path);


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
    </div>
    <br>
    <br>
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function () {

            function loadData(type, vacc_id) {
                $.ajax({
                    url: "save.php",
                    type: "POST",
                    data: { type: type, id: vacc_id },
                    success: function (data) {
                        if (type == "vacc_Data") {
                            $("#vaccine").html(data);
                        } else {
                            $("#hospital").append(data);
                        }
                    }

                })
            }
            loadData();
            $("#hospital").on("change", function () {
                var hospital = $("#hospital").val();
                loadData("vacc_Data", hospital)
            })
        })
    </script>
    <script src="assets/js/sweetalert.min.js"></script>
    <?php
    // error_reporting(0);
    if($success) {
        echo '<script>
              swal({
              title: "Your appointment request has been sent successfully we will email you in 24 hours. Thank you! ",icon: "success",button: "ok!",
            })
            .then(function() {
                window.location = "index.php?u_id='.$reg_id.'";
            });
            </script>';
    }
    if($already_exist) {
        echo '<script>
              swal({
              title: "Your appointment request has already been sent successfully! ",icon: "warning" ,button: "ok!",
            }).then(function() {
                window.location = "index.php?u_id='.$reg_id.'";
            });
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