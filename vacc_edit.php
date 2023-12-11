<?php
 include "hosp_panel_head.php";
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
                $hos_id=$_GET['h_id'];
                $val_sql="SELECT * FROM `vaccine` WHERE vaccine_id = $ed_id ";
                $val_q=mysqli_query($con,$val_sql);
                $val_data=mysqli_fetch_assoc($val_q);
                ?>
              </nav>
              <div class="row">
              <div class="col-10 grid-margin mx-auto stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Vaccine</h4>
                    <p class="card-description"> Edit Vaccine Detail</p>
                    <form method="POST" class="forms-sample">
                    <div class="col-lg-12 d-flex m-2">
                      <div class="form-group m-2 w-100">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputName1" value="<?php echo $val_data['vaccine_name']?>" placeholder=" Vaccine Name">
                      </div>
                      <div class="form-group m-2 w-100">
                        <label for="exampleInputEmail3">Quantity</label>
                        <input type="text" class="form-control" name="quan" id="exampleInputEmail3"  value="<?php echo $val_data['vaccine_quan']?>" placeholder="Quantity">
                      </div>
                      </div>
                      
                
                      
                      <input type="submit" value="Submit" name="submit" class="btn btn-primary me-2" >
                      <button class="btn btn-dark">Cancel</button>
                      <?php
                      if (isset($_POST["submit"])) {
                        $ed_id=$_GET['ed_id'];
                        include 'config.php';
                        $name = $_POST["name"];
                        $quan = $_POST["quan"];
                        
                        // $sql = "SELECT `username` FROM `user` WHERE `username` = '{$name}' ";
                        // $result = mysqli_query($con, $sql);
                        // if (mysqli_num_rows($result) > 0) {
                        //   $already_exist=true;
                        //   $fill_error = false;
                        //       } else {
                    $sql1 = "UPDATE `vaccine` SET `vaccine_name`='$name',`vaccine_quan`='$quan' WHERE `vaccine_id`= $ed_id";
                     mysqli_query($con, $sql1);
                    echo '<script>window.location.assign("hos_vacc_quan.php?u_id='.$u_id.'&h_id='.$hos_id.'");</script>';
    
                // }  
    
                      }
                      ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
 <?php
 include "hosp_panel_footer.php";
 ?>