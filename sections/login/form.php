

<?php 

$suc =0 ;
if($_GET['register']){
if(isset($_REQUEST['fname']) || isset($_REQUEST['city']) || isset($_REQUEST['state']) || isset($_REQUEST['district']) || isset($_REQUEST['address']) || isset($_REQUEST['password']) || isset($_REQUEST['phone']) || isset($_REQUEST['aadhar']))
{
  $fname   =stripslashes($_REQUEST['fname']);
  $city    =stripslashes($_REQUEST['city']);
  $state   =stripslashes($_REQUEST['state']);
  $district=stripslashes($_REQUEST['district']);
  $address =stripslashes($_REQUEST['address']);
  $phone   =stripslashes($_REQUEST['phone']);
  $aadhar  =stripslashes($_REQUEST['aadhar']);
  $password=stripslashes($_REQUEST['password']);
  $error=0 ;
  if($city == " " || $city==""  )
    {
      bug("Enter valid city " );
      $error=1 ;
    }
  if($state== " " || $state=="")
    {
      bug("Enter value for state ");
      $error=1 ;
    }
  if($district== " " || $district=="")
    {
      bug("Enter value for district ");
      $error=1 ;
    }
  if($phone== " " || $phone=="")
    {
      bug("Enter value for phone number  ");
      $error=1 ;
    }
  if($fname== " " || $fname=="")
    {
      bug("Enter value for first name ");
      $error=1 ;
    }
  if($address== " " || $address=="")
    {
      bug("Enter value for address ");
      $error=1 ;
    } 
  if($password== " " || $password=="")
    {
      bug("Enter value for password ");
      $error=1 ;
    }
    $aadhar=$aadhar ;
    if ($error == 0 ) 
    {
 

       $pass=$password;
       $query="INSERT INTO `user` ( `name`, `aadhar`, `add`, `city`, `district`, `state`, `password`)
        VALUES ('".$fname."','".$aadhar."','".$address."','".$city."','".$district."','".$state."','".$pass."')";
	
      $err=" " ;
      $suc=1;
        if(mysql_query($query) == FALSE)
              {
                  $error=mysql_error() ; 
		 
                  $error =$error+"In Input set ";
                  $err=$err." ".$error ;
                  $suc=0 ; 
              }
              if ($suc == 0 ) 
              {
                bug("Error in Inserting <br/>Username already taken <br/>  ".$err ) ; 
              }     
    }
}

if($suc != 0 )
bug("<h4>Registered Successfully !! Please login to proceed !! </h4>") ; 
}
 ?>

<form id='register' action='http://hack-12-plan.herokuapp.com/?pid=login&register=1' method='POST'  accept-charset='UTF-8'>
  <fieldset >
    <legend>Register user</legend>
    <div class="row">
      <div class="span3">
        <label for='name' >Name*:</label><input type='text' name='fname' id='name' maxlength="50"/>
        <label for='Adress' >Address*:</label><input type='text' name='address' id='name' maxlength="50"/>
	<label for='Adress' >City *:</label><input type='text' name='city' id='name' maxlength="50"/>
	<label for='Adress' >State*:</label><input type='text' name='state' id='name' maxlength="50"/>
	
      </div>
      <div class="span3">
	<label for='Adress' >District*:</label><input type='text' name='district' id='name' maxlength="50"/>
        <label for='email'>Phone number*:</label><input type='text' name='phone' id='email' maxlength="50"/>
        <label for='name' >Aadhar number*: </label><input type='text' name='aadhar' id='name' maxlength="50"/>
        <label for='password'>Password*:</label><input type='password' name='password' id='password' maxlength="50"/>
        
      </div>
    </div>
    <input type='submit' name='Submit' value='Submit' />
  </fieldset>
</form>



