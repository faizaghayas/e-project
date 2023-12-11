<?php
 include "hosp_panel_head.php";

 ?>
 <!-- ------------users----------- -->
 <div class="main-panel" style="min-height:calc(120vh - 70px)">
 <div class="content-wrapper">
 <div class="row ">
              <div class="col-12 mr-3 ">
                <div class="card">
                <div class="card-body">
              <div style="display: flex; justify-content: space-between; padding: 0 1rem;">
                <h4 class="card-title">Vaccine</h4>
                <div class="btn btn-outline-light" style="height: fit-content;">
                <?php
          // error_reporting(0);
          $u_id=$_GET['u_id'];
            $hos_id=$_GET['h_id'];
          ?>
                  <a style="text-decoration: none; color:rgb(179, 178, 178); " href="hos_add_vacc.php?h_id=<?php echo $hos_id;?>&u_id=<?php echo $u_id;?>">Add New</a>
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
                      <th>Actions </th>

                      

                      <th>
                      </th>
                    </tr>
                  </thead>
                  <?php
                  error_reporting(0);
                  $hos_id=$_GET['h_id'];
                  $_SESSION['hos_id']= $hos_id;
                  include 'config.php';
                  $sql ="SELECT * FROM `vaccine` WHERE `hospital_id` = $hos_id  ORDER BY `vaccine_id` DESC";
                  $result = mysqli_query($con, $sql);
                  $hos_sql ="SELECT * FROM `hospital` WHERE `hospital_id` = $hos_id";
                  $result2 = mysqli_query($con, $hos_sql);
                  $h_row = mysqli_fetch_assoc($result2);
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
                          <!-- <td>
                            <?php
                            //  if ($row['dos_1'] == 0) {
                            //   echo 'Not Vaccinated';
                            // } else if ($row['dos_1'] == 1) {
                            //   echo 'Vaccinated';
                            // }
                            $vacc_id=$row['vaccine_id'];;
                             ?>
                          </td> -->
                          <td><a href="vacc_edit.php?ed_id=<?php echo $vacc_id; ?>&h_id=<?php echo $hos_id; ?>&u_id=<?php echo $u_id; ?>">
                              <div class="badge badge-outline-primary">Edit</div>
                            </a></td>
                          <td><a href="hos_vacc_del.php?de_id=<?php echo $vacc_id; ?>&h_id=<?php echo $hos_id; ?>&u_id=<?php echo $u_id; ?>">
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
            include 'hosp_panel_footer.php';
            ?>
            <!-- --------- users----------- -->
            