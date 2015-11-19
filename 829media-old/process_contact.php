<? 
$name=$_POST["name"];
$comments=$_POST["comments"];
$email=$_POST["email"];
$date = date("m/d/Y H:i:s");

$to = "chun.jin.ling@gmail.com";
$subject = "829 Media - Questions and Comments";
$headers = "From: 829 Media Visitor<$to>\r\n";
$body = "
Name: $name\n
E-Mail: $email
Phone Number: $phone\n 
Questions/Comments: 

$comments\n

Date/Time:  $date\n
";

mail($to, $subject, $body, $headers);

if (!empty($email)) {
	$to2 = "$email";
	$subject2 = "Thank You For Visiting 829Media.com";
	$headers2 = "From: 829 Media<chun.jin.ling@gmail.com>\r\n";
	$body2 = "Thank you for visiting 829 Media.  We will be contacting you soon with a response to your questions or comments.\n
 
Sincerely,
829 Media
Las Cruces, NM 88001
(575) 496-5002";
	mail($to2, $subject2, $body2, $headers2);
} else {
	print "";
}
?>
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
    <p>Thank you for contacting me.  I am always available by email or phone.<br />
      Email: chun.jin.ling (at) gmail.com<br />
    Phone: (575) 496-5002</p>
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
  <div id="footer">
    <? include("includes/footer.php"); ?>
    <!-- end #footer --></div>
<!-- end #container --></div>
</body>
</html>
