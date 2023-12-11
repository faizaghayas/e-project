<?php
include ('config.php');
$u_id=$_GET['u_id'];
$hosp_id=$_GET['ap_id'];
$sql="SELECT * FROM `hospital` WHERE `user_id` = $hosp_id ;";
$resultq=mysqli_query($con,$sql);

$rows=mysqli_fetch_assoc($resultq);
$hosp_name=$rows["hospital_name"];
$hosp_email=$rows["hospital_email"];
$hosp_contact=$rows["hospital_contact"];
$manager_name =$rows["hospital_manager"];
$manager_cnic =$rows["manager_cnic"];
$location =$rows["hospital_location"];
$op_time =$rows["hospital_op_time"];
$clo_time =$rows["hospital_close_time"];

$hosp_pass=$rows["pass"];
$sql .="UPDATE `hospital` SET `hospital_status` = 0 WHERE `user_id`= $hosp_id;";
$sql .= "UPDATE `user` SET `username` = '$hosp_name' ,`user_email`='$hosp_email',`user_phone`='$hosp_contact',`user_pass`='$hosp_pass',`user_role`= '2' WHERE `user_id`= $hosp_id ;";
mysqli_multi_query($con, $sql);

echo'<script>window.location.assign("pend_hosp.php?u_id='.$u_id.'");</script>';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "faizaghayas16@gmail.com";
$mail->Password = "fohlaivlpzhtjmvw";
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('faizaghayas16@gmail.com','E-vaccine');
$mail->addAddress($hosp_email);
$mail->isHTML(true);
$mail->Subject = "Hospital Report";
$mail->Body = "<div>
<h4>Congratulation your Hospital has been Approved!</h5>
<p> please login into your hospital portal with your hospital email & password! </p>
<table align='left'>
<tr>
  <th>Hospital Name:</th>
  <td>$hosp_name</td>
</tr>
<tr>
<th>Official Email:</th>
  <td>$hosp_email</td>
</tr>
<tr>
<th>Phone:</th>
<td>$hosp_contact</td>
</tr>
<tr>
<th>Manager_name:</th>
  <td>$manager_name </td>
</tr>
<tr>
<th>Manager_CNIC:</th>
  <td>$manager_cnic</td>
</tr> 
<tr>
<th>Location:</th>
  <td>$location</td>
</tr>
<tr>
<th>Open Time</th>
  <td>$op_time</td>
</tr>
<tr>
<th>Close Time</th>
<td>$clo_time</td>
</tr>

</table>
</div>";
$mail->send();

?> 