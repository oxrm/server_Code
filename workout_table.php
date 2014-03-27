<?php
$login_session='Database Test';
?>

<body>
<h1>Welcome <?php echo $login_session; ?> </h1>
</body>


<?php
include("config.php");
 
$query="SELECT * FROM workout_db";
$result = mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

echo "<b> <center>Workout Database Output</center> </b> <br> <br>";

$i=0;
while ($i < $num) {
		$field1_name = mysql_result($result,$i,"StartTime");
		$field2_name = mysql_result($result,$i,"EndTime");
		$field3_name = mysql_result($result,$i,"date");
		$field4_name = mysql_result($result,$i,"ActID");
		$field5_name = mysql_result($result,$i,"WorkOutID");
		$field6_name = mysql_result($result,$i,"UserID");
		$field7_name = mysql_result($result,$i,"Balance");
		$field8_name = mysql_result($result,$i,"WorkTime");	
		$field9_name = mysql_result($result,$i,"Distance");
		$field10_name = mysql_result($result,$i,"Repetition");

		
		$tableDataArray[$i] = array($field1_name,$field2_name,$field3_name,$field4_name,$field5_name,$field6_name,$field7_name,$field8_name,$field9_name,$field10_name);
        
		echo "<b> $field1_name $field2_name $field3_name $field4_name $field5_name $field6_name $field7_name $field8_name $field9_name $field10_name</b> <hr><br>";
$i++;

}

echo json_encode($tableDataArray);

?>



 