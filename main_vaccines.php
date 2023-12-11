<?php
include("main_header.php");
?>

<div class="page-section bg-light">
    <div class="container ">
      <h1 class="text-center wow fadeInUp">Vaccines</h1>
      <div class="row d-flex justify-content-center">
      <?php
      include "config.php";
       $sql = "SELECT * FROM `vaccine` ORDER BY `vaccine_id` DESC ";
       $run=mysqli_query($con,$sql);
       if(mysqli_num_rows($run)){
           while($data=mysqli_fetch_assoc($run)){
               ?>

      
        <div class="item">
          <div class="card-doctor mx-3">
            <div class="header" >
              <div style=" width:100%; height: 100%; "><i style="color:#61b3c5; font-size:12rem; margin:2rem 1.5rem; text-align:center;" class="fa-solid fa-virus fa-lg"></i></div>
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl text-center mb-0"><?php echo $data['vaccine_name'];?></p>
              <?php
              $reg_id=$_GET['u_id'];
              $vacc_id=$data['vaccine_id'];
              if(isset($reg_id)){
                $vacc_url="parent_reg.php?vacc_id=$vacc_id";
              }
              else{
                $vacc_url= "login.php";
              }
              ?>
              <a style="width: 100%; " href="<?php echo $vacc_url;?>"><button style="width: 100%; outline: none; border: none;  background-color:#61b3c5; color: white; border-radius: 0.5rem; margin: 1rem 0; padding: 0.3rem 0;">Apply Now</button></a>
            </div>
          </div>
        </div>
      <?php
           }}
           
      ?>

        
      </div>
    </div>
  </div> <!-- .page-section -->
  <div class="page-section banner-home bg-image" style="background-image: url(assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="assets/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->
<?php
include("main_footer.php");
?>