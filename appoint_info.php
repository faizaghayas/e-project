<?php
include "main_header.php";
$u_id = $_GET['u_id'];

?>
<br>
<br>

<div style="width: 50%; padding: 2rem 1rem; background-color: #ffff; border-radius: 1rem;" class="container">
<div class="d-flex justify-content-between px-3">
 <h1 class=" reg_hd"
        style="text-align: left; margin-bottom: 2rem; text-transform:uppercase; font-size: 1.7rem; color: #000000ad;">
        Appointment Info </h1>
        <a href="export.php?u_id=<?php echo $u_id;?>" style="padding:5px 15px; height:2.4rem;"  class="btn btn-primary">Download</a>
        </div>
        
    <table class="table table-bordered">
        <thead>
            <?php
            error_reporting(0);
            $u_id = $_GET['u_id'];
            include 'config.php';
            $sql = "SELECT * FROM `parent` WHERE `user_id` = $u_id ";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result)

                ?>
            <tr>
                <th> Parent Name </th>
                <td>
                    <?php echo $row['parent_name']; ?>
                </td>
            </tr>
            <tr>
                <th> Parent Email</th>
                <td>
                    <?php echo $row['parent_email']; ?>
                </td>
            </tr>

            <tr>
                <th> Parent Phone </th>
                <td>
                    <?php echo $row['parent_phone']; ?>
                </td>
            </tr>
            <tr>
                <th> Child Name </th>
                <td>
                    <?php echo $row['child_name']; ?>
                </td>
            </tr>
            <tr>

                <th> Child Age </th>
                <td>
                    <?php echo $row['child_age']; ?>
                </td>
            </tr>
            <tr>

                <th> Child Gender </th>
                <td>
                    <?php echo $row['child_gender']; ?>
                </td>
            </tr>
            <tr>

                <th> Parent CNIC</th>
                <td>
                    <?php echo $row['parent_CNIC']; ?>
                </td>
            </tr>
            <tr>

                <th> Appointment day
                </th>
                <td>
                    <?php echo $row['appoint_day']; ?>
                </td>
            </tr>
            <tr>
                <th> Hospital
                </th>
                <td>
                    <?php
                    $hospital = $row['parent_hosp'];

                    $hos = "SELECT * FROM `hospital` WHERE `hospital_id` = $hospital";
                    $hos_q = mysqli_query($con, $hos);
                    $hos_d = mysqli_fetch_assoc($hos_q);
                    $hos_val = $hos_d['hospital_name'];
                    echo $hos_val;
                    ?>
                </td>
            </tr>
            <tr>
                <th> Vaccine
                </th>
                <td>
                    <?php

                    $vaccine = $row['parent_vacc'];
                    $vac_quan = "SELECT * FROM `vaccine` WHERE `vaccine_id` = $vaccine";
                    $vac_Q = mysqli_query($con, $vac_quan);
                    $vacc_data = mysqli_fetch_assoc($vac_Q);
                    $vacc_val = $vacc_data["vaccine_name"];
                    echo $vacc_val;
                    ?>
                </td>
            </tr>
            <tr>
                <th>dose 1</th>
                <td>
                    <?php if($row['dos_1'] == 0){
                        echo "not vaccinated";
                    }
                    else{
                        echo "vaccinated";
                    } ?>
                </td>
            </tr>
            <tr>
                <th>dose 2</th>
                <td>
                <?php if($row['dos_2'] == 0){
                        echo "not vaccinated";
                    }
                    else{
                        echo "vaccinated";
                    } ?>
                </td>
            </tr>



        </thead>

        <tbody>



        </tbody>
    </table>
</div>

<?php


?>
</div>
<br>
<br>
<?php
include "main_footer.php";
?>