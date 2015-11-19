<?
session_start();
if($_SESSION["authority"] != "Admin"){header("Location: index.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
  <h1 align="center">Please Choose an Option Below</h1>
  <div align="left">
	<b>Update Pages</b>
    <ul>
    	<li><a href="update_page.php?page_id=home" class="black">Home</a></li>
        <li><a href="update_page.php?page_id=about" class="black">About</a></li>
        <li><a href="update_page.php?page_id=the_rules" class="black">The Rules</a></li>
        <li><a href="update_page.php?page_id=specials" class="black">Specials</a></li>
        <li><a href="update_page.php?page_id=contact" class="black">Contact</a></li>
        <li><a href="update_page.php?page_id=press" class="black">Press</a></li>
    </ul> 
    <hr />
    <b>Update Rotator</b><br />
    Current Pictures
    
 </div>
  </div>
  <div id="footer" align="left"><? include("../inc/footer.php"); ?></div>
</div>
</body>
</html>
