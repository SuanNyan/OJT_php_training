<?php
session_start();
require('userinfoconnect.php');
if(isset($_POST['btnlogin']))
{
$mail = $_POST['txtemail'];
$pass = $_POST['txtpass'];
$day = $_POST['txtday'];
$check = "SELECT * FROM user where email='$mail' and userpassword='$pass'";
$checkrun=mysqli_query($connection,$check);
$checkrow = mysqli_num_rows($checkrun);
$checkarray=mysqli_fetch_array($checkrun);
$userno=$checkarray['user_no'];
if ($checkrow < 1) 
{
    echo "<script>window.alert(There is no account like this.')</script>";
    echo "<script>window.location='index.php'</script>";
}
else
{   
  $selects="SELECT * from userlogin where user_no='$userno' and daylogin='$day'";
  $runs=mysqli_query($connection,$selects);
  $rows=mysqli_num_rows($runs);
  $arrays=mysqli_fetch_array($runs);
    $id = $arrays['userloginid'];
    if ($arrays['user_no'] != $userno && $arrays['daylogin'] != $day) {
      $inst = "INSERT INTO `userlogin`(`user_no`, `logintime`, `daylogin`) 
  VALUES('$userno','1','$day')";
      $runagain = mysqli_query($connection, $inst);
    }
    else{
      $insts = "UPDATE `userlogin`
                SET logintime=logintime+1
                WHERE user_no='$userno' and userloginid='$id'";
      $runagains = mysqli_query($connection, $insts);
    }
    $_SESSION['user_no']=$userno;
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
 <input type="text" name="txtday" value="<?php echo date('w');?>" hidden><br>
  password:<input type="password" name="txtpass"><br>
  <button type="submit" name="btnlogin">Log In</button>
  </form>
</body>
</html>
