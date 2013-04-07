<?php

session_start();

include "kookoophp/response.php";
include "lib/config.inc.php";
include "array.php";


$r = new Response("start"); // response handler
$cd = new CollectDtmf();
$cd->setTermChar("#");
$cd->setTimeOut("25000");
/*
$res=$dbh->Query("Select * from user WHERE aadhar='12345' ");

 	 if(mysql_num_rows($res)>=1){ echo "yesy";
 	 		//$r->addPlayText("Welcome valid aadhar user");
 	 }else{ echo "no";	
 	 		//$r->addPlayText("Sorry, The aadhar no provided is not present in the database");
 	 		//$r->addPlayText("Please register at our website first. Ending call");
 	 		//$r->addHangup();
			//$r->send();

 	 }

*/
if($_REQUEST['event']=="NewCall" || $_SESSION['error']==1) // Receiving New Call
{
	$r->addPlayText("Welcome to 12th plan Agricultural app");
	
	$cd->setMaxDigits("12");
	$cd->addPlayText("Please enter your 12 digit Aadhar number to continue");
	$r->addCollectDtmf($cd);
	$_SESSION['state'] = "gotid";
	$r->send();

}else
if ($_REQUEST['event']=="GotDTMF" && $_SESSION['state'] == "gotid") // Receiving aadhar id
{
	$aadhar_num = $_REQUEST['data'];
  if($aadhar_num!='')
  {

 	$res=$dbh->Query("Select * from user WHERE aadhar='$aadhar_num' ");

 	 if(mysql_num_rows($res)>=1){ 
 	 	$row= $dbh->FetchRow($res);
 	 		$r->addPlayText("Welcome ".$row['name']);
 	 		$_SESSION['error']=0;
 	 		$_SESSION['state']="menu_show";
 	 		$_SESSION['id']=0;
 	 		$_SESSION['aadhar']= $aadhar_num;
 	 		$_SESSION['district'] = $row['district'];
 	 		$r->send();

 	 }else{ 	
 	 		$r->addPlayText("Sorry, The aadhar no provided is not present in the database");
 	 		$r->addPlayText("Please register at our website first or try again");
 	 		$_SESSION['error']=1;
			$r->send();
 	 }
  }else $_SESSION['error']=0;

}/*else
if ($_SESSION['state']=="main-menu") // Playing Main Menu
{
	$r->addPlayText("Press 1 to hear weather forcast");
	$r->addPlayText("Press 2 to submit information");
	$r->addPlayText("Press 3 to hear current commodity prices");
	$cd->addPlayText("Press 0 to exit");
	$cd->setMaxDigits("1");
	$r->addCollectDtmf($cd);
	$_SESSION['state']="main-menu_i";
	$r->send();
}else
if ($_REQUEST['event']=="GotDTMF" && $_SESSION['state']=="main-menu_i") // Analysing Main Menu Input 
{
	$choice = $_REQUEST['data'];
	if($choice==1) $_SESSION['state'] ="first_level1";
	else if($choice==2) $_SESSION['state']="first_level2";
	else if($choice==3) $_SESSION['state']="first_level3";
	else if($choice==0) $r->addHangup();
	else $_SESSION['state']="main-menu";
	$r->send();
}else
if($_SESSION['state']=="first_level1")// Playing first level menu 1
{
	$r->addPlayText("Welcome to First Level Menu 1");
	$cd->addPlayText("Press 0 to return to previous Menu");
	$r->addCollectDtmf($cd);
	$_SESSION['state']="first_level1_i";
	$r->send();




}else
if($_SESSION['state']=="first_level2") // Playing first level menu 2
{
	$r->addPlayText("Welcome to First Level Menu 2");
	$cd->addPlayText("Press 0 to return to previous Menu");
	$r->addCollectDtmf($cd);
	$_SESSION['state']="first_level2_i";
	$r->send();



}else
if($_SESSION['state']=="first_level3")// Playing first level menu 3
{
	$r->addPlayText("Welcome to First Level Menu 3");
	$cd->addPlayText("Press 0 to return to previous Menu");
	$r->addCollectDtmf($cd);
	$_SESSION['state']="first_level3_i";
	$r->send();



}*/
else
if ($_SESSION['id']>=0 && $_SESSION['state']=="menu_show") // Playing Menu Choices
{
		if(count($arr[$_SESSION['id']]['child'])>=1)
	{
			foreach ($arr[$_SESSION['id']]['child'] as $node)
		  { 
		  	$r->addPlayText($arr[$node]['name']);
		  		  	
		  }
		  $cd->setMaxDigits("1");
		  $cd->setTimeOut("7000");

		  	$r->addCollectDtmf($cd);  
		  $_SESSION['state']="menu_listen";
	}else
	{	if($_SESSION['var']!=10 && $_SESSION['var'] !=11)$_SESSION['var']= $arr[$_SESSION['id']]['var'];
		include "scripts/".$arr[$_SESSION['id']]['script'];
		

	}

  
  $r->send();



}else


if ($_SESSION['id']>=0 && $_SESSION['state']=="menu_listen")  // Analysing Menu Choices
{
	$id=$_REQUEST['data'];
	if($id!='')
	{
		if($id==0 && $_SESSION['id']==0) $r->addHangup();
		else if($id==0) $_SESSION['id']=$arr[ $_SESSION['id'] ]['pid'];
		else if($id <limit && $id >=0 ) $_SESSION['id']= $arr[$_SESSION['id']]['child'][$id-1];		
		else $r->addPlayText("Sorry, Invalid choice. PLease try again");
	}

	$_SESSION['state']= "menu_show";
	$r->send();
}






?>
