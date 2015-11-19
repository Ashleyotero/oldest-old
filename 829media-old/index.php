<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="Keywords" content="design, web standards, xhtml, html, website, websites, las cruces, el paso, new mexico, web, clients, 829 media, freelance, developer, graphic design, print media" />
<meta name="Description" content="I am a web developer based in southern New Mexico. I have been designing and programming webpages since 2002 and recently decided to freelance." />
<title>829 Media - Home</title>
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
    <h1> Welcome to 829media</h1>
    <p>I am a web developer based in southern New Mexico. I have been designing and programming webpages since 2002 and recently decided to freelance. I'm a jack-of-all-trades developer on the side, but I work in El Paso, Texas. My first love is web design and development, which I've been doing on and off for the past seven years. Most of my stuff is tied up, intellectual-property style, with the last company I worked for. </p>
    <p>I believe that web standards are rules not made to be broken. I know that first impressions are crucial on the web, and users love or hate a site in six seconds. I build websites with these ideas in mind. (I don't do print work unless it's really cool.) If you would like to speak to me regarding a project, please email me: chun.jin.ling at gmail.com or use the contact form.</p>
    <h2>Contact Me </h2>
    <form action="process_mini_contact.php" method="post" enctype="multipart/form-data">
    <p>name: <input name="name" type="text" class="texta" size="18" /> 
      phone: 
        <input name="phone" type="text" class="texta" size="15" /> 
      email: 
      <input name="email" type="text" class="texta" size="18" /> <input name="Submit" type="submit" tabindex="3" value="Submit" class="submit" /></p>
</form>
     
      <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
  <div id="footer">
    <? include("includes/footer.php"); ?>
    <!-- end #footer --></div>
<!-- end #container --></div>
</body>
</html>
