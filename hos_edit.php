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
                $ed_id=$_GET['ed_id'];
                $u_id=$_GET['u_id'];

                $val_sql="SELECT * FROM `hospital` WHERE hospital_id = $ed_id ";
                $val_q=mysqli_query($con,$val_sql);
                $val_data=mysqli_fetch_assoc($val_q);
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
                        <input type="text" class="form-control" name="name"  value="<?php echo $val_data['hospital_name']?>" >
                      </div>
                      <div class="form-group m-2 w-100">
                        <label >Hospital Email</label>
                        <input type="email" class="form-control" name="email"  value="<?php echo $val_data['hospital_email']?>" >
                      </div>
                      </div>
                      <div class="col-lg-12 d-flex m-2">
                      <div class="form-group m-2 w-100">
                        <label>Manager Name</label>
                        <input type="text" class="form-control" name="manager_name" value="<?php echo $val_data['hospital_manager']?>">
                      </div>
                      <div class="form-group m-2 w-100">
                        <label >Manager CNIC</label>
                        <input type="text" class="form-control" name="manager_cnic"  value="<?php echo $val_data['manager_cnic']?>" >
                      </div>
                      </div>
                      <div class="col-lg-12 d-flex m-2">
                      <div class="form-group m-2 w-100">
                        <label >Location</label>
                        <input type="text" class="form-control" name="location" value="<?php echo $val_data['hospital_location']?>" >
                      </div>
                      <div class="form-group m-2 w-100">
                        <label >Phone</label>
                        <input type="tel" class="form-control" name="phone"   value="<?php echo $val_data['hospital_contact']?>" >
                      </div>
                      </div>
                      <div class="col-lg-12 d-flex m-2">
                      <div class="form-group m-2 w-100">
                        <label >Open Time</label>
                        <input type="time" class="form-control" name="op_time"  value="<?php echo $val_data['hospital_op_time']?>" >
                      </div>
                      <div class="form-group m-2 w-100">
                        <label >Close Time</label>
                        <input type="time" class="form-control" name="clo_time" value="<?php echo $val_data['hospital_close_time']?>" >
                      </div>
                      </div>
                      <div class="col-lg-12 d-flex m-2">
                      <div class="form-group w-100  m-2">
                        <label ></label>
                        <input type="file" class="form-control" name="fileimg" value="<?php echo $val_data['hospital_img']?>">
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
                        
                        // $sql = "SELECT `hospital_name` FROM `hospital` WHERE `hospital_name` = '{$name}' ";
                        // $result = mysqli_query($con, $sql);
                        // if (mysqli_num_rows($result) > 0) {
                        //   $already_exist=true;
                        //   $fill_error = false;
                        //       } else {
                    $sql1 = "UPDATE `hospital` SET`hospital_name`='$name',`hospital_email`='$email',`hospital_contact`='$phone',`hospital_manager`='$manager_name',`manager_cnic`='$manager_cnic',`hospital_location`='$location',`hospital_img`='$file_name',`hospital_op_time`='$op_time',`hospital_close_time`='$clo_time' WHERE `hospital_id`= $ed_id";
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