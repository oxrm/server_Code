<?php
$login_session='Database Test';
?>

<body>
<h1>Welcome <?php echo $login_session; ?> </h1>
</body>


<?php
include("config.php");
 
$query="SELECT * FROM user";
$result = mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

echo "<b> <center>User Database Output</center> </b> <br> <br>";

$i=0;
while ($i < $num) {
		$field1_name = mysql_result($result,$i,"Balance");
		$field2_name = mysql_result($result,$i,"userID");
		$field3_name = mysql_result($result,$i,"DOB");
		$field4_name = mysql_result($result,$i,"Height");
		$field5_name = mysql_result($result,$i,"Weight");
		$field6_name = mysql_result($result,$i,"Password");
		$field7_name = mysql_result($result,$i,"EmailAddress");
		$field8_name = mysql_result($result,$i,"Name");
		$field9_name = mysql_result($result,$i,"Address");	
		$field10_name = mysql_result($result,$i,"CCNum");
		$field11_name = mysql_result($result,$i,"Type");
		$field12_name = mysql_result($result,$i,"transID");
		$field13_name = mysql_result($result,$i,"LoginID");
		
		

		
		$tableDataArray[$i] = array($field1_name,$field2_name,$field3_name,$field4_name,$field5_name,$field6_name,$field7_name,$field8_name,$field9_name,$field10_name,$field11_name,$field12_name,$field13_name);
        
		echo "<b> $field1_name $field2_name $field3_name $field4_name $field5_name $field6_name $field7_name $field8_name $field9_name $field10_name $field11_name $field12_name $field13_name</b> <hr><br>";
$i++;

}

echo json_encode($tableDataArray);

?>