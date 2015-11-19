<? 
$name=$_POST["name"];
$comments=$_POST["comments"];
$email=$_POST["email"];
$phone=$_POST["phone"];
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
<meta name="description" content="Website Consultant Ashley Richards talks about websites, website design, and doing online business in the southwest, Las Cruces New Mexico." />
<meta name="keywords" content="Web Consultant, Website Design, Web Designer, Las Cruces, New Mexico, Texas, El Paso, Albuquerque, Web Development, Website Developer" />
<link rel="stylesheet" href="includes/v3_style.css" type="text/css" media="screen" />
<script type="text/javascript">

// This function checks if the phone number field
// is at least 7 characters long.
// If so, it attaches class="welldone" to the 
// containing fieldset.

function checkPhoneForLength(whatYouTyped) {
	var fieldset = whatYouTyped.parentNode;
	var txt = whatYouTyped.value;
	if (txt.length == 7) {
		fieldset.className = "welldone";
	} else if (txt.length > 6 && txt.length < 11) {
		fieldset.className = "kindagood";
	} else {
		fieldset.className = "";
	}
}





// If the password is at least 4 characters long, the containing 
// fieldset is assigned class="kindagood".
// If it's at least 8 characters long, the containing
// fieldset is assigned class="welldone", to give the user
// the indication that they've selected a harder-to-crack
// password.

function checkPassword(whatYouTyped) {
	var fieldset = whatYouTyped.parentNode;
	var txt = whatYouTyped.value;
	if (txt.length > 3 && txt.length < 8) {
		fieldset.className = "kindagood";
	} else if (txt.length > 7) {
		fieldset.className = "welldone";
	} else {
		fieldset.className = "";
	}
}

// This function checks the email address to be sure
// it follows a certain pattern:
// blah@blah.blah
// If so, it assigns class="welldone" to the containing
// fieldset.

function checkEmail(whatYouTyped) {
	var fieldset = whatYouTyped.parentNode;
	var txt = whatYouTyped.value;
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(txt)) {
		fieldset.className = "welldone";
	} else {
		fieldset.className = "";
	}
}




// this part is for the form field hints to display
// only on the condition that the text input has focus.
// otherwise, it stays hidden.

function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}


function prepareInputsForHints() {
  var inputs = document.getElementsByTagName("input");
  for (var i=0; i<inputs.length; i++){
    inputs[i].onfocus = function () {
      this.parentNode.getElementsByTagName("span")[0].style.display = "inline";
    }
    inputs[i].onblur = function () {
      this.parentNode.getElementsByTagName("span")[0].style.display = "none";
    }
  }
}
addLoadEvent(prepareInputsForHints);

</script>
<title>829media || contact</title>
</head>
<body>
<div id="full-wrap">
<div id="navigation">
  <ul id="nav">
    <li><a href="contact.php">contact</a></li>
    <li><a href="services.php">services</a></li>
    <li><a href="faqs.php">faqs</a></li>
    <li><a href="about.php">about</a></li>
    <li><a href="index.php">home</a></li>
  </ul>
</div>
<br class="clearfloat" />
<div id="container">
  <div id="header">
    <div align="right"><img src="images/logo.png" width="1000" height="67" /></div>
    <!-- end #header -->
  </div>
  <div id="sidebar2"><img src="images/contact.png" width="154" height="30" class="z" />
    <div class="offset_boxy">
      <div class="boxy">
        <p>I am always available by email or phone.<br />
      Email: ashley (at) 829media.com<br />
    Phone: (575) 496-5002</p>
        <p>&nbsp;</p>
        <p>Thanks for contacting me. I'll be in touch soon.</p>
        <p>&nbsp;</p>
        
        </div>
    </div>
    </div>
</div>
    <!-- end #sidebar1 -->
  </div>
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->
  <br class="clearfloat" />
  <!-- end #container -->
 </div>
 <br class="clearfloat" />
 <div class="push"></div>
 <!-- end #full-wrap -->
</div>
<div id="footer">
  <p align="center"><br />829media.com &bull; e. fleming ave. las cruces, nm &bull; 575.496.5002</p>
  <!-- end #footer -->
</div>
</body>
</html>