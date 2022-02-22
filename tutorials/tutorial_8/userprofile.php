<?php
require('userinfoconnect.php');
session_start();
$mail = $_SESSION['email'];
$select="SELECT * from user where email='$mail'";
$run=mysqli_query($connection,$select);
$row=mysqli_num_rows($run);
$array=mysqli_fetch_array($run);

if(isset($_POST['btnlogout']))
{
  session_start();
  session_unset();
  session_destroy();
  header('Location: index.php');
  exit();
}
elseif(isset($_POST['btndelete']))
{
  $mail = $_SESSION['email'];
  $delete="DELETE FROM user WHERE email='$mail'";
  $deleterun=mysqli_query($connection,$delete);

  if($deleterun)
  {
    echo "<script>window.alert('Success : You have parmently deleted your account of this website. ')</script>";
    echo "<script>window.location='index.php'</script>";
  }
  else
  {
    echo "<p>Error in Account Delete!" . mysqli_error($connection) . "</p>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>userprofile</title>
</head>
<body>
   <form action="userprofile.php" method="POST" enctype="multipart/form-data"> 
 name:<label><?php echo  $array['username'] ?></label><br>
 email:<label><?php echo  $array['email'] ?></label><br>
 phone:<label><?php echo  $array['phone'] ?></label><br>
 address:<label><?php echo  $array['address'] ?></label><br>
 <a href="userupdate.php?<?php echo $array['email']?>"><input type="button" value="Update Profile"></a>
  <button type="submit" name="btndelete">Delete</button><br>
  <button type="submit" name="btnlogout">Log out</button>
  </form>
</body>
</html>
