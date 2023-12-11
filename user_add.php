<?php
 include "admin_nav.php";
 ?>
  <div class="main-panel" style="min-height:calc(120vh - 70px)">
 <div class="content-wrapper">
  <nav aria-label="breadcrumb">
                <!-- <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol> -->
                <?php 
                include "config.php";
                $u_id=$_GET['u_id'];

              ?>
              </nav>
              <div class="row">
              <div class="col-10 grid-margin mx-auto stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User</h4>
                    <form method="POST" enctype="multipart/form-data">
                    <div class="col-lg-12 d-flex m-2">
                      <div class="form-group m-2 w-100">
                        <label >Name</label>
                        <input type="text" class="form-control" name="name"  >
                      </div>
                      <div class="form-group m-2 w-100">
                        <label >Email</label>
                        <input type="email" class="form-control" name="email"   >
                      </div>
                      </div>
                      <div class="col-lg-12 d-flex m-2">
                      <div class="form-group m-2 w-100">
                      <label >Phone</label>
                        <input type="tel" class="form-control" name="phone"   >
                      </div>
                      <div class="form-group m-2 w-100">
                      <label >Password</label>
                        <input type="password" class="form-control" name="pass"   >
                      </div>
                      </div>
                     
                      <div class="col-lg-12 d-flex m-2">
                      <div class="form-group w-100  m-2">
                        <label ></label>
                        <input type="file" class="form-control" name="file">
                      </div>
                      </div>
                      
                      <input type="submit" value="Submit" name="submit" class="btn btn-primary me-2" >
                      <button class="btn btn-dark">Cancel</button>
                      <?php
                      if (isset($_POST["submit"])) {
                        include 'config.php';
                        include 'config.php';
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $phone = $_POST["phone"];
                        $password = md5($_POST["pass"]);
                        $file_name=$_FILES["file"]["name"]; 
                        $file_tmp=$_FILES["file"]["tmp_name"]; 
                        $path="C:/xampp/htdocs/one-health/images/".$file_name;
             
                        
                        // $sql = "SELECT `hospital_name` FROM `hospital` WHERE `hospital_name` = '{$name}' ";
                        // $result = mysqli_query($con, $sql);
                        // if (mysqli_num_rows($result) > 0) {
                        //   $already_exist=true;
                        //   $fill_error = false;
                        //       } else {
                            $sql1 = "INSERT INTO `user`(`user_id`, `username`, `user_email`, `user_phone`, `user_pass`, `user_img`) VALUES (null,'$name','$email','$phone','$password','$file_name')";
                            mysqli_query($con, $sql1);
                    echo '<script>window.location.assign("user.php?u_id='.$u_id.'");</script>';
    
                // }   
    
                      }
                //       ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
<?php
 include "admin_footer.php";
 ?>