<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: blue;">
    <div class="container-fluid">
        <div class="card m-5 p-5">
            <form method="post">
                <div class="row mt-1">
                    <div class="form-control col-md-5">
                        <input type="text" class="form-control" name="semail" id="" aria-describedby="helpId"
                            placeholder="Email" autocomplete="off">
                    </div>
                    <div class="form-control col-md-5">
                        <input type="password" class="form-control" name="spass" id="" aria-describedby="helpId"
                            placeholder="Email">
                    </div>
                    <button class="col-md-2 btn-info btn-sm" name="search" type="submit">Search</button>
                </div>
            </form>
            <?php
            include 'dbcon.php';
            global $row;
            global $semail;
            global $spass;
            if(isset($_POST['search'])){
                $semail=$_POST['semail'];
                $spass=$_POST['spass'];
                $query = "select * from users where password='$spass' and email='$semail'";
                $result = mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($result);
                
            }
            
            ?>

            <p class="text-center display-6">Profile</p>
            <form method="post" class="m-3">
                <div class="col-9">
                    <label class="ms-5 mb-1">Fullname</label>
                    <input type="text" class="form-control ms-5 " name="fname" value="<?php echo $row['fullname']; ?>">
                </div>
                <div class="col-9">
                    <label class="ms-5 mb-1">Username</label>
                    <input type="text" class="form-control ms-5 " name="uname" value="<?php echo $row['username']; ?>">
                </div>
                <div class="col-9">
                    <input type="hidden" class="form-control ms-5 " name="email" value="<?php echo $row['email']; ?>">
                </div>
                <div class="col-9">
                    <input type="hidden" class="form-control ms-5 " name="password"
                        value="<?php echo $row['password']; ?>">
                </div>
                <div class="col-9">
                    <label class="ms-5 mb-1">Contact</label>
                    <input type="text" class="form-control ms-5 " name="contact" value="<?php echo $row['contact']; ?>">
                </div>
                <div class="col-9">
                    <label class="ms-5 mb-1">Address</label>
                    <input type="text" class="form-control ms-5 " name="address" value="<?php echo $row['address']; ?>">
                </div>
                <div class="col-9 mt-2">
                    <button type="submit" class="btn btn-primary ms-5" name="update">Update</button>
                </div>
            </form>
            <?php
                   if(isset($_POST['update']))
                     {
                       $fname=$_POST['fname'];
                       $uname=$_POST['uname'];
                       $email=$_POST['email'];
                       $cont=$_POST['contact'];
                       $address=$_POST['address'];
                       $pwd=$_POST['password'];

                       $upquery = "update users set fullname='$fname',username='$uname',
                       contact='$cont',address='$address' 
                       where email='$email' and password='$pwd'; ";
                       $result=mysqli_query($con,$upquery);
                       if($result){
                         header('location:welcome.html');
                       }
                       else{
                        die(mysqli_error($con));
                       }
                     }  
            ?>
        </div>

    </div>

    <script src="js/bootstrap.min.js">
    </script>
</body>

</html>