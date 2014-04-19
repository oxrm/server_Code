<?php

//prevents caching
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: post-check=0, pre-check=0",false);
session_cache_limiter();

session_start();

//require the config file
require ("config.php");

//see if the user is an administrator
//if (ucfirst($_SESSION[authority]) != "Administrator")
//{
//echo "<P>You do not have permissions to view this page.</P>";
//echo "<P><a href=\"../errorlogin.html\">Try Logging in as an Administrator.</a></p>";
//exit;
//}

//make the connection to the database
//$connection = @mysql_connect($server, $dbusername, $dbpassword) or die(mysql_error());
$db = @mysql_select_db($mysql_database,$bd)or die(mysql_error());

//Define user table name
$table_name ="user";

// Define user ID
 $userID =  $_REQUEST['userID'];
 
//make query to database
$sql ="SELECT * FROM $table_name WHERE userID = '$userID' ";

$result = @mysql_query($sql,$bd) or die(mysql_error());

//get the number of rows in the result set
$num = mysql_num_rows($result);


//print a message or redirect elsewhere,based on result
if ($num != 0){

$user_exists = "User_Exists";
echo json_encode($user_exists);
exit;

}

else{

   	$Balance	  =  $_REQUEST['Balance'] ;
    $DOB  		  =  $_REQUEST['DOB']; 	    	       
    $Height 	  =  $_REQUEST['Height'];
    $Weight       =  $_REQUEST['Weight'];		     
    $Password     =  $_REQUEST['Password']; 	    
    $EmailAddress =  $_REQUEST['EmailAddress'] ;  
	$Name         =  $_REQUEST['Name'];
	$Address      =  $_REQUEST['Address'];
	$CCNum  	  =  $_REQUEST['CCNum'] ;
	$Type 		  =  $_REQUEST['Type']; 		   
	$transID      =  $_REQUEST['transID'];
	$LoginID 	  =  $_REQUEST['LoginID'];

$sql = "INSERT INTO $table_name VALUES('$Balance', '$userID', '$DOB', '$Height', '$Weight','$Password', '$EmailAddress', '$Name', '$Address', '$CCNum', '$Type', '$transID', '$LoginID' )";
$result = @mysql_query($sql,$bd) or die(mysql_error());

$user_added = "User_added";
echo json_encode($user_added);
exit;
}

?>

