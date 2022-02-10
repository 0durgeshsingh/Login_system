<?php
include 'dbcon.php';
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $cont=$_POST['contact'];
    $address=$_POST['address'];
    $pwd=$_POST['password'];

    $query = "Insert into users (fullname,username,email,contact,address,password)
    values('$fname','$uname','$email','$cont','$address','$pwd')";
    $result=mysqli_query($con,$query);
    if($result){
      header('location:homepage.html');
    }
    else{
      die(mysqli_error());
    }
  }


?>