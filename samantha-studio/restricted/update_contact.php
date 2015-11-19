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
    <td valign="top" id="content"><h3>Update Contact Page</h3>
      <p><strong class="teal">Warning:</strong> Images must be a JPEG (.jpg, .jpeg extension) at 72 DPI  in RGB mode. <br />
      Do not upload photos greater than 900x900 pixels.</p>
      <?
include("Security_Dept/config.php");
@ $db = mysql_connect($server, $dbusername, $dbpassword) or die(mysql_error()); mysql_select_db($db_name);

$query = "SELECT * FROM sam_contact WHERE contact_num='1'"; 

$result = mysql_query($query);
$num_results = mysql_num_rows($result); 

		 for ($i=0; $i <$num_results; $i++)
  {

$contact_num=mysql_result($result,$i,"contact_num");
$contact_photo1=mysql_result($result,$i,"contact_photo1"); 
$contact_photo2=mysql_result($result,$i,"contact_photo2"); 
$contact_photo3=mysql_result($result,$i,"contact_photo3"); 
$contact_photo4=mysql_result($result,$i,"contact_photo4"); 
$contact_address=mysql_result($result,$i,"contact_address");  
$contact_studio_num=mysql_result($result,$i,"contact_studio_num"); 
$contact_cell_num=mysql_result($result,$i,"contact_cell_num"); 
$contact_email=mysql_result($result,$i,"contact_email");  
}
?>
      <form method="post" action="updated_contact.php" enctype="multipart/form-data">
              <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
				<tr>
                  <td width="30%" align="right" valign="top"><strong>Contact Photo 1:</strong></td>
                  <td width="70%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile0">
						<input name="contact_photo1_old" type="hidden" value="<? echo "$contact_photo1"; ?>" />
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
                        <td width="45%" align="center"><? if ($contact_photo1 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$contact_photo1"; ?>" target="pic"> <img src="../images/<? echo "$contact_photo1"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 2:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile1">
						<input name="contact_photo2_old" type="hidden" value="<? echo "$contact_photo2"; ?>" />
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
                        <td width="45%" align="center"><? if ($contact_photo2 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$contact_photo2"; ?>" target="pic"> <img src="../images/<? echo "$contact_photo2"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 3:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile2">
						<input name="contact_photo3_old" type="hidden" value="<? echo "$contact_photo3"; ?>" />
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
                        <td width="45%" align="center"><? if ($contact_photo3 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$contact_photo3"; ?>" target="pic"> <img src="../images/<? echo "$contact_photo3"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top"><strong>Contact Photo 4:</strong></td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="55%" valign="top"><input type="file" name="userfile3">
						<input name="contact_photo4_old" type="hidden" value="<? echo "$contact_photo4"; ?>" />
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
                        <td width="45%" align="center"><? if ($contact_photo4 == '') { echo 'No Photo<br />Available'; }
							 else { ?>
                          <a href="../images/<? echo "$contact_photo4"; ?>" target="pic"> <img src="../images/<? echo "$contact_photo4"; ?>" border="0" width="100"></a>
                          <? } ?></td>
                      </tr>
                    </table></td>
                </tr>
                
				<tr>
                  <td align="right" valign="top"><strong>Address:</strong></td>
				  <td><textarea name="contact_address" cols="40" rows="8" id="contact_address"><? echo"$contact_address"; ?></textarea></td>
			    </tr>
                <tr>
                	<td align="right" valign="top"><strong>Studio Number:</strong></td>
                    <td><input name="contact_studio_num" type="text" size="40" value="<? echo "$contact_studio_num"; ?>"></td>
                </tr>
                <tr>
                	<td align="right" valign="top"><strong>Cell Number:</strong></td>
                    <td><input name="contact_cell_num" type="text" size="40" value="<? echo "$contact_cell_num"; ?>"></td>
                </tr>
                <tr>
                	<td align="right" valign="top"><strong>Email:</strong></td>
                    <td><input name="contact_email" type="text" size="40" value="<? echo "$contact_email"; ?>"></td>
                </tr>
                <tr align="left" valign="top">
                  <td colspan="2"><div align="center"><strong>
                  <input type="submit" name="Submit" value="Update Contact Page" />
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
