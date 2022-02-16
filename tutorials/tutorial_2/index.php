<?php  
for($i=11; $i>=1; $i--)  
{  
if($i%2 != 0)  
{  
for($j=11; $j>=$i; $j--)  
{  
echo " * ";  
}  
echo "<br>";  
}  
}  
for($i=2; $i<=11; $i++)  
{  
 if($i%2 != 0)  
{  
 for($j=11; $j>=$i; $j--)  
{  
echo "  *  ";  
}  
echo "<br>";  
}  
}  
?> 
