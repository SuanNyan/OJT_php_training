<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chess Board</title>
</head>
<body>
<h1>Tutorial 1 (Chess board in php)</h1>
   <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
      <?php
      for($row=1;$row<=8;$row++)
	  {
          echo "<tr>";
          for($column=1;$column<=8;$column++)
		  {
          $total=$row+$column;
          if($total%2==0)
		  {
          echo "<td height=25px width=25px bgcolor=#FFFFFF></td>";
          }
		  else
		  {
          echo "<td height=25px width=25px bgcolor=#000000></td>";
          }
          }
          echo "</tr>";
    }
          ?>
  </table>
</body>
</html>
