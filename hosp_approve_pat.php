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
                                error_reporting(0);
                                $u_id=$_GET['u_id'];
            $hos_id=$_GET['h_id'];
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

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    //   error_reporting(0);
                                    // error_reporting(0);

                                    include 'config.php';
                                    // $sql1 = "SELECT `vaccine_name` FROM `parent`  INNER JOIN `vaccine` ON parent.parent_vacc = vaccine.vaccine_id ";
                                    $sql2 = "SELECT * FROM `parent` WHERE parent_hosp= $hos_id AND parent_status = 0  ORDER BY `parent_id` DESC";
                                    // $result1 = mysqli_query($con, $sql1);
                                    $result2 = mysqli_query($con, $sql2);
                                    // $row1 = mysqli_fetch_assoc($result1);
                                    $hos_sql ="SELECT * FROM `hospital` WHERE `hospital_id` = $hos_id";
                  $result3 = mysqli_query($con, $hos_sql);
                  $h_row = mysqli_fetch_assoc($result3);
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
                                                    <?php echo $h_row['hospital_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['parent_vacc']; ?>
                                                </td>

                                                <td>
                                                    <?php
                                                    if ($row['parent_status'] == 1) {
                                                        $bttn = 'badge-outline-warning';
                                                        $bttn_msg = 'Pending';
                                                    } else if ($row['parent_status'] == 0) {
                                                        $bttn = 'badge-outline-success';
                                                        $bttn_msg = 'Approved';
                                                    } else {
                                                        $bttn = 'badge-outline-danger';
                                                        $bttn_msg = 'Rejected';
                                                    }
                                                    ?>
                                                    <div class="badge <?php echo $bttn; ?>">
                                                        <?php echo $bttn_msg; ?>
                                                    </div>
                                                    <?php
                                                    if ($row['parent_status'] == 0) {
                                                        $_SESSION['pat_id'] = $row['parent_id'];
                                                        $_SESSION['pat_log_email'] = $row['parent_email'];

                                                    }
                                                    ?>
                                                </td>
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