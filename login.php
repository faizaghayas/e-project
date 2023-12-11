<?php
session_start();
if(isset($_SESSION["user_email"])) {
  if($_SESSION["user_role"] == 0) {
    echo '<script>window.location.assign("index.php");</script>';
  } elseif($_SESSION["user_role"] == 1) {
    echo '<script>window.location.assign("admin_main.php");</script>';
  } else {
    echo '<script>window.location.assign("hosp_panel_main.php");</script>';
  }
}
;
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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <style>
    .form-control:focus {
      color: #000 !important;
    }

    .form-control {
      color: #000 !important;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth "
          style="background-color:rgb(236, 236, 236);">
          <div class="card col-lg-4 mx-auto" style="background-color:rgba(255, 255, 255, 0.452);">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3" style="color:#5f5f5f;">Login</h3>
              <form method="POST">
                <div class="form-group">
                  <label style="color:#7e7d7d;">Email *</label>
                  <input type="text" class="form-control p_input inp" name="user_email"
                    style="background-color:rgba(179, 179, 179, 0.253); border: none; outline: none;">
                </div>
                <div class="form-group">
                  <label style="color:#7e7d7d;">Password *</label>
                  <div class="pass d-flex justify-content-between "
                    style=" width:100%; background-color:rgba(179, 179, 179, 0.253); border: none; outline: none; color:#000; ">
                    <input type="password" name="user_pass" class="py-2 px-2 inp" id="myPass"
                      style="background-color:transparent; border: none; outline: none; color:#000; ">
                    <span id="showPass"
                      style="background-color:transparent; border: none; outline: none; color:#000; margin-top:0.5rem; margin-right:0.8rem">
                      <b aria-hidden="true">Show</b>
                      <b aria-hidden="true" style="display:none;">hide</b>
                    </span>
                  </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check">
                    <label class="form-check-label" style="color:#7e7d7d;">
                      <input type="checkbox" class="form-check-input" style="color:#7e7d7d;"> Remember me </label>
                  </div>

                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn"
                    style="width: 80%; height: 100%; padding:0 0; " class="btn btn-primary "><input type="submit"
                      name="login" value="Login" class="btn btn-primary " id="bttn" style="width: 100%;  "></button>
                </div>

                <p class="sign-up" style="color:#7e7d7d;">Don't have an Account?<a href="register.php"> Sign Up</a></p>
              </form>
              <?php
              if(isset($_POST["login"])) {
                include 'config.php';
                $email = $_POST["user_email"];
                $password = md5($_POST["user_pass"]);
                if($email != '' && $password != '') {
                  $sql = "SELECT * FROM `user` WHERE `user_email` = '$email' AND `user_pass` = '$password'";
                  $result = mysqli_query($con, $sql);
                  if(mysqli_num_rows($result)) {
                    while($row = mysqli_fetch_assoc($result)) {
                      $_SESSION["user_name"] = $row['username'];
                      $_SESSION["user_email"] = $row['user_email'];
                      $_SESSION["user_id"] = $row['user_id'];
                      $_SESSION["user_role"] = $row['user_role'];
                      $_SESSION["user_img"] = $row['user_img'];
                      if($_SESSION["user_role"] == 0) {
                        echo '<script>window.location.assign("index.php?u_id='.$row['user_id'].'");</script>';
                      } else if($_SESSION["user_role"] == 1) {
                        echo '<script>window.location.assign("admin_main.php?u_id='.$row['user_id'].'");</script>';
                      } else if($_SESSION["user_role"] == 2) {
                        $sql2 = "SELECT * FROM `user` WHERE  `user_email` = '$email' AND `user_pass` = '$password'";
                        $result2 = mysqli_query($con, $sql2);
                        $res_data = mysqli_fetch_assoc($result2);
                        $u_id = $res_data["user_id"];
                        $hos_q = "SELECT * FROM `hospital` WHERE `user_id` = $u_id";
                        $hos_res = mysqli_query($con, $hos_q);
                        $hos_data = mysqli_fetch_assoc($hos_res);
                        $h_id = $hos_data['hospital_id'];
                        echo '<script>window.location.assign("hosp_panel_main.php?u_id='.$u_id.'&h_id='.$h_id.'");</script>';
                      }
                    }
                  } else {
                    $already_exist = true;
                    $fill_error = false;
                  }
                } else {
                  $already_exist = false;
                  $fill_error = true;
                }
              }
              ?>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->

  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#showPass").click(function () {
        if ($("#myPass").attr("type") == "password") {
          $("#myPass").attr("type", "text");
        } else {
          $("#myPass").attr("type", "password");
        }
      });
      $("#showPass").click(function () {
        $("#showPass b").toggle();
      });
    });
    var input = document.getElementById("myPass");

    input.addEventListener("keypress", function (event) {
      if (event.key === "Enter") {
        event.preventDefault();
        document.getElementById("bttn").click();
      }
    });
  </script>
  <script src="assets/js/sweetalert.min.js"></script>
  <?php
  error_reporting(0);
  if($already_exist) {
    echo '<script>
              swal({
              title: "Invalid Email or Password ! Please Try Again",icon: "warning" ,button: "ok!",
            })
            </script>';
  }
  if($fill_error) {
    echo '<script>
              swal({
              title: "Please Fill out all the Fields",icon: "error",button: "ok!",
            });
            </script>';
  }

  ?>
  <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>