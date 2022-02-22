<?php
session_start();
require('userinfoconnect.php');
$mail = $_SESSION['email'];
$select="SELECT * from user where email='$mail'";
$run=mysqli_query($connection,$select);
$row=mysqli_num_rows($run);
$array=mysqli_fetch_array($run);
if(isset($_POST['btnupdate']))
{
  $mail = $_POST['txtemail'];
  $pass = $_POST['txtpass'];
  $name = $_POST['txtname'];
  $phone = $_POST['txtphone'];
  $address = $_POST['txtaddress']; 
  
  $inst="UPDATE `user` 
  SET username='$name',
   email='$mail',
   userpassword='$pass',
  phone='$phone',
  address='$address'
WHERE email='$mail'";
  $runagain=mysqli_query($connection,$inst);
  if ($runagain) 
  {
  echo "<script>window.alert('You updated your information. ')</script>";
  echo"<script> window.location('userprofile.php?')</script>";
  }
  else
  {
     echo "<script>window.alert('There is an error in website. Please retry again. ')</script>";
  echo"<script> window.location('usersignup.php')</script>";
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
   <form action="userupdate.php" method="POST" enctype="multipart/form-data"> 
   Name:<input type="text" name="txtname" value="<?php echo $array['username'] ?>"><br>
 email:<input type="email" name="txtemail" value="<?php echo $array['email'] ?>"><br>
  password:<input type="password" name="txtpass" value="<?php echo $array['userpassword'] ?>"><br>
  phone:<input type="text" name="txtphone" value="<?php echo $array['phone'] ?>"><br>
  address:<input type="text" name="txtaddress" value="<?php echo $array['address'] ?>"><br>
  <button type="submit" name="btnupdate">Update</button>
  <button type="reset">Cancel</button>
  </form>
</body>
</html>
