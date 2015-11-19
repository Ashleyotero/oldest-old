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
    <td valign="top" id="content"><h3>Update About Page</h3>
      <p><strong class="teal">Warning:</strong> Images must be a JPEG (.jpg, .jpeg extension) at 72 DPI  in RGB mode. <br />
      Do not upload photos greater than 900x900 pixels.</p>
      <?
include("Security_Dept/config.php");
@ $db = mysql_connect($server, $dbusername, $dbpassword) or die(mysql_error()); mysql_select_db($db_name);

$query = "SELECT * FROM sam_about WHERE about_num='1'"; 

$result = mysql_query($query);
$num_results = mysql_num_rows($result); 

		 for ($i=0; $i <$num_results; $i++)
  {

$about_num=mysql_result($result,$i,"about_num");
$about_quote=mysql_result($result,$i,"about_quote");  
$about_m_photo=mysql_result($result,$i,"about_m_photo"); 
$about_m_text=mysql_result($result,$i,"about_m_text"); 
$about_photo1=mysql_result($result,$i,"about_photo1"); 
$about_photo2=mysql_result($result,$i,"about_photo2"); 
$about_text1=mysql_result($result,$i,"about_text1"); 
$about_text2=mysql_result($result,$i,"about_text2"); 
}
?>
      <form method="post" action="updated_about.php" enctype="multipart/form-data">
              <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
              <tr>
              	<td align="right" valign="top"><strong>Quote:</strong></td>
                <td valign="top"><textarea name="about_quote" cols="40" rows="8" id="about_quote"><? echo"$about_quote"; ?></textarea></td>
              </tr>
				<tr>
                  <td align="right" valign="top"><strong>Main Photo:</strong></td>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile0">
						<input name="about_m_photo_old" type="hidden" value="<? echo "$about_m_photo"; ?>" />
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
                        <td width="45%" align="center"><? if ($about_m_photo == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$about_m_photo"; ?>" target="pic"> <img src="../images/<? echo "$about_m_photo"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                
				<tr>
                  <td width="30%" align="right" valign="top"><strong>Main Text:</strong></td>
                  <td width="70%"><textarea name="about_m_text" cols="40" rows="8" id="about_m_text"><? echo"$about_m_text"; ?></textarea></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Side Photo 1:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile1">
						<input name="about_photo1_old" type="hidden" value="<? echo "$about_photo1"; ?>" />
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
                        <td width="45%" align="center"><? if ($about_photo1 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$about_photo1"; ?>" target="pic"> <img src="../images/<? echo "$about_photo1"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Side Photo 2:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile2">
						<input name="about_photo2_old" type="hidden" value="<? echo "$about_photo2"; ?>" />
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
                        <td width="45%" align="center"><? if ($about_photo2 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$about_photo2"; ?>" target="pic"> <img src="../images/<? echo "$about_photo2"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                
				<tr>
                  <td align="right" valign="top"><strong>Side Text 1:</strong></td>
				  <td><textarea name="about_text1" cols="40" rows="8" id="about_text1"><? echo"$about_text1"; ?></textarea></td>
			    </tr>
				<tr>
                  <td align="right" valign="top"><strong>Side Text 2:</strong></td>
				  <td><textarea name="about_text2" cols="40" rows="8" id="about_text2"><? echo"$about_text2"; ?></textarea></td>
			    </tr>
                <tr align="left" valign="top">
                  <td colspan="2"><div align="center"><strong>
                  <input type="submit" name="Submit" value="Update About Page" />
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
