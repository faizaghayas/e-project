<?php
 include "admin_nav.php";

 ?>
 <!-- ------------users----------- -->
 <div class="main-panel" style="min-height:calc(120vh - 70px)">
 <div class="content-wrapper">
 <div class="row ">
              <div class="col-11  ">
                <div class="card">
                <div class="card-body">
              <div style="display: flex; justify-content: space-between; padding: 0 1rem;">
                <h4 class="card-title">Vaccines</h4>
                <!-- <div class="btn btn-outline-light" style="height: fit-content;"> -->
                <?php
          // error_reporting(0);
            $u_id=$_GET['u_id'];
          ?>
                  <!-- <a style="text-decoration: none; color:rgb(179, 178, 178); " href="hos_add_vacc.php?h_id=<?php echo $hos_id;?>">Add New</a> -->
                <!-- </div> -->
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> S.no </th>
                      <th> Name </th>
                      <th> Quantity</th>
                      <th> Hospital </th>
                      <th> Action</th>

                     

                      <th>
                      </th>
                    </tr>
                  </thead>
                  <?php
                  error_reporting(0);
                  include 'config.php';
               
                  $sql ="SELECT * FROM `vaccine` INNER JOIN `hospital`  ON vaccine.hospital_id = hospital.hospital_id ORDER BY `vaccine_id` DESC";
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
                            <?php echo $row['hospital_name']; ?>
                          </td>
                          <?php
                         $vacc_id=$row['vaccine_id'];
                         ?>
                         
                          <td><a href="vacc_del.php?de_id=<?php echo $vacc_id; ?>&u_id=<?php echo $u_id; ?>">
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
            