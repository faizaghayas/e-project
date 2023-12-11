<?php
 include "config.php";
 $de_id=$_GET['de_id'];
 $hos_id=$_GET['h_id'];
 $u_id=$_GET['u_id'];
 $val_sql="DELETE FROM `vaccine` WHERE `vaccine_id` = $de_id ";
mysqli_query($con,$val_sql);
echo '<script>window.location.assign("hos_vacc_quan.php?u_id='.$u_id.'&h_id='.$hos_id.'");</script>';
?>