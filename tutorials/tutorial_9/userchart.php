<?php
session_start();
require('userinfoconnect.php');
$userno= $_SESSION['user_no'];
$query = "SELECT * FROM userlogin where user_no='$userno'";
$result = mysqli_query($connection, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
$chart_data .= "{ logintime:'" . $row["logintime"] . "', daylogin:" . $row["daylogin"] . "}, ";
}
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Tutorial 9 </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Chart of period on Website</h2>
   <h3 align="center">Times of login to the website by the user</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:['daylogin'],
ykeys:['logintime'],
 labels:['logintime', 'daylogin'],
 hideHover:'auto',
 stacked:true
});
</script>