<? 
include("admin/cfg/config.php");
include("inc/dynamic_text.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Sweet Swap - Las Cruces's Best Clothing Exchange and Specialty Clothing Boutique</title>
<link href="inc/sweetswap.css" type="text/css" rel="stylesheet" media="all" />
</head>
<body>
<div id="container" align="center">
  <? include("inc/header.php"); ?>
  <div align="right" id="navigation">
    <? include("inc/nav.php"); ?>
  </div>
  <? $page_id = $_GET["page_id"]; ?>
  <div id="content_div" align="center">
    <div class="max_height">
      <h1><? echo ucwords(str_replace("_"," ",$page_id)); ?></h1>
      <p><? echo get_dyn_text($page_id); ?></p>
    </div>
  </div>
  <div id="footer" align="left">
    <? include("inc/footer.php"); ?>
  </div>
</div>
</body>
</html>
