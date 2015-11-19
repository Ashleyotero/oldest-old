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

$to = "iamlijun@gmail.com";
$subject = "Ohana Design.com - Questions and Comments";
$headers = "From: Ohana Design.com Web Site Visitor<$to>\r\n";
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

if (!empty($email)) {
	$to2 = "$email";
	$subject2 = "Thank You For Visiting Ohana Design.com";
	$headers2 = "From: Ohana Design<iamlijun@gmail.com>\r\n";
	$body2 = "Thank you for visiting Ohana Design.  We will be contacting you soon with a response to your questions or comments.\n
 
Sincerely,
Ohana Design

Las Cruces, NM 88001
(575) 649-8464";
	mail($to2, $subject2, $body2, $headers2);
} else {
	print "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ohana Design :: Contact Us</title>
<style type="text/css">
<!--
@import url("includes/ohana_styles.css");
-->
</style>
</head>
<body>
<table width="765" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td id="header" valign="top"><? include("includes/nav.php"); ?></td>
  </tr>
  <tr>
    <td valign="top" class="cream_bg"><table width="100%" border="0">
        <tr>
          <td><div class="padding">
            <h3>Contact Us </h3>
            <p><strong>Ohana Design<br />
              1345 E. University <br />
              Las Cruces, NM 88001<br />
              (575) 649-8464</strong></p>
			  <h4>Thank you, <? echo "$first_name"; ?>!</h4>
                <p>We have received your request and will be contacting you shortly.</p>
          </div> </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><? include("includes/footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
