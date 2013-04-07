<?php 
	if ($_SESSION['loggedin']==1 )
		{
			include "page.php" ; 
	}
	else { echo "<h3>YOu are not authorised to view this page </h3>" ; }
?>
