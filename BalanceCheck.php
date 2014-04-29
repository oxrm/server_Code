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

//build and issue the query
$sql ="SELECT * FROM $table_name_1 WHERE userID = '$username' AND ActID = 100";
$result = @mysql_query($sql,$bd) or die(mysql_error());

//get the number of rows in the result set
$num = mysql_num_rows($result);

//set session variables if there is a match
if ($num != 0) 
{
	while ($sql = mysql_fetch_object($result)) 
	{
 	
    $_SESSION['StartTime'] 	              = $sql -> StartTime;
    $_SESSION['EndTime'] 		          = $sql -> EndTime; 
    $_SESSION['Date'] 	    	          = $sql -> Date;       
    $_SESSION['ActID'] 		              = $sql -> ActID;
    $_SESSION['WorkOutID']		          = $sql -> WorkOutID;
    $_SESSION['UserID'] 	              = $sql -> UserID;
    $_SESSION['Balance']                  = $sql -> Balance;
	$_SESSION['WorkTime'] 		          = $sql -> WorkTime;
	$_SESSION['MinimumWorkOutTime'] 	  = $sql -> MinimumWorkOutTime;
	$_SESSION['Distance'] 		          = $sql -> Distance;
	$_SESSION['MinimumDistance'] 		  = $sql -> MinimumDistance; 
	$_SESSION['Repetition'] 		      = $sql -> Repetition;
	$_SESSION['MinimumRepetition']        = $sql -> MinimumRepetition;

	}
	
	//Check Logic
	if  ($_SESSION['Repetition'] < $_SESSION['MinimumRepetition']) 
	{

						//Define user table name
						$table_name_2 ="bank";

						//build and issue the query
						$sql ="SELECT * FROM $table_name_2 WHERE userID = '$username'";
						$result_2 = @mysql_query($sql,$bd) or die(mysql_error());

						//get the number of rows in the result set
						$num = mysql_num_rows($result_2);

						//set session variables if there is a match
						if ($num != 0) 
						{
							while ($sql_2 = mysql_fetch_object($result_2)) 
							{
							
							$_SESSION['transID'] 	              = $sql_2 -> transID;
							$_SESSION['userID'] 		          = $sql_2 -> userID; 
							$_SESSION['Date'] 	    	          = $sql_2 -> Date;       
							$_SESSION['Time'] 		              = $sql_2 -> Time;
							$_SESSION['Balance_2']		          = $sql_2 -> Balance;
							$_SESSION['TransAmount'] 	          = $sql_2 -> TransAmount;
							
							}

							 // $balanceFlagText_1 = "Balance Will Be Deducted";
							 // echo json_encode($balanceFlagText_1);
		
							 $tempBalance = $_SESSION['Balance_2'];	
		
	
							$sql3 = "update $table_name_2 SET Balance = ($tempBalance - 1) WHERE '$username'";
                            $result3 = @mysql_query($sql3,$bd) or die(mysql_error());
							

		
		
						} 


/*



	show if balance was deducted 
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
	
	
} 

else {
	
//if username and password are not correct, redirect to errorlogin page

	//header("Location:errorlogin.html");
	
	$no_user_text = "No_User_Data";
	echo json_encode($no_user_text);
	exit;
}
}
?>