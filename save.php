<?php

if(isset($_GET['person']))
{
	
	
	  $pol=mysqli_connect('localhost','root','','losowanie');
   
    	if(isset($p1))
    	{
    
           $pyt="INSERT INTO los (cytat) VALUES ('$p1')";
           $rez=mysqli_query($pol,$pyt);
           if($rez)
           {
           	echo "Udało ci się";
           }
           else
           {
           	echo "Nie udało się tobie";
           }
           
	}
  mysqli_close($pol);
}
?>