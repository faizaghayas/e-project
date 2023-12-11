<?php
include ('config.php');
$u_id=$_GET['u_id'];
$dos_id=$_GET['fd_id'];
$hos_id=$_GET['h_id'];
$sql="SELECT * FROM `parent` WHERE `parent_id` = $dos_id;";
$sql="UPDATE `parent` SET `dos_1` = 1 WHERE `parent_id`= $dos_id";
mysqli_multi_query($con, $sql);
echo'<script>window.location.assign("hosp_pat_dos.php?u_id='.$u_id.'&h_id='.$hos_id.'");</script>';

?>