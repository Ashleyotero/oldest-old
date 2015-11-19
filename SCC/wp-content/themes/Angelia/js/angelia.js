/* <![CDATA[ */
$(function(){
	$('#carousel').jcarousel();
	$("#carousel a[title]").tooltip({ effect: 'slide', slideInSpeed:400, slideOutSpeed:400});
	
	$('.jcarousel-angelia .jcarousel-item-horizontal').css({"background":"#fff"});
	$('.jcarousel-angelia img').css({"opacity":"0.5"})
	$('.jcarousel-angelia img').hover(function(){
		$(this).stop().animate({"opacity":"1"},400);
	}, function(){
		$(this).stop().animate({"opacity":"0.5"},300);
		});
	$('ul.children').css({"display":"none"});	
	$('.categories ul li').hoverIntent(function(){
		$(this).find('ul.children').slideDown('medium');
	}, function(){
		$(this).find('ul.children').slideUp("medium");
		});	
		
		$("#slider").easySlider({
		auto: true,
		continuous: true,
		numeric: true });
		
	$('#sidebar ul li ul li').hover(function(){
		$(this).stop().animate({"marginLeft":"15px"},250);
	}, function(){
		$(this).stop().animate({"marginLeft":"5px"},250);
		});	
		
		$('.widget_tag_cloud a').hover(function(){
		$(this).stop().animate({"fontSize":"12pt"},150);
	}, function(){
		$(this).stop().animate({"fontSize":"8pt"},150);
		});
		

});


/* ]]> */