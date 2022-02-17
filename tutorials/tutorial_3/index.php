<?php
if(isset($_POST['btncal']))  {  
$dateOfBirth = $_POST['txtdate'];
$newdob = strtotime($dateOfBirth);
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_3</title>
</head>
<body>
  <form action="index.php" method="post" enctype="multipart/form-data">
  Choose the birthdate: <input type="date" name="txtdate"><br>
  <button type="submit" name="btncal">Calculate</button><br>
  <label><?php echo 'Your age is '.$diff->format('%y').'years old'; ?></label>
  </form>
</body>
</html>
