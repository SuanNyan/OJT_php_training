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
  $txtpassone = $_POST['txtpassone'];
  $txtpasstwo = $_POST['txtpasstwo'];
  if($txtpassone!=$txtpasstwo)
  {
    echo "<script>window.alert('Your new password does not match with the second password.')</script>";
  }
  else {
    $inst = "UPDATE `user` 
  SET userpassword='$txtpassone'
WHERE email='$mail'";
    $runagain = mysqli_query($connection, $inst);
    if ($runagain) {
      echo "<script>window.alert('You updated your password. ')</script>";
      echo "<script> window.location('http://localhost/tutorials/tutorial_10/index.php'')</script>";
    }
    else {
      echo "<script>window.alert('There is an error in website. Please retry again. ')</script>";
      echo "<script> window.location('index.php')</script>";
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
   <form action="updatepassword.php" method="POST" enctype="multipart/form-data"> 
  password:<input type="text" name="txtpassone" value="<?php echo $array['userpassword'] ?>"><br>
  confirm password:<input type="text" name="txtpasstwo" value="<?php echo $array['userpassword'] ?>"><br>
  <button type="submit" name="btnupdate">Update</button>
  <button type="reset">Cancel</button>
  <a href='http://localhost/tutorials/tutorial_10/index.php'><input type='button' value='Back to login'></a>
  </form>
</body>
</html>