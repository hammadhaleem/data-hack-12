<div class="container">
<?php 
$flag=0;

 if(isset($_GET['pid']))
 	{
 	
 		if($flag == 0 )
 			include "".$_GET['pid']."/main.php" ; 
 		else
 			include "404/main.php" ; 
 		  
	}
 	else
 	{
 		if ($_SESSION['loggedin']==1)
			include "data/main.php" ;
		else
			include "default/main.php" ; 
 	}
?>
