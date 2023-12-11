<?php
include 'hosp_panel_head.php';
?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row px-3" style="margin-left:2rem;">
      <div class="col-xl-3 col-sm-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
              <?php
             $h_id= $_GET['h_id'];
                   $sql="SELECT * FROM `parent` WHERE parent_hosp= $h_id";
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
      <div class="col-xl-3 col-sm-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
              <?php
             $h_id= $_GET['h_id'];
                   $sql="SELECT * FROM `vaccine` WHERE hospital_id= $h_id";
                   $result=mysqli_query($con,$sql);
                   $data=mysqli_num_rows($result);
                  ?>
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">Vaccines</h3>
                  <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p> -->
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success">
                <span class="mdi mdi-table-edit icon-item"></span>
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
             $h_id= $_GET['h_id'];
                   $sql="SELECT * FROM `parent` WHERE dos_1= 1 AND dos_2= 1";
                   $result=mysqli_query($con,$sql);
                   $data=mysqli_num_rows($result);
                  ?>
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">Vaccinated childs</h3>
          
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
    </div>

    <div class="row ">
              <div class="col-10 mx-3 ">
                <div class="card">
                <div class="card-body">
              <div style="display: flex; justify-content: space-between; padding: 0 1rem;">
                <h4 class="card-title">Child Details</h4>
                <div class="btn btn-outline-light" style="height: fit-content;">
                <?php
          // error_reporting(0);
            $hos_id=$_GET['h_id'];
          ?>
                  <a style="text-decoration: none; color:rgb(179, 178, 178); " href="hos_pat_add.php?h_id=<?php echo $hos_id;?>&u_id=<?php echo $u_id;?>">Add New</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> S.no </th>
                      <th> Parent Name </th>
                      <th> Parent Email </th>
                      <th> Parent Phone </th>
                      <th> Parent CNIC </th>
                      <th> Child Name </th>
                      <th> Child Age</th>
                      <th>Child Gender</th>
                      <th> appoint day</th>
                      <th> Hospital </th>
                      <th> Vaccine</th>
                      <th> status </th>

                      <th>
                    </tr>
                  </thead>
                  <?php
                  error_reporting(0);
                
                  include 'config.php';
                  $sql1 ="SELECT `vaccine_name` FROM `parent`  INNER JOIN `vaccine` ON parent.parent_vacc = vaccine.vaccine_id ";
                  $sql2 ="SELECT * FROM `parent` WHERE parent_hosp= $hos_id  ORDER BY `parent_id` DESC";
                  $result1 = mysqli_query($con,$sql1);
                  $result2 =mysqli_query($con,$sql2);
                  $row1 =mysqli_fetch_assoc($result1);
                  $hos_sql ="SELECT * FROM `hospital` WHERE `hospital_id` = $hos_id";
                  $result3 = mysqli_query($con, $hos_sql);
                  $h_row = mysqli_fetch_assoc($result3);
                  if(mysqli_num_rows($result2) > 0) {
                    while ($row =mysqli_fetch_assoc($result2)) {
                      $i++;
                      ?>
                      <tbody>
                        <tr>

                          <td>
                            <?php echo $i; ?>
                          </td>
                          <td>
                            <?php echo $row['parent_name']; ?>
                          </td>
                          <td>
                            <?php echo $row['parent_email']; ?>
                          </td>
                          <td>
                            <?php echo $row['parent_phone']; ?>
                          </td>
                          <td>
                          <?php echo $row['parent_CNIC']; ?>
                          </td>
                          <td>
                          <?php echo $row['child_name']; ?>
                          </td>
                          <td>
                          <?php echo $row['child_age']; ?>
                          </td>
                          <td>
                          <?php echo $row['child_gender']; ?>
                          </td>
                          <td>
                          <?php echo $row['appoint_day']; ?>
                          </td>
                          <td>
                          <?php echo $h_row['hospital_name']; ?>
                          </td>
                           <td>
                          <?php echo $row1['vaccine_name']; ?>
                          </td>
                          <!-- <td>
                          <?php echo $row['parent_status']; ?>
                          </td> -->
                          <td>
                            <?php
                            if ($row['parent_status'] == 1) {
                              $bttn = 'badge-outline-warning';
                              $bttn_msg = 'Pending';
                            } else if ($row['parent_status'] == 0) {
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
                            if ($row['parent_status'] == 0) {
                              $_SESSION['pat_id'] = $row['parent_id'];
                              $_SESSION['pat_log_email'] = $row['parent_email'];

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
        <div class="col-10 mx-3 my-3">
          <div class="card">
            <div class="card-body">
            <?php
                  // error_reporting(0);
                  $hos_id=$_GET['h_id'];
                  $u_id=$_GET['u_id'];
                  ?>

              <div style="display: flex; justify-content: space-between; padding: 0 1rem;">
                <h4 class="card-title">Vaccine</h4>
                <div class="btn btn-outline-light" style="height: fit-content;">
                  <a style="text-decoration: none; color:rgb(179, 178, 178); " href="hos_vacc_quan.php?u_id=<?php echo $u_id;?>&h_id=<?php echo $hos_id;?>"> View all</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> S.no </th>
                      <th> Name </th>
                      <th> Quantity</th>
                      <th> Hospital </th>
                      <th>Actions</th>
                      <th>
                      </th>
                    </tr>
                  </thead>
                  <?php
                  // error_reporting(0);
                  $u_id=$_GET['u_id'];
                  $hos_id=$_GET['h_id'];
                  include 'config.php';
                  $sql ="SELECT * FROM `vaccine` WHERE `hospital_id` = $hos_id  ORDER BY `vaccine_id` DESC LIMIT 5";
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
                            <?php echo $row['vaccine_name']; ?>
                          </td>
                          <td>
                            <?php echo $row['vaccine_quan']; ?>
                          </td>
                          <td>
                            <?php echo $h_row['hospital_name']; ?>
                          </td>
                         
                          <td><a href="user_edit.php?ed_id=<?php echo $hos_id; ?>">
                              <div class="badge badge-outline-primary">Edit</div>
                            </a></td>
                          <td><a href="user_edit.php?de_id=<?php echo $hos_id; ?>">
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
include 'hosp_panel_footer.php';
?>