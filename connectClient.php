<?php
//CSC505- Advance Software Engineer 
//Prof Joan Peckham
//Class Project : FH-Mobile App For Android
//Team Members: 
//Prepared by
//Omar Rivera
//Andrew Poirier
//Daven Amin
//Rick Rejeleene

//prevents caching
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: post-check=0, pre-check=0",false);
session_cache_limiter();

session_start();

//clear session variables
session_unset();

//check to see if cookies are already set, remember me
//if ((!$username) || (!$password))
//{
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

//}

//if username or password is blank, send to errorlogin.html
if ((!$username) || (!$password)) 
{

	//header("Location:errorlogin.html");
    $invalid_text = "Invalid_Data";
	echo json_encode($invalid_text);
	exit;
	
}

//require the config file
require ("connectToDatabase.php");

//Define user table name
$table_name ="user";

//build and issue the query
$sql ="SELECT * FROM $table_name WHERE userID = '$username' AND Password = '$password'";
$result = @mysql_query($sql,$bd) or die(mysql_error());

//get the number of rows in the result set
$num = mysql_num_rows($result);

//set session variables if there is a match
if ($num != 0) 
{
//require the workout file
require ("getWorkoutsForUser.php");
require ("TrainerData.php");


	while ($sql = mysql_fetch_object($result)) 
	{
 	
    $_SESSION['Balance'] 	    = $sql -> Balance;
    $_SESSION['userID'] 		= $sql -> userID; 
    $_SESSION['DOB'] 	    	= $sql -> DOB;       
    $_SESSION['Height'] 		= $sql -> Height;
    $_SESSION['Weight']		    = $sql -> Weight;
    $_SESSION['Password'] 	    = $sql -> Password;
    $_SESSION['EmailAddress']   = $sql -> EmailAddress;
	$_SESSION['Name'] 		    = $sql -> Name;
	$_SESSION['Address'] 		= $sql -> Address;
	$_SESSION['CCNum'] 		    = $sql -> CCNum;
	$_SESSION['Type'] 		    = $sql -> Type; 
	$_SESSION['transID'] 		= $sql -> transID;
	$_SESSION['LoginID']        = $sql -> LoginID;
	$_SESSION['BalanceFlag']    = $sql -> BalanceFlag;

	}

require("BalanceCheck.php");	
$log_login = "1" ;
echo json_encode($_SESSION);

//log logins if turned on
	if ($log_login == "1")
	{
		include('loglogin.php');
	}
	
/* //	show if balance was deducted 
    if($balanceDeductedFlag == "yes")
	{
	  $balanceFlagText = "Balance Deducted";
	  echo json_encode($balanceFlagText);
	
	}
	
	//	show if balance was deducted 
     if($balanceDeductedFlag == "no")
	{
	  $balanceFlagText = "Balance Not Deducted";
	  echo json_encode($balanceFlagText);
	
	} */
	
	
} else {
	
//if username and password are not correct, redirect to errorlogin page

	//header("Location:errorlogin.html");
	
	$no_user_text = "No_User_Data";
	echo json_encode($no_user_text);
	exit;
}

?>