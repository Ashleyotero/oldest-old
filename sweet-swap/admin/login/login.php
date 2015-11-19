<?
	session_unset();
	session_start();
	
	include("../cfg/config.php");
	
	$password = $_POST["password"];
	$username = $_POST["username"];
	
	$query_login		= "SELECT * FROM swap_authorize WHERE username = '$username' AND password = '".md5($password)."'";
	//echo "$query_login"; exit;
	$result_login		= mysql_query($query_login);
	$num_results_login	= mysql_num_rows($result_login);
	if($num_results_login != 0)
	{
		$_SESSION["authority"] = "Admin";
		header("Location: ../index2.php");
		exit;
	}
	else 
	{ 
		header("Location: ../index.php"); 
		exit; 
	}

?>