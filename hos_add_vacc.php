<?php
 include "hosp_panel_head.php";
 ?>
  <div class="main-panel" style="min-height:calc(120vh - 70px)">
 <div class="content-wrapper">
  <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
              <div class="row">
              <div class="col-10 grid-margin mx-auto stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form method="POST" class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">Vaccine Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder=" Vaccine Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Vaccine Quantity</label>
                        <input type="tel" class="form-control" name="quantity" id="exampleInputEmail3" placeholder="Quantity">
                      </div>
                      <input type="submit" value="Submit" name="submit" class="btn btn-primary me-2" >
                      <button class="btn btn-dark">Cancel</button>
                      <?php
                      if (isset($_POST["submit"])) {
                        $hos_id=$_GET['h_id'];
                        $u_id=$_GET['u_id'];
                        include 'config.php';
                        $name = $_POST["name"];
                        $quantity = $_POST["quantity"];
                        $hos_id= $_GET['h_id'];
                        
              
                    $sql1 = "INSERT INTO `vaccine` (`vaccine_id`, `vaccine_name`, `vaccine_quan`, `hospital_id`) VALUES (null,'$name','$quantity','$hos_id')";
                     mysqli_query($con, $sql1);
                    echo '<script>window.location.assign("hos_vacc_quan.php?u_id='.$u_id.'&h_id='.$hos_id.'");</script>';
    
                
    
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