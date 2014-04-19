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

?>
<title>Login Log</title><head>

