<?

session_start();

if (($_SESSION[username] != "") && ($_SESSION[password] != ""))
{
	header("Location:$_SESSION[redirect]");
	exit;
}

if(($username != "") && ($password != ""))
{
	header("Location:redirect.php");
	exit;
}


	header("Location:login.html");


?>
