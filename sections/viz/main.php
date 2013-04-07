<?php 
	if ($_SESSION['loggedin']==1 )
		{
			include "viz.php" ; 
	}
	else { echo "<h3>YOu are not authorised to view this page </h3>" ; }
?>
