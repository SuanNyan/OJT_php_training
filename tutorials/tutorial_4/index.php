<?php
session_start();
if(isset($_POST['btnsubmit'])){
$txtemail = $_POST['txtmail'];
$txtpass = $_POST['txtpass'];
$_SESSION["email"] = $txtemail;
$_SESSION['pass'] = $txtpass;
echo "<script>window.location='logout.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_4</title>
</head>
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
  Mail:<input type="email" name="txtmail"><br>
  Password:<input type="password" name="txtpass"> <br>
  <button type="submit" name="btnsubmit">Log In</button>
  </form>
</body>
</html>
