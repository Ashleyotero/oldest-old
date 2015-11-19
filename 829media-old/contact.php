<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="Keywords" content="design, web standards, xhtml, html, website, websites, las cruces, el paso, new mexico, web, clients, 829 media, freelance, developer, graphic design, print media" />
<meta name="Description" content="I am a web developer based in southern New Mexico. I have been designing and programming webpages since 2002 and recently decided to freelance." />
<title>829 Media - Services</title>
<link href="includes/829media.css" rel="stylesheet" type="text/css" />
<!--[if IE 5]>
<style type="text/css"> 
/* place css box model fixes for IE 5* in this conditional comment */
.twoColFixRtHdr #sidebar1 { width: 220px; }
</style>
<![endif]--><!--[if IE]>
<style type="text/css"> 
/* place css fixes for all versions of IE in this conditional comment */
.twoColFixRtHdr #sidebar1 { padding-top: 30px; }
.twoColFixRtHdr #mainContent { zoom: 1; }
/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
</style>
<![endif]--></head>

<body class="twoColFixRtHdr">

<div id="container">
  <div id="nav">
    <? include("includes/nav.php"); ?></div>
  <div id="sidebar1">
    <h3>recent work</h3>
    <? include("includes/recent_work.php"); ?>
    <!-- end #sidebar1 --></div>
  <div id="mainContent">
    <h1> Contact Me</h1>
    <p>I am always available by email or phone.<br />
      Email: chun.jin.ling (at) gmail.com<br />
    Phone: (575) 496-5002</p>
      <form action="process_contact.php" method="post" enctype="multipart/form-data">
  <table width="75%" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td width="30%" align="right"><font color="#CC0000">*</font>Name</td>
      <td width="70%"><input name="name" type="text" id="name" size="30" class="texta" /></td>
    </tr> 
    <tr>
      <td align="right"><font color="#CC0000">*</font>E-Mail</td>
      <td><input name="email" type="text" id="email" size="30" class="texta" /></td>
    </tr> 
    <tr>
      <td align="right">Phone Number</td>
      <td><input name="phone" type="text" id="phone" size="30" class="texta" /></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" align="right"><font color="#CC0000">*</font> 
        Questions and Comments</td>
      <td><textarea name="comments" id="comments" rows="8" cols="35" class="texta"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><br />
      <font color="#CC0000">*</font> = required field</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><br />
	  <input name="Submit" type="submit" tabindex="3" value="Submit" class="submit" /></td>
    </tr>
  </table>
</form>
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
  <div id="footer">
    <? include("includes/footer.php"); ?>
    <!-- end #footer --></div>
<!-- end #container --></div>
</body>
</html>
