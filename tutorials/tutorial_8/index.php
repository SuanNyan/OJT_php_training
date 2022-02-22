<?php
session_start();
require('userinfoconnect.php');
if(isset($_POST['btnlogin']))
{
$mail = $_POST['txtemail'];
$pass = $_POST['txtpass'];
$check = "SELECT * FROM user where email='$mail' and userpassword='$pass'";
$checkrun=mysqli_query($connection,$check);
$checkrow = mysqli_num_rows($checkrun);
$checkarray=mysqli_fetch_array($checkrun);

if ($checkrow < 1) 
{
    echo "<script>window.alert(There is no account like this.')</script>";
    echo "<script>window.location='index.php'</script>";
}
else
{   
    $_SESSION['username']=$checkarray['username'];
    $_SESSION['email']=$checkarray['email'];
    $_SESSION['userpassword']=$checkarray['userpassword'];
    $_SESSION['address']=$checkarray['address'];
    $_SESSION['phone']=$checkarray['phone'];  
    echo "<script>window.alert('You Login to the system successfully.')</script>";
    echo "<script>window.location='userprofile.php'</script>";
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
   <form action="index.php" method="POST" enctype="multipart/form-data"> 
 email:<input type="email" name="txtemail"><br>
  password:<input type="password" name="txtpass"><br>
  <button type="submit" name="btnlogin">Log In</button>
  </form>
</body>
</html>
