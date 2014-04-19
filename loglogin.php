<?php

//open the file
$file = fopen("logs/log.html",  "a");

// Get remote address
$adr = $_SERVER['REMOTE_ADDR'];

//require config.php file
require('config.php');

//set the date and time
$time=gmdate("d M Y H:i", time() + $zone);

//write the date and time to the file
fwrite( $file, "<b>When:</b> $time<br/>" );


//if the IP the user is coming from isn't NULL
if( $adr != null)
{
	//write the IP address to the file
	fwrite( $file, "<b>IP Address:</b> $adr <br/>");
}

// Set user name
$user = $_SESSION['userID'] ; 
//write the username to the file
fwrite( $file, "<b>User:</b> $user <br/><br/>");

//close the file
fclose($file);

?>