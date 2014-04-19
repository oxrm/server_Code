<?php
//Initialize Database connection Info.

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "fh_db";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");


//length of time the cookie is good for - 7 is the days and 24 is the hours
//if you would like the time to be short, say 1 hour, change to 60*60*1
$duration = time()+(60*60*1);


//Change to "0" to turn off the login log
$log_login = "0";


//sets the time to EST
$zone=3600*-5;


?>