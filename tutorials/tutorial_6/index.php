<?php
if(isset($_POST['btnupload']))
{
    $allowfile = array('gif', 'png', 'jpg','jpeg','jfif');

  $filephoto=$_FILES['filephoto']['name'];
  $Folder="profile/";

  $filename=$Folder. $filephoto;
  $copied=copy($_FILES['filephoto']['tmp_name'],$filename);
  $path = pathinfo($filename, PATHINFO_EXTENSION);
  if(!$copied) 
  {                               
    echo "<label>There is an error while uploading.</label>";
    exit();
  }

  elseif (!in_array($path, $allowfile)){
    echo '<label>Your file type doesnot allow to upload in here.</label>';
  }
else{
    echo  $filephoto.' '."<br><label>Image File Uploaded.</label>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial6</title>
</head>
<body>
  <form action="index.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="filephoto"><br><br>
    <button type="submit" name="btnupload">Upload Photo</button>
  </form>
</body>
</html>
