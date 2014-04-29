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

//Define user table name
$table_name_1 ="workout_db";
$table_name_2 ="activities";

//build and issue the query
$sql_1 ="SELECT * FROM $table_name_1 WHERE userID = '$username'" ;
$result_1 = @mysql_query($sql_1,$bd) or die(mysql_error());

//get the number of rows in the result set
$num_1 = mysql_num_rows($result_1);


$_SESSION['Activity'] = "[";


//set session variables if there is a match
if ($num_1 != 0) 
{
	while ($sql_1 = mysql_fetch_object($result_1)) 
	{
 	
    $actId	  = $sql_1 -> ActID;

	$sql_2 ="SELECT * FROM $table_name_2 WHERE ActID = '$actId'";
    $result_2 = @mysql_query($sql_2,$bd) or die(mysql_error());

		//get the number of rows in the result set
		$num = mysql_num_rows($result_2);

		//set session variables if there is a match
		if ($num != 0) 
		{
			while ($sql_2 = mysql_fetch_object($result_2)) 
			{
			$temp_Results = '"';
			$temp_Results .= $sql_2 -> Desc;
			$temp_Results .= '"';
			$_SESSION['Activity'] .= $temp_Results;	
			//$_SESSION['Activity'] .= ",";

			}
		} 
}
	
}
	

$_SESSION['Activity'] .= "]";

?>