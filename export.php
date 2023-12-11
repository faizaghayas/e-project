<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
  <link rel="stylesheet" href="assets/css/bootstrap.css">

  <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="assets/vendor/animate/animate.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/theme.css">
    <style>

    </style>
</head>
<body>
<?php
               require 'assets/vendor/autoload.php';
                // error_reporting(0);
                              $u_id = $_GET['u_id'];
                include 'config.php';
                $sql = "SELECT * FROM `parent` WHERE `user_id` = $u_id ";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
               
                $vaccine = $row['parent_vacc'];
                $vac_quan = "SELECT * FROM `vaccine` WHERE `vaccine_id` = $vaccine";
                $vac_Q = mysqli_query($con, $vac_quan);
                $vacc_data = mysqli_fetch_assoc($vac_Q);
                $vacc_val = $vacc_data["vaccine_name"];
//vacc data
//hos data
$hospital = $row['parent_hosp'];
    
$hos = "SELECT * FROM `hospital` WHERE `hospital_id` = $hospital";
$hos_q = mysqli_query($con, $hos);
$hos_d = mysqli_fetch_assoc($hos_q);
$hos_val = $hos_d['hospital_name'];

//hos data
if($row['dos_1'] == 0){
    $dos="not vaccinated";
}else{
    $dos="vaccinated";
}
if($row['dos_2'] == 0){
    $dos2="not vaccinated";
}else{
    $dos2="vaccinated";
}  
 
                   
    $html= '<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background: rgb(255, 255, 255);
    }

    .container {
        margin: auto;
        
    }

    table {
        width: 100%;
        border: 0px solid rgba(73, 73, 73, 0.658);
        outline: none;
        margin-top: 2rem;
        box-shadow: none;
        border-collapse: unset;
        position: absolute;
        top: 57%;
    }

    table tr {
        height: 50px !important;
    }

    table tr td,
    table tr th {
        color: #000000bb;
        text-transform: capitalize;
        text-align: center;
        font-size: 1rem;
        outline: none;
        box-shadow: none;
        border-collapse: unset;
        border-top: none;
        background-color: rgba(216, 226, 226, 0.767);
        padding: 0.5rem 1rem;

    }

    table tr th {
        border-left: none;
        background-color: rgb(255, 255, 255);

    }

    table tr td {
        border-right: none;
        border-left: none;

    }

    h2 {
        text-align: center;
        font-size: 1.9rem
    }

    .full {
        width: 100%;
        height: 40.7rem;
        position: relative;
        border:2px solid #000;
    }
    .half{
        display: flex;
        justify-content: space-between;
        /* align-items: center; */
        background: rgb(235, 245, 243);
        width: 100%;
        height: 65%;
        padding: 0 10rem;
    }
    .data{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem 0.5rem;
    }
    .first{
        width:100%;
        color: black;
        font-size: 1.1rem;
        text-align:left;
    }
    .second{
        float:right;
        width: 60%;
        border-bottom: 1px solid black;
        color: black;
        font-size: 1.1rem;
        text-transform:capitalize;
    }
    .form{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 1rem;
        margin-bottom: 2rem;

    }
 
</style>
<div class="full">
    <div class="half">
        <div class="container">
            <h2 style="padding: 0rem 0; margin-top: 1rem; font-weight: 600;">Vaccine Report</h2>
            <h3 style="padding: 1rem 0; text-align: center; font-weight: 400;">Certificate for '. $vacc_val.' Vaccination</h5>
                <div class="form">
            <div class="data" style="width: 100%;">
                <div class="first">Child Name:</div>
                
                <div class="second">'.$row['child_name'].'</div>
            </div>
            <div class="data">
                <div class="first">Parent Name:</div><div class="second">'.$row['parent_name'].'</div>
            </div> 
            <div class="data">
                <div class="first">Parent CNIC:</div><div class="second">'.$row['parent_CNIC'].'</div>
            </div>
            <div class="data">
                <div class="first">Child Age:</div><div class="second">'.$row['child_age'].'</div>
            </div>
            <div class="data">
                <div class="first">Child Gender:</div><div class="second">'.$row['child_gender'].'</div>
            </div>
        </div>
      
        </div>
      
    </div>
    <table style="width: 100%; ">
        <tr >
            <th>Vaccine Name</th>
            <th>Recommended Dose</th>
            <th>Date</th>
            <th>Health Center</th>
        </tr>
        <tr>
            <td>'. $vacc_val.'</td>
            <td>2</td>
            <td> '. $row['appoint_day'].'</td>
            <td> '.$hos_val.'</td>
        </tr>
    </table>
   
</div>
';
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
echo'<script>window.location.assign("index.php?u_id'.$u_id.'");</script>';
$file='report.pdf';
$mpdf->output($file,'D');

?>
</body>
</html>