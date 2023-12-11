
<?php
include ("admin_nav.php");
?>
<?php
$updatequery = "UPDATE `contact` SET is_viewed = 1";
mysqli_query($con, $updatequery);
?>
<div class="main-panel" style="min-height:calc(120vh - 70px)">
 <div class="content-wrapper">
 <div class="row ">
              <div class="col-12 mr-3 ">
                <div class="card">
                  <div class="card-body">
                    <div style="display: flex; justify-content: space-between; padding: 0 1rem;">
                    <h4 class="card-title">Messages</h4>
                   
                  </div>
                    <div class="table-responsive">
                    <table class="table table-Striped ">
                    <thead>
                      <tr>
                      <th scope="col">Id</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Message</th>
       
                        
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $query = "SELECT * FROM `contact`";
                      $result = mysqli_query($con,$query);

                      if (mysqli_num_rows($result)){
                          while($rows = mysqli_fetch_array($result)){

                      ?>

                    
                        <tr>
                        <td scope="row"><?php echo $rows['contact_id']; ?></td>
                            <td scope="row"><?php echo $rows['name']; ?></td>
                            <td scope="row"><?php echo $rows['email']; ?></td>
                            <td scope="row"><?php echo $rows['phone']; ?></td>
                            <td scope="row"><?php echo $rows['message']; ?></td>

                        </tr>
                        <?php
                            }
                            }

                            else{
                                echo "no found result";
                            }
                        ?>
                    </tbody>
                  </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
  <?php
  include 'admin_footer.php';
  ?>
  