<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="includes/v3_style.css" type="text/css" media="screen" />
<script src="includes/jquery-1.2.6.min.js"></script>
<script>
	
	  // When the document loads do everything inside here ...
	  $(document).ready(function(){
		
		// When a link is clicked
		$("a.tab").click(function () {
			
			// switch all tabs off
			$(".active").removeClass("active");
			
			// switch this tab on
			$(this).addClass("active");
			
			// slide all elements with the class 'content' up
			$(".content").slideUp();
			
			// Now figure out what the 'title' attribute value is and find the element with that id.  Then slide that down.
			var content_show = $(this).attr("title");
			$("#"+content_show).slideDown();
		  
		});
		
		$("a.active").click();
	  });
  </script>
<title>829media || about</title>
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
  <div id="sidebar2"><img src="images/hello.png" width="154" height="30" class="z" />
    <div class="offset_boxy">
      <div class="boxy">
        <p>In 2008 I started 829media, a small New Mexico web design company. My clients include Ohana Design, Samantha Odom, The Corundas Foundation and others.  Recent projects extend from web design and development to logo and identity branding.</p>
          <br />
        </p>
        <p>I am a New Mexico State University alumna (2008) and still reside in New Mexico. I work a day job in the web field as well. My first love is web design and development, which I've been doing on and off for the past seven years. I am from California. I'm an animal lover. I use a Macs exclusively.</p>
        <p>&nbsp;</p>z
        <p>829media.com is valid Strict XHTML and valid CSS. This site was built and izs being maintained on my little MacBook, designed with Photoshop CS3 and coded by hand. I use Grooveshark for musical inspiration. I have previous personal sites, but they're so old that they aren't worth mentioning. If you're really curious, <a href="contact.php">you can ask</a>. </p>
      </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
<!--</div>
  </div>
  </div>-->
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