<?php

if(isset($_POST['btnread']))
{
  $allowfile = array('txt', 'doc', 'csv','pdf','xlsx');

  $fileread=$_FILES['fileread']['name'];

  $path = pathinfo($fileread, PATHINFO_EXTENSION);

  if (!in_array($path, $allowfile)){
    echo '<label>Your file type doesnot allow to upload in here.</label>';
  }
else {
    $myfile = fopen("$fileread", "r") or die("Unable to open file!");
    echo fread($myfile, filesize("$fileread"));
    fclose($myfile);  }
}

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_5</title>
</head>
<body>
<form action="index.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="fileread"><br><br>
    <button type="submit" name="btnread">Read File</button>
  </form>
</body>
</html>
