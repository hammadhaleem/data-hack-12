<div class="row">
<hr/>
<h3>Login Or SignUp </h3>
</hr>
</div><div class="row">
<div class="span3">
	<?php include "login.php" ; ?>
</div>
<div class="span9"><?php if($_SESSION['loggedin']!=1 )include "form.php" ; ?></div>
</div>
