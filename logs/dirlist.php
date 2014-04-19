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

	$dirname = "../logs/";


	$dir = opendir($dirname);

	echo ("<b>Visitor Logs</b><hr/><br/>");
	
	while( false != ( $file = readdir($dir) ) )
	{
	  if( ($file != ".") and ( $file != "..") and (preg_match("/log/i","$file")))
	  {
	   			echo "<a href=\"$file\" target=\"main\"><li>$file\r</a><br/>";

	  }
	}

	closedir($dir);
?>

<html><head>

<title>Listing directory</title><head>
<body>
<br/>
<hr/>
<p><a href="backup.php">


<span style="font-variant: small-caps"><li>Backup Now</span></a>
</p>
</body></html>