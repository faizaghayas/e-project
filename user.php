 <?php
 include "admin_nav.php";

 ?>
 <!-- ------------users----------- -->
 <div class="main-panel" style="min-height:calc(120vh - 70px)">
 <div class="content-wrapper">
 <div class="row ">
              <div class="col-12 mr-3 ">
                <div class="card">
                  <div class="card-body">
                  <div style="display: flex; justify-content: space-between; padding: 0 1rem;">
                <h4 class="card-title">Users</h4>
                <div class="btn btn-outline-light" style="height: fit-content;">
                  <a style="text-decoration: none; color:rgb(179, 178, 178); " href="user_add.php?u_id=<?php echo $u_id ?>"> Add New </a>
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
                        $sql='SELECT * FROM `user` ORDER BY `user_id` DESC';
                        $result=mysqli_query($con,$sql);
                        if(mysqli_num_rows($result)> 0){
                          while($row=mysqli_fetch_assoc($result)){
                            $i++;
                          
                        ?>
                        <tbody>
                          <tr>
                           
                            <td> <?php echo $i;?> </td>
                            <td> <?php echo $row['username'];?> </td>
                            <td><?php echo $row['user_email'];?> </td>
                            <td><?php echo $row['user_phone'];?></td>
                            <td> <?php if($row['user_role'] == '0'){
                              echo 'User';
                              }
                              elseif($row['user_role'] == '1'){
                              echo 'Admin';
                              }
                              else{
                                echo 'hospital';
                              }?></td>
                            <td><a href="user_edit.php?ed_id=<?php echo $row['user_id'];?>&u_id=<?php echo $u_id ?>"><div class="badge badge-outline-primary">Edit</div></a></td>
                            <td><a href="user_del.php?de_id=<?php echo $row['user_id']; ?>&u_id=<?php echo $u_id ?>"><div class="badge badge-outline-danger">Delete</div></a></td>
                          </tr>
                          <?php
                          }
                        }
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
            