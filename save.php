<?php
$con=mysqli_connect("localhost","root","","e-vaccine");
if($_POST['type'] == ''){
$sql = "SELECT * FROM `hospital`";
$hosp_qry = mysqli_query($con, $sql);
    $str="";
    while ($hosp_data = mysqli_fetch_assoc($hosp_qry)) {
        $str .=" <option value='{$hosp_data['hospital_id']}'>{$hosp_data['hospital_name']}</option>";
    }
}else if($_POST['type'] == "vacc_Data"){
            $t=time();
    $sql = "SELECT * FROM `vaccine` WHERE hospital_id = {$_POST['id']}  AND `vaccine_quan` > 0 ";
$hosp_qry = mysqli_query($con, $sql);
    $str="";
    while ($hosp_data = mysqli_fetch_assoc($hosp_qry)) {
        $str .=" <option value='{$hosp_data['vaccine_id']}'>{$hosp_data['vaccine_name']}</option>";
    }
}
echo $str;

?>