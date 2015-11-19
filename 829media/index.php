<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Website Consultant Ashley Richards talks about websites, website design, and doing online business in the southwest, Las Cruces New Mexico." />
<meta name="keywords" content="Web Consultant, Website Design, Web Designer, Las Cruces, New Mexico, Texas, El Paso, Albuquerque, Web Development, Website Developer" />
<link rel="stylesheet" href="includes/v3_style.css" type="text/css" media="screen" />
<script type="text/javascript" src="includes/jquery-1.2.6.min.js"></script>
<script type="text/javascript">
	
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
<title>829media || home</title>
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
    <div align="right"><img src="images/logo.png" alt="829media Logo" width="1000" height="67" /></div>
    <!-- end #header -->
  </div>
  <div id="sidebar1">
    <div id="tabbed_box_1" class="tabbed_box">
      <div align="center"><img src="images/browse_latest.png" alt="" width="300" height="30" vspace="5" /> </div>
      <div class="tabbed_area">
        <ul class="tabs">
          <li><a href="#" title="content_1" class="tab active">S. Odom</a></li>
          <li><a href="#" title="content_2" class="tab">Ohana</a></li>
          <li><a href="#" title="content_3" class="tab">WTC</a></li>
          <li><a href="#" title="content_4" class="tab">WTC Mock</a></li>
          <li><a href="#" title="content_5" class="tab">WTC Mock 2</a></li>
          <li><a href="#" title="content_6" class="tab">WTC Mock 3</a></li>
          <li><a href="#" title="content_7" class="tab">SD Mockup</a></li>
        </ul>
        <div id="content_1" class="content">
          <ul>
            <li><img src="images/site_samantha.jpg" alt="Samantha Odom" width="450" /></li>
            <li><a href="http://www.samanthaodom.com" target="_blank">Samantha Odom</a> - <a href="images/site_samantha.jpg" target="_blank">Go Live: August 2008</a> <br />
              <small>Graphics, layout design, XHTML/CSS, custom administration panel</small></li>
          </ul>
        </div>
        <div id="content_2" class="content">
          <ul>
            <li><img src="images/site_ohana.jpg" alt="Ohana" width="450" /></li>
            <li><a href="http://www.ohanadesign.com" target="_blank">Ohana Design</a> - <a href="images/site_ohana.jpg" target="_blank">Go Live: December 2007</a> <br />
              <small>Graphics, layout design, XHTML/CSS</small></li>
          </ul>
        </div>
        <div id="content_3" class="content">
          <ul>
            <li><img src="images/site_wtc.jpg" alt="WTC" width="450" /></li>
            <li><a href="http://www.westerntech.edu" target="_blank">Western Technical College</a> - <a href="images/site_wtc.jpg" target="_blank">Go Live: Pending, 2009</a> <br />
              <small>Graphics, layout design, XHTML/CSS, custom administration panel</small></li>
          </ul>
        </div>
        <div id="content_4" class="content">
          <ul>
            <li><img src="images/mock_blue.jpg" alt="WTC" width="450" /></li>
            <li><a href="#">Western Technical College</a> - <a href="images/mock_blue.jpg" target="_blank">Mockup, 2008</a> <br />
              <small>Graphics, layout design</small></li>
          </ul>
        </div>
        <div id="content_5" class="content">
          <ul>
            <li><img src="images/mock_gray.jpg" alt="WTC" width="450" /></li>
            <li><a href="#">Western Technical College</a> - <a href="images/mock_gray.jpg" target="_blank">Mockup, 2008</a> <br />
              <small>Graphics, layout design</small></li>
          </ul>
        </div>
        <div id="content_6" class="content">
          <ul>
            <li><img src="images/mock_wred.jpg" alt="WTC" width="450" /></li>
            <li><a href="#">Western Technical College</a> - <a href="images/mock_wred.jpg" target="_blank">Mockup, 2008</a> <br />
              <small>Graphics, layout design</small></li>
          </ul>
        </div>
        <div id="content_7" class="content">
          <ul>
            <li><img src="images/mock_sweetestdownfall.jpg" alt="Sweetest Downfall" width="450" /></li>
            <li><a href="#">Sweetest Downfall</a> - <a href="images/mock_sweetestdownfall.jpg" target="_blank">Mockup, 2008</a> <br />
              <small>Graphics, layout design</small></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
  <div id="mainContent">
    <img src="images/hello.png" alt="hello!" width="154" height="30" class="z" />
    <div class="offset_boxy">
      <div class="boxy"> This is 829media, the web design &amp; development company based in southern New Mexico. It's also the personal portfolio of Ashley Richards, a web designer &amp; developer who has worked for small businesses, design firms, and higher education. <a href="about.php">More about Ashley.</a> </div>
    </div>
    <img src="images/contact.png" alt="Contact Me" width="154" height="30" class="z" />
    <div class="offset_boxy">
      <div class="boxy"> <a href="contact.php">Contact me</a> for your next web project. </div>
    </div>
    <img src="images/findme.png" alt="Find Me" width="104" height="30" class="z" />
    <div class="offset_boxy">
      <div class="boxy"> 
        LinkedIn<br />
        Facebook<br />
        Flickr<br />
        Twitter<a href="about.php"></a> 
      </div>
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