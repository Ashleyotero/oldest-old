<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="includes/v3_style.css" type="text/css" media="screen" /> 
 <script src="includes/jquery-1.2.3.min.js"></script>
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
	
	  });
  </script>
<title>Untitled Document</title>
</head>
<body>

<div id="tabbed_box_1" class="tabbed_box">
	<h4><img src="images/browse_latest.png" alt="" width="300" height="30" /><small>Select a Tab</small></h4>
    <div class="tabbed_area">
    
    	
        <ul class="tabs">
            <li><a href="#" title="content_1" class="tab active">Samantha Odom</a></li>
            <li><a href="#" title="content_2" class="tab">Ohana Design</a></li>
            <li><a href="#" title="content_3" class="tab">829media</a></li>

        </ul>
        
         <div id="content_1" class="content">
      <ul>
        <li><img src="images/recent_sam.jpg" width="150" height="150" /></li>
        <li><a href="">Samantha Odom<small>Go Live: August 2008</small></a></li>
        <li><a href="">Samantha's Studio - graphics, layout design, XHTML/CSS, custom administration panel</a></li>
        <li></li>
      </ul>
    </div>
    <div id="content_2" class="content">
      <ul>
        <li><img src="images/recent_ohana.jpg" width="150" height="150" /></li>
        <li><a href="">Samantha Odom<small>Go Live: August 2008</small></a></li>
        <li><a href="">Samantha's Studio - graphics, layout design, XHTML/CSS, custom administration panel</a></li>
      </ul>
    </div>
    <div id="content_3" class="content">
      <ul>
        <li><img src="images/recent_829.jpg" width="150" height="150" /></li>
        <li><a href="">Samantha Odom<small>Go Live: August 2008</small></a></li>
        <li><a href="">Samantha's Studio - graphics, layout design, XHTML/CSS, custom administration panel</a></li>
      </ul>
    </div>
    
    </div>

</div>

<p>&nbsp;</p>
<p>cfghxfgh<img src="images/what_need.png" width="255" height="25" /></p>
</body>
</html>
