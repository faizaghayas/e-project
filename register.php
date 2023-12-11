<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Corona Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  
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
  </style>
</head>

<body style="background-color: #eee !important; ">

  <div class="container my-3" style="width:600px;">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-lg-6 col-xl-11">
        <div class="card " style="color:#5f5f5f; background-color:rgba(255, 255, 255, 0.452);">
          <div class="card-body p-md-5">
            <div class="row justify-content-center w-100">
              <div class="col-md-12 col-lg-12 col-xl-5 order-2 order-lg-1" style=" width: 100%;">

                <h3 class="card-title text-left mb-4 " style=" margin-left:2.5rem; color:#5f5f5f;">Sign Up</h3>


                <form class="mx-1 mx-md-4" method="POST" enctype="multipart/form-data">

                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="username"
                        style="background-color:rgba(179, 179, 179, 0.253); border: none; outline: none;color:#000; " />
                      <label class="form-label" for="form3Example1c">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" pattern=".+@gmail\.com" class="form-control" name="user_email"
                        style=" color:#000; background-color:rgba(179, 179, 179, 0.253); border: none; outline: none;" />
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="tel" id="form3Example4c" class="form-control" name="user_phone"
                        style="background-color:rgba(179, 179, 179, 0.253); border: none; outline: none; color:#000; " />
                      <label class="form-label" for="form3Example4c">Phone</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0 ">
                      <div class="pass d-flex justify-content-between "
                        style=" width:100%; background-color:rgba(179, 179, 179, 0.253); border: none; outline: none; color:#000; ">
                        <input type="password" name="user_pass" class="py-2 px-2"  id="myPass"
                          style="background-color:transparent; border: none; outline: none; color:#000; ">
                        <span id="showPass"
                          style="background-color:transparent; border: none; outline: none; color:#000; margin-top:0.5rem; margin-right:0.8rem">
                          <b aria-hidden="true">Show</b>
                          <b aria-hidden="true" style="display:none;">hide</b>
                        </span>
                      </div>
                      <label class="form-label" for="form3Example4cd">Password</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-3">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="file" id="form3Example4cd" class="form-control" name="file"
                        style="background-color:rgba(179, 179, 179, 0.253); border: none; outline: none; color:#000; " />
                      <label class="form-label" for="form3Example4cd">Profile Image</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-3">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-block enter-btn"
                      style="width: 80%; height: 100%; padding:0 0; " class="btn btn-primary "><input type="submit"
                        name="submit" value="Register" class="btn btn-primary " style="width: 100%;  "></button>
                  </div>

                  <?php
                  if(isset($_POST["submit"])) {
                    include 'config.php';
                    $name = $_POST["username"];
                    $email = $_POST["user_email"];
                    $phone = $_POST["user_phone"];
                    $password = md5($_POST["user_pass"]);
                    $file_name=$_FILES["file"]["name"]; 
                    $file_tmp=$_FILES["file"]["tmp_name"]; 
                    $path="C:/xampp/htdocs/one-health/images/".$file_name;
                    move_uploaded_file($file_tmp,$path);
                    if($name != "" && $email != "" && $phone != "" && $password != "" && $file_name != "") {
                      $sql = "SELECT `username`, `user_email` FROM `user` WHERE `username` = '{$name}' AND `user_email` = '{$email}' ";
                      $result = mysqli_query($con, $sql);
                      if(mysqli_num_rows($result) > 0) {
                        $already_exist = true;
                        $fill_error = false;
                      } else {
                        $sql1 = "INSERT INTO `user`(`user_id`, `username`, `user_email`, `user_phone`, `user_pass`, `user_img`) VALUES (null,'$name','$email','$phone','$password','$file_name')";
                        $q = mysqli_query($con, $sql1);
                        if($q) {
                          $success = true;
                          $already_exist = false;
                          $error = false;
                        }
                        if(!$q) {
                          $error = true;
                          $success = false;
                          $already_exist = false;
                        }


                      }
                    } else {
                      $already_exist = false;
                      $fill_error = true;

                    }

                  }
                  ?>
                </form>
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
                </script>
                <script src="assets/js/sweetalert.min.js"></script>
                <?php
                error_reporting(0);
                if($success) {
                  echo '<script>
              swal({
              title: "Success ! Please Login. ",icon: "success" ,button: "ok!",
            }).then(function() {
              window.location = "login.php";
          });
            </script>';
                }
                if($already_exist) {
                  echo '<script>
              swal({
              title: "Already Registered! Please Try Another name",icon: "warning" ,button: "ok!",
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
                if($error) {
                  echo '<script>
              swal({
              title: "Somethings Wrong. Please try Again in a while ! ",icon: "error",button: "ok!",
            });
            </script>';
                }

                ?>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>