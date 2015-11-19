<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <!--[if lt IE 7.]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ie6.css" />
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/ie6.js"></script>
    <![endif]--> 
<?php
//allows the theme to get info from the theme options page
global $options;
foreach ($options as $value) {
        if(isset($value['id'])){if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
    else { $$value['id'] = get_option( $value['id'] ); }}
    }
?>			
	<?php switch ($ang_style) {
		 case "Style1":?>

	<?php break; ?>	
	<?php case "Style2":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/style2.css" type="text/css" media="screen" />
	<?php break; ?>
	<?php case "Style3":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/style3.css" type="text/css" media="screen" />
	<?php break; ?>
	<?php case "Style4":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/style4.css" type="text/css" media="screen" />
	<?php break; ?>	
    <?php case "Style5":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/style5.css" type="text/css" media="screen" />
	<?php break; ?>	
    <?php case "Style6":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/style6.css" type="text/css" media="screen" />
	<?php break; ?>	
    <?php case "Style7":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/style7.css" type="text/css" media="screen" />
	<?php break; ?>	
    <?php case "Style8":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/style8.css" type="text/css" media="screen" />
	<?php break; ?>	
    <?php case "Style9":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/style9.css" type="text/css" media="screen" />
	<?php break; ?>	
    <?php case "Style10":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/style10.css" type="text/css" media="screen" />
	<?php break; ?>	
	<?php }?>
    
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/angelia.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/other.js"></script>
    <!--[if IE 6]>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ie6.js"></script>
    <![endif]-->
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>

</head>
<body>

<!--Header Begin-->
<div id="header">
    <div class="center">
    	<div class="headercontent">
            <div class="logo">
            <a href="<?php bloginfo('url')?>"><?php bloginfo('title'); ?></a>
            <div class="desc"><?php bloginfo('description') ?></div>
            </div>
            
            <div class="pages">
            <ul><?php wp_list_pages('title_li='); ?></ul>
            </div>
        </div>
        <div class="categories">
        <ul><?php wp_list_categories('title_li='); ?></ul>
        </div>
    </div>
</div>
<!--Header END-->

<!--Social-->
<?php if ($ang_hide_social == "") {?>

<div class="social">
<ul>
<?php if ($ang_hide_tw == "") {?><li class="tw"><a title="Twitter" class="ang_tw" href="<?php echo $ang_tw_url;?>">Twitter</a></li><?php }?>
<?php if ($ang_hide_fb == "") {?><li class="fb"><a title="Facebook" class="ang_fb" href="<?php echo $ang_fb_url;?>">Facebook</a></li><?php }?>
<?php if ($ang_hide_ms == "") {?><li class="ms"><a title="Myspace" class="ang_ms" href="<?php echo $ang_ms_url;?>">Myspace</a></li><?php }?>
<?php if ($ang_hide_rss == "") {?><li class="rss"><a title="Rss Feed" class="ang_rss" href="<?php echo $ang_rss_url;?>">RSS</a></li><?php }?>
</ul>
<div class="social_bottom"></div>
</div>

<?php }?>


<!--Social END-->