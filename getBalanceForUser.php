<?php
//CSC505- Advance Software Engineer 
//Prof. Joan Peckham
//Class Project : FH-Mobile App For Android
//Team Members: 
//Prepared by
//Omar Rivera
//Andrew Poirier
//Daven Amin
//Rick Rejeleene


$login_session='Database Test';
?>

<body>
<h1>Welcome <?php echo $login_session; ?> </h1>
</body>


<?php
include("connectToDatabase.php");
 
$query="SELECT * FROM bank";
$result = mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

echo "<b> <center>Bank Database Output</center> </b> <br> <br>";

$i=0;
while ($i < $num) {
		$field1_name = mysql_result($result,$i,"transID");
		$field2_name = mysql_result($result,$i,"userID");
		$field3_name = mysql_result($result,$i,"Date");
		$field4_name = mysql_result($result,$i,"Time");
		$field5_name = mysql_result($result,$i,"CurrentBalance");
		$field6_name = mysql_result($result,$i,"TransAmount");
		$field7_name = mysql_result($result,$i,"UpdateBalance");


		
		$tableDataArray[$i] = array($field1_name,$field2_name,$field3_name,$field4_name,$field5_name,$field6_name,$field7_name);
        
		echo "<b> $field1_name $field2_name $field3_name $field4_name $field5_name $field6_name $field7_name </b> <hr><br>";
$i++;

}

echo json_encode($tableDataArray);

?>



 