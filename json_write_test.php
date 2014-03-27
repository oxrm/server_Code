<?php
$login_session='Write from Client To Database Test';
?>


<?php
include("config.php");
 
$query="SELECT * FROM login";
$result = mysql_query($query);
$num=mysql_numrows($result);
mysql_close();


$i=0;
while ($i < $num) {
		$field1_name = mysql_result($result,$i,"loginID");
		$field2_name = mysql_result($result,$i,"userID");
		$field3_name = mysql_result($result,$i,"password");
		$field4_name = mysql_result($result,$i,"timeIn");
		$field5_name = mysql_result($result,$i,"timeOut");
		
		$tableDataArray[$i] = array($field1_name,$field2_name,$field3_name,$field4_name,$field5_name);
        
		
$i++;

}

echo json_encode($tableDataArray);

?>



 