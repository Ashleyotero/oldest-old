<?
session_start();
if($_SESSION["authority"] != "Admin"){header("Location: index.php");}
$page_id		= $_POST["page_id"];
$page_content	= $_POST["page_content"];
include("cfg/config.php");

$query_page		= "UPDATE swap_pages SET page_content = '$page_content' WHERE page_id = '$page_id'";
mysql_query($query_page);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="2;url=index2.php" /> 
<title>The Sweet Swap - Las Cruces's Best Clothing Exchange and Specialty Clothing Boutique</title>
<link href="../inc/sweetswap.css" type="text/css" rel="stylesheet" media="all" />
</head>
<body>
<div id="container" align="center">
  <? include("../inc/header.php"); ?>
  <div align="right" id="navigation">
    <? include("../inc/nav.php"); ?>
  </div>
  <div id="content_div" align="center">
  <h1>Updated Page <? echo ucfirst($page_id); ?></h1>
	Your page has been Updated!<Br />
Please wait for your screen to refresh...
  <div align="left"></div>
  </div>
  <div id="footer" align="left"><? include("../inc/footer.php"); ?></div>
</div>
</body>
</html>
