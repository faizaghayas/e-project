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
        .col-10 .danger{
            color: red;
        }
    </style>
</head>

<body style="background-color: #eee !important;">

    <!-- Back to top button -->
    <div class="back-to-top"></div>

  
    <br>
    <br>
    
   <div class="container" style="width:40%">
 
  
    <div style="width: 100%; padding: 2rem 1rem; background-color: #ffff; border-radius: 1rem;" >
    <h1 class=" reg_hd"
        style="text-align: left; padding-left: 2rem; margin-bottom: 2rem; text-transform:uppercase; font-size: 1.7rem; color: #000000ad;">
     Change Password</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row" style="display: flex; justify-content: center; align-items: center;">
               <div class="col-10 mt-5 ">
                <label>Current Password</label>
                <div class="pass d-flex justify-content-between" style="outline:none; border:1px solid #eeee;">
                        <input type="password" name="current_pass" class="py-2 px-2" id="myPass1" style="outline:none; border: none;" >
                        <span id="showPass1"
                          style="background-color:transparent; border: none; border-left:1px solid #eeee ; outline: none; color:#000; padding-top:0.5rem; margin-right:0.8rem; padding-left:0.8rem;" >
                          <b aria-hidden="true">Show</b>
                          <b aria-hidden="true" style="display:none;">hide</b>
                        </span>
                      </div>
               </div>
               <div class="col-10 pt-3">
                <label>New Password</label>
                <div class="pass d-flex justify-content-between" style="outline:none; border:1px solid #eeee;">
                        <input type="password" name="new_pass" class="py-2 px-2" id="myPass2" style="outline:none; border: none;" >
                        <span id="showPass2"
                          style="background-color:transparent; border: none; border-left:1px solid #eeee ; outline: none; color:#000; padding-top:0.5rem; margin-right:0.8rem; padding-left:0.8rem;" >
                          <b aria-hidden="true">Show</b>
                          <b aria-hidden="true" style="display:none;">hide</b>
                        </span>
                      </div>
               </div>
               <div class="col-10 pt-3 pb-3">
                <label>Confirm Password</label>
                <div class="pass d-flex justify-content-between" style="outline:none; border:1px solid #eeee;">
                        <input type="password" name="confirm_pass" class="py-2 px-2" id="myPass3" style="outline:none; border: none;" >
                        <span id="showPass3"
                          style="background-color:transparent; border: none; border-left:1px solid #eeee ; outline: none; color:#000; padding-top:0.5rem; margin-right:0.8rem; padding-left:0.8rem;" >
                          <b aria-hidden="true">Show</b>
                          <b aria-hidden="true" style="display:none;">hide</b>
                        </span>
                      </div>
               </div>
              

            <div style="margin: 1rem 0;" class="col-11">
                <input type="submit" style=" margin: auto; width: 94%; background-color: #61b3c1; color: white; "
                    class="form-control" name="submit" placeholder=" ">
            </div>

    </div>
   
    
      <?php
      $u_id=$_GET['u_id'];
      if (isset($_POST["submit"])) {
        
        include 'config.php';
        $a=$_POST["current_pass"];
        $b=$_POST["new_pass"];
        $c=$_POST["confirm_pass"];
        $curr_pass =md5($_POST["current_pass"]);
        $n_pass =  md5($_POST["new_pass"]);
        $c_pass= md5($_POST["confirm_pass"]);
        if($a != "" && $b != "" && $c != "") {
     
        $sql = "SELECT `user_pass` FROM `user` WHERE `user_id` = $u_id ";
        $result = mysqli_query($con, $sql);
        $cuur_pass=mysqli_fetch_assoc($result);
       if($cuur_pass["user_pass"] == $curr_pass){
        if($n_pass === $c_pass){
            $sql1 = "UPDATE `user` SET `user_pass`='$c_pass' WHERE `user_id`= $u_id";
            mysqli_query($con, $sql1);
           $success=true;
        }else{
            $already_exist=true;
            $error=false;
        }
       }
    }else{
        $fill_error=true;
        $error=false;
        $success=false;
        $already_exist=false;
    }
      

   
    // echo '<script>window.location.assign("main_settings.php?u_id='.$u_id.'");</script>';

  

    
    }
      ?>
       </form>
    </div>
</div>
    <br>
    <br>

    <script src="assets/js/jquery-3.5.1.min.js"></script>
                <script>
                  $(document).ready(function () {
                    $("#showPass1").click(function () {
                      if ($("#myPass1").attr("type") == "password") {
                        $("#myPass1").attr("type", "text");
                      } else {
                        $("#myPass1").attr("type", "password");
                      }
                    });
                    $("#showPass1").click(function () {
                      $("#showPass1 b").toggle();
                    });
                    $("#showPass2").click(function () {
                      if ($("#myPass2").attr("type") == "password") {
                        $("#myPass2").attr("type", "text");
                      } else {
                        $("#myPass2").attr("type", "password");
                      }
                    });
                    $("#showPass2").click(function () {
                      $("#showPass2 b").toggle();
                    });
                    $("#showPass3").click(function () {
                      if ($("#myPass3").attr("type") == "password") {
                        $("#myPass3").attr("type", "text");
                      } else {
                        $("#myPass3").attr("type", "password");
                      }
                    });
                    $("#showPass3").click(function () {
                      $("#showPass3 b").toggle();
                    });
                  });
                </script>
    <script src="assets/js/sweetalert.min.js"></script>
    <?php
    error_reporting(0);
    if ($success) {
        echo '<script>
              swal({
              title: "Your Password Has Been Changed! ",icon: "success",button: "ok!",
            })
            .then(function() {
                window.location = "index.php?u_id=' . $u_id . '";
            });
            </script>';
    }
    if ($already_exist) {
        echo '<script>
              swal({
              title: "password does not match!",icon: "warning" ,button: "ok!",
            })
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
              title: "Your appointment request was not sent. try Again ! ",icon: "error",button: "ok!",
            });
            </script>';
    }

    ?>