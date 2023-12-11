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
                    <h4 class="card-title">Hospital</h4>
                   
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
                          $u_id=$_GET['u_id'];
                        include 'config.php';
                        $sql='SELECT * FROM `hospital` WHERE `hospital_status` = 1 ORDER BY `hospital_id` DESC LIMIT 5';
                        $result=mysqli_query($con,$sql);
                        if(mysqli_num_rows($result)> 0){
                          while($row=mysqli_fetch_assoc($result)){
                            $i++;
                          
                        ?> 
                            <td> <?php echo $i;?></td>
                            <td> <?php echo $row['hospital_name'];?></td>
                            <td> <?php echo $row['hospital_email'];?></td>
                            <td><?php echo $row['hospital_contact'];?></td>
                            <td><?php echo $row['hospital_manager'];?></td>
                            <td><?php echo $row['manager_cnic'];?> </td>
                            <td><?php echo $row['hospital_location'];?> </td>
                            <td><?php echo $row['hospital_op_time'] .' - '.$row['hospital_close_time'];?> </td>
                            
                            <td><a href="ap_hos.php?ap_id=<?php echo $row['user_id']?>&u_id=<?php echo $u_id; ?>"><div class="badge badge-outline-primary">Approve</div></a></td>
                            <td><a href="rej_hos.php?rej_id=<?php echo $row['user_id']?>&u_id=<?php echo $u_id; ?>"><div class="badge badge-outline-danger">Reject</div></a></td>

                          </tr>
                          <?php
                          }}
                          else{
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
            