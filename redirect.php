<?php

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
	exit;
}

//require the config file
require ("config.php");


$table_name ="user";

//build and issue the query
$sql ="SELECT * FROM $table_name WHERE userID= '$username' AND Password = '$password'";
$result = @mysql_query($sql,$bd) or die(mysql_error());

//get the number of rows in the result set
$num = mysql_num_rows($result);

//set session variables if there is a match
if ($num != 0) 
{
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

	}
echo json_encode($_SESSION);

//log logins if turned on
	if ($log_login == "1")
	{
		include('loglogin.php');
	}
	
} else {
	
//if username and password are not correct, redirect to errorlogin page

	//header("Location:errorlogin.html");
	
	$no_user_text = "No_User_Data";
	echo json_encode($no_user_text);
	exit;
}

?>

<head><title>Redirect</title></head>