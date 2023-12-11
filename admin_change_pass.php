<?php
include 'admin_nav.php';
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
            <h4 class="card-title">Change Password</h4>
            <form method="POST">
            <div class="form-row" >
               <div class="col-10 mt-5 ">
                <label>Current Password</label>
                <div class="pass d-flex justify-content-between" style="outline:none; border:1px solid #eeee;">
                        <input type="password" name="current_pass" class="py-2 px-2" id="myPass1" style="outline:none; color:#eee; background-color:transparent;border: none;" >
                        <span id="showPass1"
                          style=" border: none; border-left:1px solid #eeee ; outline: none; color:#000; padding-top:0.5rem; margin-right:0.8rem; padding-left:0.8rem;" >
                          <b aria-hidden="true" style="color:#eee;">Show</b>
                          <b aria-hidden="true" style="display:none; color:#eee;">hide</b>
                        </span>
                      </div>
               </div>
               <div class="col-10 pt-3">
                <label>New Password</label>
                <div class="pass d-flex justify-content-between" style="outline:none; border:1px solid #eeee;">
                        <input type="password" name="new_pass" class="py-2 px-2" id="myPass2" style="outline:none; color:#eee;  background-color:transparent; border: none;" >
                        <span id="showPass2"
                          style="background-color:transparent; border: none; border-left:1px solid #eeee ; outline: none; color:#000; padding-top:0.5rem; margin-right:0.8rem; padding-left:0.8rem;" >
                          <b aria-hidden="true" style="color:#eee;">Show</b>
                          <b aria-hidden="true" style="display:none; color:#eee;">hide</b>
                        </span>
                      </div>
               </div>
               <div class="col-10 pt-3 pb-3">
                <label>Confirm Password</label>
                <div class="pass d-flex justify-content-between" style="outline:none; border:1px solid #eeee;">
                        <input type="password" name="confirm_pass" class="py-2 px-2" id="myPass3" style="outline:none; color:#eee; background-color:transparent; border: none;" >
                        <span id="showPass3"
                          style="background-color:transparent; border: none; border-left:1px solid #eeee ; outline: none; color:#000; padding-top:0.5rem; margin-right:0.8rem; padding-left:0.8rem;" >
                          <b aria-hidden="true" style="color:#eee;">Show</b>
                          <b aria-hidden="true" style="display:none; color:#eee;">hide</b>
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
    </div>

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
                window.location = "admin_main.php?u_id=' . $u_id . '";
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
    <?php
    include 'admin_footer.php';
    ?>