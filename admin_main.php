<?php
include 'admin_nav.php';
?>
<!-- partial -->
<!-- partial:partials/_navbar.html -->

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">Users</h3>
                  <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success ">
                  <span class="mdi mdi-account icon-item"></span>
                </div>
              </div>
              <?php
                   $sql="SELECT * FROM `user`";
                   $result=mysqli_query($con,$sql);
                   $data=mysqli_num_rows($result);
                  ?>
            </div>
            <h6 class="text-muted font-weight-normal"><?php echo $data;?></h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">Hospitals</h3>
                  <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p> -->
                </div>
              </div>
              <div class="col-3">
              <?php
                   $sql="SELECT * FROM `hospital`";
                   $result=mysqli_query($con,$sql);
                   $data=mysqli_num_rows($result);
                  ?>
                <div class="icon icon-box-success">
                  <span class="mdi mdi-hospital-building icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal"><?php echo $data;?></h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
              <?php
                   $sql="SELECT * FROM `parent`";
                   $result=mysqli_query($con,$sql);
                   $data=mysqli_num_rows($result);
                  ?>
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">Childrens</h3>
          
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success ">
                <span class="mdi mdi-human-child icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal"><?php echo $data;?></h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">Vaccine</h3>
                  <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success ">
                  <span class="mdi mdi-table-edit icon-item"></span>
                </div>
              </div>
              <?php
                   $sql="SELECT * FROM `vaccine`";
                   $result=mysqli_query($con,$sql);
                   $data=mysqli_num_rows($result);
                  ?>
            </div>
            <h6 class="text-muted font-weight-normal"><?php echo $data;?></h6>
          </div>
        </div>
      </div>
    </div>

   
      <div class="row ">
        <div class="col-12 m-1">
          <div class="card">
            <div class="card-body">
              <div style="display: flex; justify-content: space-between; padding: 0 1rem;">
                <h4 class="card-title">Hospitals</h4>
                <div class="btn btn-outline-light" style="height: fit-content;">
                  <a style="text-decoration: none; color:rgb(179, 178, 178); " href="hospitals.php?u_id=<?php echo $u_id ?>"> View All </a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Hospital Name </th>
                      <th>E-mail </th>
                      <th>Contact </th>
                      <th> Manager Name </th>
                      <th> Manager CNIC </th>
                      <th> Location </th>
                      <th> Timings</th>
                      <th> Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      error_reporting(0);
                      include 'config.php';
                      $sql = 'SELECT * FROM `hospital` ORDER BY `hospital_id` DESC LIMIT 5';
                      $result = mysqli_query($con, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          $i++;

                          ?>
                          <td>
                            <?php echo $i; ?>
                          </td>
                          <td>
                            <?php echo $row['hospital_name']; ?>
                          </td>
                          <td>
                            <?php echo $row['hospital_email']; ?>
                          </td>
                          <td>
                            <?php echo $row['hospital_contact']; ?>
                          </td>
                          <td>
                            <?php echo $row['hospital_manager']; ?>
                          </td>
                          <td>
                            <?php echo $row['manager_cnic']; ?>
                          </td>
                          <td>
                            <?php echo $row['hospital_location']; ?>
                          </td>
                          <td>
                            <?php echo $row['hospital_op_time'] . ' - ' . $row['hospital_close_time']; ?>
                          </td>
                          <td>
                            <?php
                            if ($row['hospital_status'] == 1) {
                              $bttn = 'badge-outline-warning';
                              $bttn_msg = 'Pending';
                            } else if ($row['hospital_status'] == 0) {
                              $bttn = 'badge-outline-success';
                              $bttn_msg = 'Approved';
                            } else {
                              $bttn = 'badge-outline-danger';
                              $bttn_msg = 'Rejected';
                            }
                            ?>
                            <div class="badge <?php echo $bttn; ?>">
                              <?php echo $bttn_msg; ?>
                            </div>
                            <?php
                            if ($row['hospital_status'] == 0) {
                              $_SESSION['hosp_id'] = $row['hospital_id'];
                              $_SESSION['hosp_log_email'] = $row['hospital_email'];
                              // echo '<script>window.location.assign("hosp_acc.php");</script>';

                            }
                            ?>
                          </td>
                        </tr>
                        <?php
                        }
                      } else {
                        echo 'No Record Found';
                      }
                      ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ------------users----------- -->
      <div class="row ">
        <div class="col-12 m-1">
          <div class="card ">
            <div class="card-body">
              <div style="display: flex; justify-content: space-between; padding: 0 1rem;">
                <h4 class="card-title">Users</h4>
                <div class="btn btn-outline-light" style="height: fit-content;">
                  <a style="text-decoration: none; color:rgb(179, 178, 178); " href="user.php?u_id=<?php echo $u_id ?>"> View all</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> S.no </th>
                      <th> Name </th>
                      <th> Email</th>
                      <th> Phone </th>
                      <th> status </th>

                      <th>Actions</th>
                      <th>
                      </th>
                    </tr>
                  </thead>
                  <?php
                  error_reporting(0);
                  include 'config.php';
                  $sql = 'SELECT * FROM `user` ORDER BY `user_id` DESC LIMIT 5';
                  $result = mysqli_query($con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $i++;

                      ?>
                      <tbody>
                        <tr>

                          <td>
                            <?php echo $i; ?>
                          </td>
                          <td>
                            <?php echo $row['username']; ?>
                          </td>
                          <td>
                            <?php echo $row['user_email']; ?>
                          </td>
                          <td>
                            <?php echo $row['user_phone']; ?>
                          </td>
                          <td>
                            <?php
                             if ($row['user_role'] == 0) {
                              echo 'User';
                            } else if($row['user_role'] == 1){
                              echo 'Admin';
                            } 
                            else{
                              echo 'Hospital';
                            }
                            ?>
                          </td>
                          <td><a href="user_edit.php?ed_id=<?php echo $row['user_id']; ?>&u_id=<?php echo $u_id ?>">
                              <div class="badge badge-outline-primary">Edit</div>
                            </a></td>
                          <td><a href="user_del.php?de_id=<?php echo $row['user_id']; ?>&u_id=<?php echo $u_id ?>">
                              <div class="badge badge-outline-danger">Delete</div>
                            </a></td>
                        </tr>
                        <?php
                    }
                  } else {
                    echo 'No Record Found';
                  }
                  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- --------- users----------- -->
    
      <?php
      include 'admin_footer.php';
      ?>