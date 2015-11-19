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
    <td valign="top">&nbsp;</td>
    <td valign="top" id="content"><form method="POST" action="Security_Dept/redirect.php">
              <font size="3">
              <div align="center">
                <p><b>You do not have permission to view this page.<br>
                  Please login below as an <font color="#CC3300">Administrator</font>.</b></p>
                <p><b>Username:<br />
                  <input type="text" name="username" size="25" maxlength="25">
                  </b></p>
                <p><b>Password:<br>
                  <input type="password" name="password" size="25" maxlength="25">
                  </b></p>
                <p>
                  <input type="submit" name="submit" value="Login">
                </p>
              </div>
              </font>
            </form></td>
  </tr>
  <tr>
    <td colspan="2" class="padding"><? include("includes/admin_footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
