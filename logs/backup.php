<?

//prevents caching
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: post-check=0, pre-check=0",false);
session_cache_limiter();

session_start();

//require the config file
require ("../config.php");

//see if the user is an administrator
if (ucfirst($_SESSION[authority]) != "Administrator")
{
echo "<P>You do not have permissions to view this page.</P>";
echo "<P><a href=\"../errorlogin.html\">Try Logging in as an Administrator.</a></p>";
exit;
}

$when = date("mdHi");
$startfile = "logbak_";
$newfile = "$startfile$when";
$source = "new.php";
$dest = "log.php";

$oldname = "log.php";
$newname = "$newfile.php";


if (rename($oldname, $newname))
{
	if ($msg = "Renamed $oldname<br/>as $newname")
{
	if (copy($source, $dest))
	{
		$msgii = "The Current Log<br/>has been Backed-Up<br/><br/>The Back Up File is Named<br/>$newname";
	}
	else
	{	
		$msgii = "Unable to copy $source to $dest";
	}
}}
else
{
	$msg = "Unable to rename $oldname to $newname";
}

if ($msg = "Renamed $oldname<br/>as $newname")
{
	if (copy($source, $dest))
	{
		$msgi = "Copied $source<br/>to $dest";
	}
	else
	{	
		$msgi = "Unable to copy $source to $dest";
	}
}
chmod("log.php", 0666);  // octal;


echo "<P><a href=\"archive.php\">Continue</a></p>";

?>

<html>

<head><title>Backup Log</title><head>
<body>

<?php 

echo ("$msgii");
?>
</body>
</html>