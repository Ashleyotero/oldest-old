<?
session_start();
if($_SESSION["authority"] != "Admin"){header("Location: index.php");}
$page_id = $_GET["page_id"];
include_once("fckeditor/fckeditor.php") ;
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
  <h1 align="center">Update Page <? echo ucfirst(str_replace("_"," ",$page_id)); ?></h1>
  <div align="left">
	<?
  
	include("cfg/config.php");
	$query_check		= "SELECT * FROM swap_pages WHERE page_id = '$page_id'";
	//echo "$query_check"; exit;
	$result_check		= mysql_query($query_check);
	$num_results_check	= mysql_num_rows($result_check);
	for($i_p = 0; $i_p < $num_results_check; $i_p++)
	{
		$page_content	= mysql_result($result_check,$i_p,"page_content");
	}
  ?>
    <form id="form2" name="form2" method="post" enctype="multipart/form-data" action="updated_page.php">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="15%" align="left" valign="top"><strong>Content:</strong></td>
          <td width="85%" align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top"><label>
            <?php
					$oFCKeditor = new FCKeditor('page_content') ;
					$oFCKeditor->BasePath = 'fckeditor/' ;
					$oFCKeditor->Value = $page_content;
					$oFCKeditor->Height = '700';
					$oFCKeditor->Create() ;
					?>
            </label></td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center" valign="middle"><label>
            <input type="hidden" name="page_id" value="<? echo "$page_id"; ?>" />
            <input type="submit" name="button" id="button" value="Update" />
            </label>
          </td>
        </tr>
      </table>
    </form>
 </div>
  </div>
  <div id="footer" align="left"><? include("../inc/footer.php"); ?></div>
</div>
</body>
</html>
