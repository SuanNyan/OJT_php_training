<?php
if (isset($_POST['btnsubmit'])) { 
$input=$_POST['txtdata'];
require_once 'phpqrcode/qrlib.php';
$qrimgpath='img/';    
$file=$qrimgpath.uniqid().".png";
QRcode::png($input, $file, 'L', 10, 2);
echo "<center><img src='".$file."'></center>";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_7</title>
</head>
<body>
<form action="index.php" method="POST">
  Insert data for qr output:<input type="text" name="txtdata"><br>
  <button type="submit" name="btnsubmit">Generate QR Code</button>
  </form>
</body>
</html>
