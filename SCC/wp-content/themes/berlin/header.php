<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
<?php language_attributes(); ?>
> 
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title> 
<?php wp_title(''); ?>
<?php if ( !(is_404()) && (is_single()) or (is_page()) or (is_archive()) ) { ?>
		:: 
<?php } ?>
<?php bloginfo('name'); ?>
	</title> 
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/screen.css" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/print.css" type="text/css" media="print" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="screen, projection" /> 
	<?php if ( function_exists( 'get_option_tree' ) && get_option_tree( 'gpp_custom_css' ) <> '') { ?>
	    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dynamic.css" type="text/css" />
	    <?php } ?>
<!--[if IE]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lib/ie.css" type="text/css" media="screen, projection" /><![endif]--> 
<!--[if lt IE 7]>
	<script defer type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/pngfix.js"></script>
	<![endif]-->
<!--[if gte IE 5.5]>
   <script language="javaScript" src="<?php echo get_template_directory_uri(); ?>/js/dhtml.js" type="text/javaScript"></script>
   <![endif]-->
<!-- Show the grid and baseline  -->
<!--<style type="text/css">
.container { background: url(<?php echo get_template_directory_uri(); ?>/css/lib/img/grid.png); }*/
</style>-->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>  
<?php wp_head(); ?>

<!-- Javascripts  -->
<script type="text/javascript">
	jQuery(function() {
	    jQuery("#slider-posts").cycle({
	        fx:      "fade",
	        timeout:  5000,
	        prev:    "#prev",
	        next:    "#next",
	        pager:   "#slider-nav"
	    });
	    jQuery("div.menu ul").superfish();	
	 });
</script>
</head>
<body <?php body_class(); ?>>
<div id="top">
	<div id="title"> 
	    <?php

           if ( function_exists( 'get_option_tree') && get_option_tree( 'berlin_logo') <>'') { ?>
               <a href="<?php echo home_url(); ?>/" title="Return to the frontpage"><img src="<?php get_option_tree( 'berlin_logo', '', true ); ?>" id="logo-image" alt="logo image" /></a>

          <?php } else { ?>
		<h1> <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" class="logo"> 
<img src="http://829media.com/scc/wp-content/themes/berlin/images/logo.png" alt="Second-Class Citizens" />
			</a> </h1>  
		  <?php } ?>
	</div>
	<?php gpp_theme_nav(); ?>
</div>
<div class="container">
