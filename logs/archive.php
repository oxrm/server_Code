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
<html><head>

<title>Listing directory</title><head>
<body>
Visitor Log Archive<br/>
<hr/>
<ul>
	<li><a href="dirlist.php">Archived Logs</a></li>
</ul>
<hr/>
<p><a href="backup.php">


<span style="font-variant: small-caps"><li>Backup Now</span></a>
<p>&nbsp;</p>
<p>ARIN WhoIs Search</p>
</p>
<form METHOD="POST" ACTION="http://ws.arin.net/cgi-bin/whois.pl" target="_blank">
               
    <p align="left"><font FACE="arial,verdana,helvitca" SIZE="2">Search for :</font> 
      <input TYPE="text" NAME="queryinput" SIZE="20">
      <input TYPE="submit" style="font-family: Tahoma">
      <input TYPE="reset" style="font-family: Tahoma" name="Clear" value="Clear"><br>
    </p>
    </form>
</body></html>