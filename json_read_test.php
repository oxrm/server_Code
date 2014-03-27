<?php
$login_session='Database Send Data Test';
?>


<?php
include("config.php");
  
  
echo $_REQUEST['key'];
echo "<Br>";
echo $_REQUEST['key2'];
echo "<Br>";
echo $_REQUEST['data'];
echo "<Br>";
echo $_REQUEST['bs'];
echo "<Br>";
  
echo json_decode($_REQUEST['bs']); 
$data = "Hello Second World";
echo $data;

//echo json_decode($_POST['data']);
//$json = json_decode($_POST['data']);
//echo $json;

?>



 