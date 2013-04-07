<?php 
			  $query="SELECT `aadhar` FROM `user_crop` WHERE `aadhar`='".$_SESSION['aadhar']."'" ;
			  $result = mysql_query($query);
			  $row = mysql_fetch_assoc($result);
			
			 if (!$row)
				{
					
					echo "<h4>You have not entered details about crop </h4>" ; 
				}
			else
				{
					bug($row);
				}
?>
