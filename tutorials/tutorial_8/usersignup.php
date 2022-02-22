<?php
require('userinfoconnect.php');
if(isset($_POST['btnsignup']))
{
$mail = $_POST['txtemail'];
$pass = $_POST['txtpass'];
$name = $_POST['txtname'];
$phone = $_POST['txtphone'];
$address = $_POST['txtaddress']; 

$check = "SELECT * FROM user WHERE email='$mail' and userpassword='$pass'";
$checkrun=mysqli_query($connection,$check);
$checkrow = mysqli_num_rows($checkrun);
$checkarray = mysqli_fetch_array($checkrun);
if ($checkrow > 0) 
{
echo "<script>window.alert('You already have an account. Please go to the Login Page.')</script>";
echo"<script> window.location('index.php')</script>";
}
else
{
$inst="INSERT INTO `user`(`username`, `email`, `userpassword`, `phone`, `address`) 
VALUES('$name','$mail','$pass','$phone','$address')";
$runagain=mysqli_query($connection,$inst);
if ($runagain) 
{
echo "<script>window.alert('You signed up successfully.Thanks for your sign up. ')</script>";
echo"<script> window.location('userprofile.php')</script>";
}
else
{
   echo "<script>window.alert('There is an error in website. Please retry again. ')</script>";
echo"<script> window.location('usersignup.php')</script>";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial8</title>
</head>
<body>
   <form action="usersignup.php" method="POST" enctype="multipart/form-data"> 
   Name:<input type="text" name="txtname"><br>
 email:<input type="email" name="txtemail"><br>
  password:<input type="password" name="txtpass"><br>
  phone:<input type="text" name="txtphone"><br>
  address:<textarea name="txtaddress"></textarea><br>
  <button type="submit" name="btnsignup">Sign Up</button>
  </form>
</body>
</html>
