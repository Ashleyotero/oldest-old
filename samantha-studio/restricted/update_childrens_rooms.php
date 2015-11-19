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
    <td valign="top" id="content"><h3>Update Children's Rooms Gallery</h3>
      <p><strong class="teal">Warning:</strong> Images must be a JPEG (.jpg, .jpeg extension) at 72 DPI  in RGB mode. <br />
      Do not upload photos greater than 900x900 pixels.</p>
      <?
include("Security_Dept/config.php");
@ $db = mysql_connect($server, $dbusername, $dbpassword) or die(mysql_error()); mysql_select_db($db_name);

$query = "SELECT * FROM sam_gallery WHERE gallery_num='3'"; 

$result = mysql_query($query);
$num_results = mysql_num_rows($result); 

		 for ($i=0; $i <$num_results; $i++)
  {

$gallery_num=mysql_result($result,$i,"gallery_num");
$gallery_name=mysql_result($result,$i,"gallery_name"); 
$gallery_photo1=mysql_result($result,$i,"gallery_photo1"); 
$gallery_photo2=mysql_result($result,$i,"gallery_photo2"); 
$gallery_photo3=mysql_result($result,$i,"gallery_photo3"); 
$gallery_photo4=mysql_result($result,$i,"gallery_photo4");  
$gallery_photo5=mysql_result($result,$i,"gallery_photo5"); 
$gallery_photo6=mysql_result($result,$i,"gallery_photo6"); 
$gallery_photo7=mysql_result($result,$i,"gallery_photo7");  
$gallery_photo8=mysql_result($result,$i,"gallery_photo8"); 
$gallery_photo9=mysql_result($result,$i,"gallery_photo9"); 
$gallery_photo10=mysql_result($result,$i,"gallery_photo10");  
$gallery_photo11=mysql_result($result,$i,"gallery_photo11"); 
$gallery_photo12=mysql_result($result,$i,"gallery_photo12");  
}
?>
      <form method="post" action="updated_childrens_rooms.php" enctype="multipart/form-data">
              <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
				<tr>
                  <td width="30%" align="right" valign="top"><strong>Contact Photo 1:</strong></td>
                  <td width="70%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile0">
						<input name="gallery_photo1_old" type="hidden" value="<? echo "$gallery_photo1"; ?>" />
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
                        <td width="45%" align="center"><? if ($gallery_photo1 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo1"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo1"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 2:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile1">
						<input name="gallery_photo2_old" type="hidden" value="<? echo "$gallery_photo2"; ?>" />
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
                        <td width="45%" align="center"><? if ($gallery_photo2 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo2"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo2"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 3:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile2">
						<input name="gallery_photo3_old" type="hidden" value="<? echo "$gallery_photo3"; ?>" />
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
                        <td width="45%" align="center"><? if ($gallery_photo3 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo3"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo3"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 4:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile3">
						<input name="gallery_photo4_old" type="hidden" value="<? echo "$gallery_photo4"; ?>" />
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
                        <td width="45%" align="center"><? if ($gallery_photo4 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo4"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo4"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td width="30%" align="right" valign="top"><strong>Contact Photo 5:</strong></td>
                  <td width="70%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile4">
						<input name="gallery_photo5_old" type="hidden" value="<? echo "$gallery_photo5"; ?>" />
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
                        <td width="45%" align="center"><? if ($gallery_photo5 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo5"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo5"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 6:</strong></td>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile5">
						<input name="gallery_photo6_old" type="hidden" value="<? echo "$gallery_photo6"; ?>" />
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
                        <td width="45%" align="center"><? if ($gallery_photo6 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo6"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo6"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 7:</strong></td>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile6">
						<input name="gallery_photo7_old" type="hidden" value="<? echo "$gallery_photo7"; ?>" />
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
                        <td width="45%" align="center"><? if ($gallery_photo7 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo7"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo7"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 8:</strong></td>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile7">
						<input name="gallery_photo8_old" type="hidden" value="<? echo "$gallery_photo8"; ?>" />
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
                        <td width="45%" align="center"><? if ($gallery_photo8 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo8"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo8"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td width="30%" align="right" valign="top"><strong>Contact Photo 9:</strong></td>
                  <td width="70%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile8">
						<input name="gallery_photo9_old" type="hidden" value="<? echo "$gallery_photo9"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile8_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($gallery_photo9 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo9"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo9"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 10:</strong></td>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile9">
						<input name="gallery_photo10_old" type="hidden" value="<? echo "$gallery_photo10"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile9_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($gallery_photo10 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo10"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo10"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 11:</strong></td>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile10">
						<input name="gallery_photo11_old" type="hidden" value="<? echo "$gallery_photo11"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile10_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($gallery_photo11 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo11"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo11"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 12:</strong></td>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile11">
						<input name="gallery_photo12_old" type="hidden" value="<? echo "$gallery_photo12"; ?>" />
                          <br />
                          <b>Click browse to upload a new photo</b><br />
                          <br />
                          Warning!!! Only do this if you want<br />
                          to change the photo!! Leave blank if<br />
                          you want to keep the current photo...<br />
                          <br />
                          <font size="3"><b>OR</b></font><br />
                          <br />
                          <input type="checkbox" name="userfile11_delete" value="Delete">
                          <b>...Check this box to delete this photo</b><br />
&nbsp;</td>
                        <td width="45%" align="center"><? if ($gallery_photo12 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$gallery_photo12"; ?>" target="pic"> <img src="../images/<? echo "$gallery_photo12"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr align="left" valign="top">
                  <td colspan="2"><div align="center">
                  <input type="submit" name="Submit" value="Update Children's Rooms Gallery" />
                  </div></td>
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
