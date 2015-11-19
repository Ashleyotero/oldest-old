<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>David Masters Portfolio :: Paintings</title>
	<link href="includes/dm_styles.css" rel="stylesheet" type="text/css" media="screen">
	<link href="includes/galleria.css" rel="stylesheet" type="text/css" media="screen">
	<script type="text/javascript" src="includes/jquery.min.js"></script>
	<script type="text/javascript" src="includes/jquery.galleria.js"></script>
	<script type="text/javascript">
	
	$(document).ready(function(){
		
		$('.gallery_demo_unstyled').addClass('gallery_demo'); // adds new class name to maintain degradability
		
		$('ul.gallery_demo').galleria({
			history   : true, // activates the history object for bookmarking, back-button etc.
			clickNext : true, // helper for making the image clickable
			insert    : '#main_image', // the containing selector for our main image
			onImage   : function(image,caption,thumb) { // let's add some image effects for demonstration purposes
				
				// fade in the image & caption
				image.css('display','none').fadeIn(1000);
				caption.css('display','none').fadeIn(1000);
				
				// fetch the thumbnail container
				var _li = thumb.parents('li');
				
				// fade out inactive thumbnail
				_li.siblings().children('img.selected').fadeTo(500,0.3);
				
				// fade in active thumbnail
				thumb.fadeTo('fast',1).addClass('selected');
				
				// add a title for the clickable image
				image.attr('title','Next image >>');
			},
			onThumb : function(thumb) { // thumbnail effects goes here
				
				// fetch the thumbnail container
				var _li = thumb.parents('li');
				
				// if thumbnail is active, fade all the way.
				var _fadeTo = _li.is('.active') ? '1' : '0.3';
				
				// fade in the thumbnail when finnished loading
				thumb.css({display:'none',opacity:_fadeTo}).fadeIn(1500);
				
				// hover effects
				thumb.hover(
					function() { thumb.fadeTo('fast',1); },
					function() { _li.not('.active').children('img').fadeTo('fast',0.3); } // don't fade out if the parent is active
				)
			}
		});
	});
	
	</script>
</head>
<body>
<div id="container">
<? include("includes/nav.php"); ?>
<div id="content"><div class="demo">
<div id="main_image"></div>
<ul class="gallery_demo_unstyled">
<li class="active"><img src="images/paintings/penguins.png" alt="Caption" title="Caption"></li>
    <li><img src="images/paintings/tessies_dance_with_death.png" alt="Caption" title="Caption text"></li>
<li><img src="images/paintings/abes-night-out.jpg" alt="Caption" title="Caption"></li>
    <li><img src="images/paintings/atma.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/paintings/bestoffriends.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/paintings/BFA.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/paintings/Canadian.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/paintings/first-meeting.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/paintings/Red.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/paintings/what-is-that.jpg" alt="Caption" title="Caption text"></li>
</ul>
<p class="nav"><a href="#" onclick="$.galleria.prev(); return false;">&laquo; previous</a> | <a href="#" onclick="$.galleria.next(); return false;">next &raquo;</a></p>
</div>
</div>
<div class="clear">&nbsp;</div>
</div>

</body>
</html>
