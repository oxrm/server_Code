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
$table_name_1 ="trainer";

//build and issue the query
$sql_3 ="SELECT * FROM $table_name_1 WHERE userID = '$username'" ;
$result_3 = @mysql_query($sql_3,$bd) or die(mysql_error());

//get the number of rows in the result set
$num_3 = mysql_num_rows($result_3);


$_SESSION['user_Trainers'] = "[";


//set session variables if there is a match
if ($num_3 != 0)
 
{
$index = 0;
	while ($sql_3 = mysql_fetch_object($result_3)) 
	{

		{
			{
			$temp_Results = '"';
			$temp_Results .= $sql_3 -> TrainerName;
			$temp_Results .= '"';
			$_SESSION['user_Trainers'] .= $temp_Results;	
			if ($index < $num_3 - 1)
			{
			$_SESSION['user_Trainers'] .= ",";
				
			}
			$index = $index +1;
			}
		} 
}
	
}
	
$_SESSION['user_Trainers'] .= "]";

?>