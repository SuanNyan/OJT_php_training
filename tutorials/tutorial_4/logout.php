<?php
session_start();
$mail=$_SESSION['email'];
$pass=$_SESSION['pass'];
if(isset($_POST['btnlogout'])){
  session_unset();
  session_destroy();
echo "<script>window.location='index.php'</script>";
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout</title>
</head>
<body>
  <form action="logout.php" method="POST" enctype="multipart/form-data">
  <label><?php echo $mail;?></label><br>
  <label><?php echo $pass;?></label><br>
  <button type="submit" name="btnlogout">Log Out</button>
  </form>
</body>
</html>
