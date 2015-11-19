<? 
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT"); header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); header("Cache-Control: post-check=0, pre-check=0",false); session_cache_limiter(); session_start();
if (ucfirst($_SESSION[authority]) != "Administrator"){  include('index.php');  exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Samantha's Studio || Administration Panel</title> 
<style type="text/css">
<!--
@import url("includes/ss_style.css");
-->
</style>
</head>
<body>
<table width="900" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="260" id="header"><? include("includes/logo.php"); ?></td>
    <td width="638" valign="bottom"><div align="right">
        <h2><span class="teal">administration</span> panel</h2>
      </div></td>
  </tr>
  <tr>
    <td valign="top"><? include("includes/admin_nav.php"); ?></td>
    <td valign="top" id="content"><h3>Update Home Page</h3>
      <p><strong class="teal">Warning:</strong> Image must be a JPEG (.jpg, .jpeg extension) at 72 DPI  in RGB mode. <br />
      Do not upload photos greater than 900x900 pixels.</p>
      <?
include("Security_Dept/config.php");
@ $db = mysql_connect($server, $dbusername, $dbpassword) or die(mysql_error()); mysql_select_db($db_name);

$query = "SELECT * FROM sam_index WHERE index_num='1'"; 

$result = mysql_query($query);
$num_results = mysql_num_rows($result); 

		 for ($i=0; $i <$num_results; $i++)
  {

$index_num=mysql_result($result,$i,"index_num");
$index_photo1=mysql_result($result,$i,"index_photo1");  
$index_photo2=mysql_result($result,$i,"index_photo2"); 
$index_photo3=mysql_result($result,$i,"index_photo3"); 
$index_photo4=mysql_result($result,$i,"index_photo4"); 
$index_photo5=mysql_result($result,$i,"index_photo5"); 
$index_photo6=mysql_result($result,$i,"index_photo6"); 
$index_photo7=mysql_result($result,$i,"index_photo7"); 
$index_photo8=mysql_result($result,$i,"index_photo8"); 
$index_caption1=mysql_result($result,$i,"index_caption1");  
$index_caption2=mysql_result($result,$i,"index_caption2"); 
$index_caption3=mysql_result($result,$i,"index_caption3"); 
$index_caption4=mysql_result($result,$i,"index_caption4"); 
$index_caption5=mysql_result($result,$i,"index_caption5"); 
$index_caption6=mysql_result($result,$i,"index_caption6"); 
$index_caption7=mysql_result($result,$i,"index_caption7"); 
$index_caption8=mysql_result($result,$i,"index_caption8"); 
}
?>
      <form method="post" action="updated_home.php" enctype="multipart/form-data">
              <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
				<tr>
                  <td align="right" valign="top"><strong>Slideshow Photo 1:</strong></td>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile0">
						<input name="index_photo1_old" type="hidden" value="<? echo "$index_photo1"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile0_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($index_photo1 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$index_photo1"; ?>" target="pic"> <img src="../images/<? echo "$index_photo1"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                
				<tr>
                  <td width="30%" align="right"><strong>Photo 1 Caption:</strong></td>
                  <td width="70%"><input name="index_caption1" type="text" size="40" value="<? echo "$index_caption1"; ?>"></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Slideshow Photo 2:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile1">
						<input name="index_photo2_old" type="hidden" value="<? echo "$index_photo2"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile1_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($index_photo2 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$index_photo2"; ?>" target="pic"> <img src="../images/<? echo "$index_photo2"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                
				<tr>
                  <td width="30%" align="right"><strong>Photo 2 Caption:</strong></td>
                  <td width="70%"><input name="index_caption2" type="text" size="40" value="<? echo "$index_caption2"; ?>"></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Slideshow Photo 3:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile2">
						<input name="index_photo3_old" type="hidden" value="<? echo "$index_photo3"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile2_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($index_photo3 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$index_photo3"; ?>" target="pic"> <img src="../images/<? echo "$index_photo3"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                
				<tr>
                  <td width="30%" align="right"><strong>Photo 3 Caption:</strong></td>
                  <td width="70%"><input name="index_caption3" type="text" size="40" value="<? echo "$index_caption3"; ?>"></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Slideshow Photo 4:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile3">
						<input name="index_photo4_old" type="hidden" value="<? echo "$index_photo4"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile3_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($index_photo4 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$index_photo4"; ?>" target="pic"> <img src="../images/<? echo "$index_photo4"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                
				<tr>
                  <td width="30%" align="right"><strong>Photo 4 Caption:</strong></td>
                  <td width="70%"><input name="index_caption4" type="text" size="40" value="<? echo "$index_caption4"; ?>"></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Slideshow Photo 5:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile4">
						<input name="index_photo5_old" type="hidden" value="<? echo "$index_photo5"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile4_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($index_photo5 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$index_photo5"; ?>" target="pic"> <img src="../images/<? echo "$index_photo5"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                
				<tr>
                  <td width="30%" align="right"><strong>Photo 5 Caption:</strong></td>
                  <td width="70%"><input name="index_caption5" type="text" size="40" value="<? echo "$index_caption5"; ?>"></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Slideshow Photo 6:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile5">
						<input name="index_photo6_old" type="hidden" value="<? echo "$index_photo6"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile5_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($amenities_photo == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$index_photo6"; ?>" target="pic"> <img src="../images/<? echo "$index_photo6"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                
				<tr>
                  <td width="30%" align="right"><strong>Photo 6 Caption:</strong></td>
                  <td width="70%"><input name="index_caption6" type="text" size="40" value="<? echo "$index_caption6"; ?>"></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Slideshow Photo 7:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile6">
						<input name="index_photo7_old" type="hidden" value="<? echo "$index_photo7"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile6_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($index_photo7 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$index_photo7"; ?>" target="pic"> <img src="../images/<? echo "$index_photo7"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                
				<tr>
                  <td width="30%" align="right"><strong>Photo 7 Caption:</strong></td>
                  <td width="70%"><input name="index_caption7" type="text" size="40" value="<? echo "$index_caption7"; ?>"></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Slideshow Photo 8:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile7">
						<input name="index_photo8_old" type="hidden" value="<? echo "$index_photo8"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile7_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($index_photo8 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$index_photo8"; ?>" target="pic"> <img src="../images/<? echo "$index_photo8"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                
				<tr>
                  <td width="30%" align="right"><strong>Photo 8 Caption:</strong></td>
                  <td width="70%"><input name="index_caption8" type="text" size="40" value="<? echo "$index_caption8"; ?>"></td>
                </tr>
                <tr align="left" valign="top">
                  <td colspan="2"><div align="center"><strong>
                  <input type="submit" name="Submit" value="Update Home Page" />
                  </strong></div></td>
                </tr>
              </table>
      </form> 
    </td>
  </tr>
  <tr>
    <td colspan="2" class="padding"><? include("includes/admin_footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
