<?php
include("main_header.php");
?>
<div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow fadeInUp mb-3">Hospitals</h1>
      <div class="row d-flex justify-content-center">
      <?php
       $sql = "SELECT * FROM `hospital` WHERE `hospital_status`  = 0 ORDER BY `hospital_id` DESC ";
       $run=mysqli_query($con,$sql);
       if(mysqli_num_rows($run)){
           while($data=mysqli_fetch_assoc($run)){
               ?>
        <div class="col-lg-4 py-2 wow zoomIn">
       
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#"></a>
              </div>
              <a href="blog-details.html" class="post-thumb">
                <img src="images/<?php echo $data['hospital_img']; ?>" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html"><?php echo $data['hospital_name'];?></a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <span><?php echo $data['hospital_manager'];?></span>
                </div>
                <span class="mai-time"></span> <?php
                  
                  $date = $data['Created_at'];
                  echo get_time_ago(time()-$date).'<br>'; ?>
              </div>
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



<?php
function get_time_ago($time) {
  $time_difference = time() - $time;

  if($time_difference < 1) {
    return 'less than 1 second ago';
  }
  $condition = array(12 * 30 * 24 * 60 * 60 => 'year',
    30 * 24 * 60 * 60 => 'month',
    24 * 60 * 60 => 'day',
    60 * 60 => 'hour',
    60 => 'minute',
    1 => 'second'
  );

  foreach($condition as $secs => $str) {
    $d = $time_difference / $secs;

    if($d >= 1) {
      $t = round($d);
      return 'about '.$t.' '.$str.($t > 1 ? 's' : '').' ago';
    }
  }
}
?>