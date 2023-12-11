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
                    <h4 class="card-title">Hospitals</h4>
                    <p class="card-description"> Edit Hospital Detail</p>
                    <form method="POST" enctype="multipart/form-data">
                    <div class="col-lg-12 d-flex m-2">
                      <div class="form-group m-2 w-100">
                        <label >Hospital Name</label>
                        <input type="text" class="form-control" name="name"  >
                      </div>
                      <div class="form-group m-2 w-100">
                        <label >Hospital Email</label>
                        <input type="email" class="form-control" name="email"   >
                      </div>
                      </div>
                      <div class="col-lg-12 d-flex m-2">
                      <div class="form-group m-2 w-100">
                        <label>Manager Name</label>
                        <input type="text" class="form-control" name="manager_name" >
                      </div>
                      <div class="form-group m-2 w-100">
                        <label >Manager CNIC</label>
                        <input type="text" class="form-control" name="manager_cnic"   >
                      </div>
                      </div>
                      <div class="col-lg-12 d-flex m-2">
                      <div class="form-group m-2 w-100">
                        <label >Location</label>
                        <input type="text" class="form-control" name="location"  >
                      </div>
                      <div class="form-group m-2 w-100">
                        <label >Phone</label>
                        <input type="tel" class="form-control" name="phone"   >
                      </div>
                      </div>
                      <div class="col-lg-12 d-flex m-2">
                      <div class="form-group m-2 w-100">
                        <label >Open Time</label>
                        <input type="time" class="form-control" name="op_time"  >
                      </div>
                      <div class="form-group m-2 w-100">
                        <label >Close Time</label>
                        <input type="time" class="form-control" name="clo_time"  >
                      </div>
                      </div>
                      <div class="col-lg-12 d-flex m-2">
                      <div class="form-group w-100  m-2">
                        <label ></label>
                        <input type="file" class="form-control" name="fileimg">
                      </div>
                      </div>
                      
                      <input type="submit" value="Submit" name="submit" class="btn btn-primary me-2" >
                      <button class="btn btn-dark">Cancel</button>
                      <?php
                      if (isset($_POST["submit"])) {
                        include 'config.php';
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $phone = $_POST["phone"];
                        $manager_name =$_POST["manager_name"];
                        $manager_cnic = $_POST["manager_cnic"];
                        $location = $_POST["location"];
                        $op_time = $_POST["op_time"];
                        $clo_time = $_POST["clo_time"];
                        $file_name=$_FILES["fileimg"]["name"]; 
                        $file_tmp=$_FILES["fileimg"]["tmp_name"]; 
                        $path="C:/xampp/htdocs/one-health/images/".$file_name;
                        move_uploaded_file($file_tmp,$path);
            $created=date("Y-m-d");
            $user_id=$_SESSION["user_id"];
            $pass=md5($_POST["pass"]);
             
                        
                        // $sql = "SELECT `hospital_name` FROM `hospital` WHERE `hospital_name` = '{$name}' ";
                        // $result = mysqli_query($con, $sql);
                        // if (mysqli_num_rows($result) > 0) {
                        //   $already_exist=true;
                        //   $fill_error = false;
                        //       } else {
                            $sql1 = "INSERT INTO `hospital`(`hospital_id`, `hospital_name`, `hospital_email`, `hospital_contact`, `hospital_manager`, `manager_cnic`, `hospital_location`, `hospital_img`, `hospital_op_time`, `hospital_close_time`,`pass`, `user_id`, `Created_at`) VALUES (null , '$name','$email','$phone','$manager_name','$manager_cnic','$location','$file_name' ,'$op_time' ,'$clo_time' ,'$pass', $user_id , '$created' )";
                            mysqli_query($con, $sql1);
                    echo '<script>window.location.assign("hospitals.php?u_id='.$u_id.'");</script>';
    
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