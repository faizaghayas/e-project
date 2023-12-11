<?php
include "hosp_panel_head.php";

?>
<!-- ------------users----------- -->
<div class="main-panel" style="min-height:calc(120vh - 70px)">
    <div class="content-wrapper">
        <div class="row ">
            <div class="col-10 mr-3 ">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; padding: 0 1rem;">
                            <h4 class="card-title">Child Details</h4>
                            <div class="btn btn-outline-light" style="height: fit-content;">
                                <?php
                                // error_reporting(0);
                                $hos_id = $_GET['h_id'];
                                ?>
                                <a style="text-decoration: none; color:rgb(179, 178, 178); "
                                    href="hos_add_vacc.php?h_id=<?php echo $hos_id; ?>">Add New</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> S.no </th>
                                        <th> Parent Name </th>
                                        <th> Parent Email </th>
                                        <th> Parent Phone </th>
                                        <th> Parent CNIC </th>
                                        <th> Child Name </th>
                                        <th> Child Age</th>
                                        <th>Child Gender</th>
                                        <th> appoint day</th>
                                        <th> Hospital </th>
                                        <th> Vaccine</th>

                                        <th>Actions</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    //   error_reporting(0);
                                    error_reporting(0);
                                    $u_id = $_GET['u_id'];
                                    $hos_id = $_GET['h_id'];
                                    include 'config.php';
                                    $sql1 = "SELECT `vaccine_name` FROM `parent`  INNER JOIN `vaccine` ON parent.parent_vacc = vaccine.vaccine_id ";
                                    $sql2 = "SELECT * FROM `parent` WHERE parent_hosp= $hos_id AND parent_status = 1  ORDER BY `parent_id` DESC";
                                    $result1 = mysqli_query($con, $sql1);
                                    $result2 = mysqli_query($con, $sql2);
                                    $row1 = mysqli_fetch_assoc($result1);
                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row = mysqli_fetch_assoc($result2)) {
                                            $i++;


                                            ?>
                                            <tr>

                                                <td>
                                                    <?php echo $i; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['parent_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['parent_email']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['parent_phone']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['parent_CNIC']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['child_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['child_age']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['child_gender']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['appoint_day']; ?>
                                                </td>
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

                                                <td><a
                                                        href="pat_ap.php?ap_id=<?php echo $row['parent_id']; ?>&h_id=<?php echo $hos_id; ?>&u_id=<?php echo $u_id; ?>">
                                                        <div class="badge badge-outline-primary">Approve</div>
                                                    </a></td>
                                                <td><a
                                                        href="pat_rej.php?rej_id=<?php echo $row['parent_id']; ?>&h_id=<?php echo $hos_id; ?>&u_id=<?php echo $u_id; ?>">
                                                        <div class="badge badge-outline-danger">Reject</div>
                                                    </a></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo 'No Record Found';


                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- page-body-wrapper ends -->

        <?php
        include 'hosp_panel_footer.php';
        ?>
        <!-- --------- users----------- -->