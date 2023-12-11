<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="assets/css/maicons.css">

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .col-5 {
            margin: 0.5rem 0.8rem;
        }

        input {
            width: 80%;
        }

        * {
            font-family: 'Poppins', sans-serif;
            ;

        }

        .reg_hd {
            display: flex;
        }

        .reg_hd::before {
            content: "";
            width: 4px;
            height: 2.1rem;
            margin-top: 0rem;
            margin-right: 0.8rem;
            background-color: #61b3c1;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border: 1px solid #61b3c1;
            outline: 0;
            box-shadow: 0 0 0 0rem #61b3c1;
        }
        .col-10 .danger{
            color: red;
        }
    </style>
</head>

<body style="background-color: #eee !important;">

    <!-- Back to top button -->
    <div class="back-to-top"></div>

  
    <br>
    <br>
    
   <div class="d-flex container justify-content-between">
    <div style="width: 30%; padding: 2rem 1rem; background-color: #ffff; border-radius: 1rem;" class="col-3">
        <h1 class=" reg_hd"
        style="text-align: left; padding-left: 2rem; margin-bottom: 2rem; text-transform:uppercase; font-size: 1.7rem; color: #000000ad;">
     Settings</h1>
     <?php 
                include "config.php";
                $u_id=$_GET['u_id'];

                $val_sql="SELECT * FROM `user` WHERE user_id = $u_id ";
                $val_q=mysqli_query($con,$val_sql);
                $val_data=mysqli_fetch_assoc($val_q);
                ?>
     <div class="col-12">
        <img  class="rounded-circle " style="width: 50%; margin-left: 3rem" src="images/<?php echo $val_data['user_img'];?>" alt="">
        <br>
        <h6 class="text-center mt-3" style="text-transform:capitalize;"><?php echo $val_data['username'];?></h6>
       </div> 
       <br>
       <hr style="margin:0.3rem 1.4rem;">
       <div class="col-10 m-3 pt-3">
        <a href="change_pass.php?u_id=<?php echo $u_id?>">Change Password</a>
    </div>
    <div class="col-10 m-3 pt-3">
        <a href="#" id="delete"> Delete Account </a>
        </div>
       <hr style="margin:0.6rem 1.4rem;">
        <div class="col-10 m-3 pt-1 ">
            <a href="logout.php">Logout</a>
        </div>
    </div>
  
    <div style="width: 70%; padding: 2rem 1rem; background-color: #ffff; border-radius: 1rem;" >
       
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row" style="display: flex; justify-content: center; align-items: center;">
              <div class="col-10 m-3">
                <a href="" >Change Account Details</a>
                </div>
               
               <div class="col-5 mt-5 ">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $val_data['username'];?>" style="text-transform:capitalize;"
                    placeholder="">
               </div>
               <div class="col-5  mt-5">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $val_data['user_email'];?>"  style="text-transform:capitalize;"
                    placeholder="">
               </div>
               <div class="col-5">
                <label>Phone</label>
                <input type="tel" class="form-control" name="phone" value="<?php echo $val_data['user_phone'];?>"  style="text-transform:capitalize;"
                    placeholder="">
               </div>
               <div class="col-5">
                <label class="form-label">Profile Picture</label><br>
                <input type="hidden" value='<?php echo $val_data['user_img'];?>' name="old_image" id="">
                <input type="file" name="file" id=""  >
            </div>

            <div style="margin: 1rem 0;" class="col-11">
                <input type="submit" style=" margin: auto; width: 94%; background-color: #61b3c1; color: white; "
                    class="form-control" name="submit" placeholder=" ">
            </div>

    </div>
   
    
      <?php
      if (isset($_POST["submit"])) {
        
        include 'config.php';
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone= $_POST["phone"];
        $file_name = $_FILES['file']['name'];
        $old_img =$_POST['old_image'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $path = "C:/xampp/htdocs/one-health/images/$file_name";
        move_uploaded_file($file_tmp, $path);
        if($file_name != "") {
            $updateimg= $file_name;
        }
        else{
            $updateimg= $old_img;
        }

       
    $sql1 = "UPDATE `user` SET `username`='$name',`user_email`='$email',`user_phone`='$phone' ,`user_img`='$updateimg' WHERE `user_id`= $u_id";
     mysqli_query($con, $sql1);
    echo '<script>window.location.assign("main_settings.php?u_id='.$u_id.'");</script>';

}   

    
      ?>
       </form>
    </div>
</div>
    <br>
    <br>

   
    <script src="assets/js/sweetalert.min.js"></script>
    <script>
        delete_btn=document.getElementById('delete');
        delete_btn.addEventListener("click", () => {
            swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this Account!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location = "del_acc.php?u_id=<?php echo $u_id?>";
  } else {
    swal("Your account is safe!");
  }
});

        })
    </script>
    <?php
    error_reporting(0);
    if ($success) {
        echo '<script>
              swal({
              title: "Your appointment request has been sent successfully we will email you in 24 hours. Thank you! ",icon: "success",button: "ok!",
            })
            .then(function() {
                window.location = "index.php?u_id=' . $reg_id . '";
            });
            </script>';
    }
    if ($already_exist) {
        echo '<script>
              swal({
              title: "Username already registered! ",icon: "warning" ,button: "ok!",
            })
            </script>';
    }
    if ($fill_error) {
        echo '<script>
              swal({
              title: "Fill out all the Fields",icon: "error",button: "ok",
            })
            </script>';




    }
    if ($error) {
        echo '<script>
              swal({
              title: "Your appointment request was not sent. try Again ! ",icon: "error",button: "ok!",
            });
            </script>';
    }

    ?>