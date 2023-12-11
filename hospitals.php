<?php
 include "admin_nav.php";
 ?>
 <!-- ------------users----------- -->
 <div class="main-panel" style="min-height:calc(120vh - 70px)">
 <div class="content-wrapper">
 <div class="row ">
              <div class="col-lg-12 stretch-card " >
                <div class="card" >
                  <div class="card-body"  >
                    <div>
                    <div style="display: flex; justify-content: space-between; padding: 0 1rem;">
                <h4 class="card-title">Hospitals</h4>
                <div class="btn btn-outline-light" style="height: fit-content;">
                  <a style="text-decoration: none; color:rgb(179, 178, 178); " href="hospital_add.php?u_id=<?php echo $u_id ?>"> Add New </a>
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
                            <th> Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <?php
                      error_reporting(0);
                      include 'config.php';
                      $sql = 'SELECT * FROM `hospital` ORDER BY `hospital_id` DESC ';
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
                            $hos_id=$row['hospital_id'];
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
                        <td><a href="hos_edit.php?ed_id=<?php echo $hos_id; ?>&u_id=<?php echo $u_id; ?>">
                              <div class="badge badge-outline-primary">Edit</div>
                            </a></td>
                            <td><a href="hos_del.php?de_id=<?php echo $hos_id; ?>&u_id=<?php echo $u_id; ?>">
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
            
           
                    
                    <!-- page-body-wrapper ends -->
                   
                    <?php
            include 'admin_footer.php';
            ?>
            <!-- --------- users----------- -->
            