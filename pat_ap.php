<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include ('config.php');
$u_id=$_GET['u_id'];
$hos_id=$_GET['h_id'];
$pat_id=$_GET['ap_id'];
$sql="SELECT * FROM `parent` WHERE `parent_id` = $pat_id;";
$resultq=mysqli_query($con,$sql);
$rows=mysqli_fetch_assoc($resultq);
$p_name= $rows["parent_name"];
$p_email= $rows["parent_email"];
$p_phone= $rows["parent_phone"];
$child_name= $rows["child_name"];
$child_age= $rows["child_age"];
$radioval=$rows["child_gender"];
$p_cnic= $rows["parent_CNIC"];
$app_day= $rows["appoint_day"];
$hospital= $rows["parent_hosp"];
$hos = "SELECT * FROM `hospital` WHERE `hospital_id` = $hospital";
$hos_q = mysqli_query($con, $hos);
$hos_d = mysqli_fetch_assoc($hos_q);
$hos_val = $hos_d['hospital_name'];
$vaccine= $rows["parent_vacc"];
$vac_quan = "SELECT * FROM `vaccine` WHERE `vaccine_id` = $vaccine";
$vac_Q = mysqli_query($con, $vac_quan);
$vacc_data = mysqli_fetch_assoc($vac_Q);
$curr_quan = $vacc_data["vaccine_quan"];
$vacc_val = $vacc_data["vaccine_name"];
$min_quan = "UPDATE `vaccine` SET `vaccine_quan` = $curr_quan - 1  WHERE `vaccine_id`= $vaccine";
$min_Q = mysqli_query($con, $min_quan);
 
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "faizaghayas16@gmail.com";
$mail->Password = "fohlaivlpzhtjmvw";
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('faizaghayas16@gmail.com','E-vaccine');
$mail->addAddress($p_email);
$mail->isHTML(true);
$mail->Subject = "Appointment Report";

$sql .="UPDATE `parent` SET `parent_status` = 0 WHERE `parent_id`= $pat_id";
mysqli_multi_query($con, $sql);
echo'<script>window.location.assign("hosp_panel_main.php?u_id='.$u_id.'&h_id='.$hos_id.'");</script>';


$mail->Body = "<div>
            <h4>Your Appointment is confirmed on $app_day  at  $hos_val hospital. we'll be waiting.</h5>
            <h5><b>Your Appointment is Due on $app_day.</b></h5>
            <table>
            <tr>
              <th>Parent Name:</th>
              <td>$p_name</td>
            </tr>
            <tr>
            <th>Parent Email:</th>
            <td>$p_email</td>
          </tr>
            <tr>
            <th>Child Name:</th>
              <td>$child_name</td>
            </tr>
            <tr>
            <th>Child Age:</th>
              <td>$child_age</td>
            </tr>
            <tr>
            <th>Child Gender:</th>
              <td>$radioval</td>
            </tr> 
            <tr>
            <th>CNIC:</th>
              <td>$p_cnic</td>
            </tr>
            <tr>
            <th>Appointment Day:</th>
              <td>$app_day</td>
            </tr>
            <tr>
            <th>Hospital:</th>
            <td>$hos_val</td>
          </tr>
          <tr>
          <th>Vaccine:</th>
          <td>$vacc_val</td>
        </tr>
          </table>
           </div>";
$mail->send();

?>