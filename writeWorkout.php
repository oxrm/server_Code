<?php

//Define user table name
$table_name_4 ="workout_db";
$table_name_5 ="activities"; 

// Define user ID
 $userID =  $_REQUEST['userID'];
{

   	$StartDate	  =  $_REQUEST['StartDate'] ;
   // $EndDate  	  =  $_REQUEST['EndDate']; 	    	       
    $Frequency 	  =  $_REQUEST['Frequency'];
   // $Metric       =  $_REQUEST['Metric'];		     
    $Description  =  $_REQUEST['Description']; 	    


$sql4 = "INSERT INTO $table_name_4 VALUES('','', '$StartDate', '100', '','$userID', '', '', '', '' )";
$result4 = @mysql_query($sql4,$bd) or die(mysql_error());

$sql5 = "INSERT INTO $table_name_5 VALUES('100', '', '$Description', '', '','$userID', '' )";
$result5 = @mysql_query($sql5,$bd) or die(mysql_error());


$Workout_added = "Workout_Added";
echo json_encode($Workout_added);
exit;
}

?>

