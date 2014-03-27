<?php
$login_session='Database Test';
?>

<body>
<h1>Welcome <?php echo $login_session; ?> </h1>
</body>


<?php
include("config.php");
 
$query="SELECT * FROM login";
$result = mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

echo "<b> <center>Database Output</center> </b> <br> <br>";

$i=0;
while ($i < $num) {
		$field1_name = mysql_result($result,$i,"loginID");
		$field2_name = mysql_result($result,$i,"userID");
		$field3_name = mysql_result($result,$i,"password");
		$field4_name = mysql_result($result,$i,"timeIn");
		$field5_name = mysql_result($result,$i,"timeOut");
		
		$tableDataArray[$i] = array($field1_name,$field2_name,$field3_name,$field4_name,$field5_name);
        
		echo "<b> $field1_name $field2_name $field3_name $field4_name $field5_name </b> <hr><br>";
$i++;

}

echo json_encode($tableDataArray);

?>



 