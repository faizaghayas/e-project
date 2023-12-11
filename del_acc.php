<?php

include "config.php";
$de_id=$_GET['u_id'];
$val_sql="DELETE FROM `user` WHERE user_id = $de_id ";
mysqli_query($con,$val_sql);
echo '<script>window.location.assign("index.php");</script>';

?>