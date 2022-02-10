<?php
include 'dbcon.php';

if(isset($_POST['login'])){
    $userid=$_POST['user'];
    $pwd=$_POST['pass'];
    $query = "select username,email,password from users where password='$pwd' and
    username='$userid' or email='$userid'";
    $result = mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
    
  $uname=$row['username'];
  $email=$row['email'];
  $password=$row['password'];

if($userid == $uname ||$userid==$email && $pwd==$password){
     header('location:welcome.html');
     echo "<div class='alert alert-success'>Login Successfull</div>";
}else{
    echo "<script>alert('Please Check the Email,username and Password is Correct you have entered');</script>";
    header('location:homepage.html');

} 
}
else{
    echo "<script>alert('Please Check the Email,username and Password is Correct you have entered');</script>";
}

?>