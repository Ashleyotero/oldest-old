<?
$username3 = $_POST['username'];
$password = $_POST['password'];

//prevents caching
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: post-check=0, pre-check=0",false);session_cache_limiter();session_start();

//clear session variables
session_unset();


//check to see if cookies are already set, remember me
if ((!$username) || (!$password))
{

$username = $_POST['username'];
$password = $_POST['password'];

}

//if username or password is blank, send to login page
if ((!$username) || (!$password)) 
{

	header("Location:".$login_error);
	exit;
}

//require the config file
require ("config.php");

@ $db = mysql_connect($server, $dbusername, $dbpassword) or die(mysql_error()); mysql_select_db($db_name);

//build and issue the query
if ($authority = "administrator") {
$query ="SELECT * from ".$table_name." WHERE username='$username3' AND password = '$password'";
$result = mysql_query($query);
$num_results = mysql_num_rows($result);

//set session variables if there is a match
if ($num_results != 0) {
	for ($i=0; $i <$num_results; $i++) {
		$_SESSION[username] 	= mysql_result($result,$i,"username");
		$_SESSION[password] 	= mysql_result($result,$i,"password"); 
		$_SESSION[authority] 	= mysql_result($result,$i,"authority");
	}

//log logins if turned on
	if ($log_login == "1")
	{
		include('loglogin.php');
	}

//redirects the user to the location in the database
	header("Location:".$login_success);
	
} else {
	
//if username and password are not correct, redirect to login page

	header("Location:".$login_error);
	exit;
}
} 
?>

<head><title>Redirect</title></head>