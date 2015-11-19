<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>David Masters Portfolio :: Illustration</title>
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
    <li class="active"><img src="images/illustration/bus.png" alt="Caption" title="Caption"></li>
    <li><img src="images/illustration/ann.jpg" alt="Caption" title="Caption"></li>
    <li><img src="images/illustration/bruce-litho.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/illustration/dinoletter.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/illustration/Edmund_cover.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/illustration/Edmund_friends.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/illustration/fashion-girl.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/illustration/girls.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/illustration/pin-up.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/illustration/red.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/illustration/Self-portrait.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/illustration/sharetheroad.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/illustration/the-unbearable-nothing-that-is-the-wild-west.jpg" alt="Caption" title="Caption text"></li>
    <li><img src="images/illustration/youngedmund.jpg" alt="Caption" title="Caption text"></li>

</ul>
<p class="nav"><a href="#" onclick="$.galleria.prev(); return false;">&laquo; previous</a> | <a href="#" onclick="$.galleria.next(); return false;">next &raquo;</a></p>
</div>
</div>
<div class="clear">&nbsp;</div>
</div>

</body>
</html>
