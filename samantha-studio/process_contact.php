<? 
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$city=$_POST["city"];
$state=$_POST["state"];
$zip=$_POST["zip"];
$comments=$_POST["comments"];
$email=$_POST["email"];
$date = date("m/d/Y H:i:s");

$to = "samdiam@hotmail.com";
$subject = "Samantha's Studio.com - Contact Form";
$headers = "From: Samantha's Studio.com Visitor<$to>\r\n";
$body = "
Name: $first_name $last_name\n
E-Mail: $email
Phone Number: $phone\n 
Address: $address
City: $city
State: $state
Zip Code: $zip\n
Questions/Comments: 

$comments\n

Date/Time:  $date\n
";

mail($to, $subject, $body, $headers);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="muralist, new mexico, las cruces, artist, las cruces artists, muralist, faux finish, faux, wall finish, venetian plaster, plaster, painter, Samantha, Odom, Samantha's studio, local artist, jewelry, unique, interior design, design, mural murals, art, las cruces art, custom, drywall, texture, surface, oil painting, oil, acrylic, painting, glaze, paint, plaster" />
<meta name="description" content="Contact Samantha Odom." />
<title>Samantha's Studio || Thank You!</title>
<script type="text/javascript" src="includes/child.js"></script>
<style type="text/css">
<!--
@import url("includes/ss_style.css");
-->
</style>
</head>
<body>
<table width="900" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="250" id="header"><? include("includes/logo.php"); ?></td>
    <td valign="bottom"><div align="right">
      <h2><span class="teal">contact</span> samantha</h2>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><? include("includes/child_nav.php"); ?></td>
    <td valign="top" id="content"><h4>Thank you!</h4>

                <p>We have received your message and will contact you soon.</p></td>
  </tr>
  <tr>
    <td colspan="2" class="padding"><? include("includes/footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
