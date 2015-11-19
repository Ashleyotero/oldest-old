<?php
/*
Plugin Name: Cute Profiles
Plugin URI: http://www.clickonf5.org/cute-profiles
Description: Cute Profiles adds all your Social Profile icons vertically on left or right side of your pages, which will remain visible all the time though the page is scrolled and without consuming the sidebar space. 
Version: 1.0.1	
Author: Tejaswini Deshpande, Sanjeev Mishra
Author URI: http://www.clickonf5.org
Wordpress version supported: 2.7 and above
*/

/*  Copyright 2009  Internet Techies  (email : tedeshpa@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
function cute_profiles_url( $path = '' ) {
	global $wp_version;
	if ( version_compare( $wp_version, '2.8', '<' ) ) { // Using WordPress 2.7
		$folder = dirname( plugin_basename( __FILE__ ) );
		if ( '.' != $folder )
			$path = path_join( ltrim( $folder, '/' ), $path );

		return plugins_url( $path );
	}
	return plugins_url( $path, __FILE__ );
}
//on activation, your Cute Profiles options will be populated. Here a single option is used which is actually an array of multiple options
function activate_cute_profiles() {
	$cute_profiles_opts1 = get_option('cute_profiles_options');
	$cute_profiles_opts2 =array('xing'=>' ', 
								'lastfm'=>' ', 
								'vimeo'=>' ', 
								'yelp'=>' ', 
								'mixx'=>' ', 
								'podcast'=>' ', 
								'slideshare'=>' ', 
								'plurk'=>' ', 
								'mobileme'=>' ', 
								'viddler'=>' ', 
								'dopplr'=>' ', 
								'qype'=>' ', 
								'virb'=>' ', 
								'evernote'=>' ', 
								'ilike'=>' ', 
								'aim'=>' ', 
								'mister-wong'=>' ', 
								'webnews'=>' ', 
								'yigg'=>' ', 
								'wikio'=>' ', 
								't3n'=>' ', 
								'infopirate'=> ' ', 
								'hyves'=>' ', 
								'dailybooth'=>' ', 
								'identi'=>' ', 
								'media'=>'screen'
							   );
	if ($cute_profiles_opts1) {
	    $cute_profiles = $cute_profiles_opts1 + $cute_profiles_opts2;
		update_option('cute_profiles_options',$cute_profiles);
	}
	else {
		$cute_profiles_opts1 = array('contact'=>' ', 
									'twitter'=>' ', 
									'facebook'=>' ', 
									'stumble'=>' ', 
									'mixx'=>' ', 
									'google'=>' ', 
									'reddit'=>' ', 
									'digg'=>' ', 
									'youtube'=>' ', 
									'linkedin'=>' ', 
									'rss'=>' ', 
									'skype'=>' ', 
									'newsvine'=>' ', 
									'ff'=>' ', 
									'technorati'=>' ', 
									'yahoo'=>' ', 
									'delicious'=>' ', 
									'myspace'=>' ', 
									'flickr'=>' ', 
									'netvibes'=>' ', 
									'tumblr'=>' ', 
									'bebo'=> ' ', 
									'windows'=>' ', 
									'buzz'=>' ', 
									'wp'=>' ', 
									'top'=>'275', 
									'align'=>'left', 
									'size'=>'2', 
									'theme'=>'2',
									'insert'=>'auto', 
									'follow'=>'dofollow' 
						);	
		$cute_profiles = $cute_profiles_opts1 + $cute_profiles_opts2;
		add_option('cute_profiles_options',$cute_profiles);		
	}
}

global $cute_profiles_networks;
$cute_profiles_networks = array( 'contact','twitter','facebook','stumble','mixx','google','reddit','digg','youtube','linkedin','rss','skype','newsvine','ff','technorati','yahoo','delicious','myspace','flickr','netvibes','tumblr','bebo','windows','buzz','wp');

global $cute_profiles_networks2;
$cute_profiles_networks2 = array( 'xing','lastfm','vimeo','yelp','podcast','slideshare','plurk','mobileme','viddler','dopplr','qype','virb','evernote','ilike','aim','mister-wong','webnews','yigg','wikio','t3n','infopirate','hyves','dailybooth','identi','thesixtyone');
						  
register_activation_hook( __FILE__, 'activate_cute_profiles' );
global $cute_profiles;
$cute_profiles = get_option('cute_profiles_options');
define("CUTE_PROFILES_VER","1.0.1",false);
//External CSS in the header
function cute_profiles_scripts_styles() {
global $cute_profiles;
	wp_enqueue_style( 'cute_profiles_css_file', cute_profiles_url( 'css/cute_profiles'.$cute_profiles['size'].$cute_profiles['theme'].'.css' ),
		false, CUTE_PROFILES_VER, $cute_profiles['media']); 
}
add_action( 'init', 'cute_profiles_scripts_styles' );

//two inline styles for the distance of the icons from the top
function cute_profiles_css() {
?>
<style type="text/css" media="screen">
div.cute_profiles_sprite{
top:<?php global $cute_profiles; echo $cute_profiles['top'];?>px;
<?php global $cute_profiles; echo $cute_profiles['align'];?>:0px;
}
</style>

<?php
}
add_action('wp_head', 'cute_profiles_css');

//The below function would directly put all the populated profiles at the get_footer hook of the footer of your page. 
function put_cute_profiles() {
global $cute_profiles;
?>
<div class="cute_profiles_sprite">
<?php 
//set 1
	global $cute_profiles_networks;
	foreach ($cute_profiles_networks as $cute_profiles_network) {
	$cute_profiles_nw = str_replace(" ","",$cute_profiles[$cute_profiles_network]); if (!empty($cute_profiles_nw)) { ?>
	<a title="<?php if ($cute_profiles_network == "stumble") {echo "Stumbleupon";} elseif ($cute_profiles_network == "ff") {echo "FriendFeed";} elseif ($cute_profiles_network == "wp") {echo "Wordpress";} elseif ($cute_profiles_network == "rss") {echo "RSS";} else { echo ucwords($cute_profiles_network); }?>" class="cute_profiles_<?php echo $cute_profiles_network;?>" href="<?php echo $cute_profiles_nw; ?>" target="_blank" <?php if ($cute_profiles['follow'] == 'nofollow') { ?>rel="nofollow"<?php } ?> ></a>
<?php }} 
//set 2
	global $cute_profiles_networks2;
	foreach ($cute_profiles_networks2 as $cute_profiles_network) {
	$cute_profiles_nw = str_replace(" ","",$cute_profiles[$cute_profiles_network]); if (!empty($cute_profiles_nw)) { ?>
	<a title="<?php if ($cute_profiles_network == "stumble") {echo "Stumbleupon";} elseif ($cute_profiles_network == "ff") {echo "FriendFeed";} elseif ($cute_profiles_network == "wp") {echo "Wordpress";} elseif ($cute_profiles_network == "rss") {echo "RSS";} else { echo ucwords($cute_profiles_network); }?>" class="cute_profiles_<?php echo $cute_profiles_network;?>" href="<?php echo $cute_profiles_nw; ?>" target="_blank" <?php if ($cute_profiles['follow'] == 'nofollow') { ?>rel="nofollow"<?php } ?> ></a>
<?php }} ?>

</div>
<?php
}
//insert the profiles automatically with the get_footer action hook
if ($cute_profiles['insert'] == 'auto') {
add_action( 'get_footer', 'put_cute_profiles' );
}

// function for adding settings page to wp-admin
function cute_profiles_settings() {
    // Add a new submenu under Options:
    add_options_page('Cute Profiles', 'Cute Profiles', 9, basename(__FILE__), 'cute_profiles_settings_page');
}

function cute_profiles_admin_head() {
?>
<script type="text/javascript">
jQuery(document).ready(function()
{
  //hide the all of the element with class msg_body
  jQuery(".cuteinside").hide();
  //toggle the componenet with class msg_body
  jQuery(".cutehndle").click(function()
  {
    jQuery(this).next(".cuteinside").slideToggle(600);
  });
  jQuery('#cute_msg_close').click(function () {
			jQuery('#cute_msg_message').fadeOut("slow");
  });
});
</script>
<style type="text/css">
#divFeedityWidget span {
        display:none !important;
}
#divFeedityWidget a{
        color:#06637D !important;
}
#divFeedityWidget a:hover{
		font-size:110%;
}
#cute_msg_message {background-color:#FEF7DA;clear:both;width:72%;}
#cute_msg_close {float:right;} 
</style>
<?php
}

add_action('admin_head', 'cute_profiles_admin_head');

// This function displays the page content for the Cute Profiles Options submenu
function cute_profiles_settings_page() {
// displaying plugin version info
	require_once(ABSPATH.'/wp-admin/includes/plugin-install.php');
	$plug_api = plugins_api('plugin_information', array('slug' => sanitize_title('Cute Profiles') ));
		if ( is_wp_error($plug_api) ) {
			wp_die($plug_api);
		}
?>

<div class="wrap">
<?php
if (CUTE_PROFILES_VER != $plug_api->version) {
     echo '<div id="cute_msg_message">A new version Cute Profiles (version '.$plug_api->version.') is available. Please upgrade to enjoy all available features.<img id="cute_msg_close" src="'.cute_profiles_url( 'images/close.jpg' ).'" /></div>';
}
?>

<h2 style="float:left;">Cute Profiles</h2>
<form  style="float:left;" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="8046056">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<div style="clear:both;"></div>
<form  method="post" action="options.php">
<div id="poststuff" class="metabox-holder has-right-sidebar"> 

<div style="float:left;width:55%;">
<?php
settings_fields('cute-profiles-group');
$cute_profiles = get_option('cute_profiles_options');
?>
<h2>Profile Links</h2> 
<p>Enter the respective <strong>Profile URLs</strong> for your Blog here. For the Profile which you don't wish to display, keep the box empty.</p> 

<!-- Set 1 Profiles -->
<div class="postbox">
<h3 class="cutehndle" style="cursor:pointer;"><span>Social Network Profiles - Set 1 </span><img style="float:right;" src="<?php echo cute_profiles_url('images/down.png'); ?>" /></h3>
<div class="cuteinside">
<table class="form-table">
<?php 
global $cute_profiles_networks;
$count = 0;
foreach ($cute_profiles_networks as $cute_profiles_network) { $count++; ?>
<tr <?php if ($count % 2) { echo 'class="alternate"';} ?> valign="top"> 
	<th scope="row" style="width:20%;"><label for="cute_profiles_options[<?php echo $cute_profiles_network;?>]"><?php if ($cute_profiles_network == "stumble") {echo "Stumbleupon";} elseif ($cute_profiles_network == "ff") {echo "FriendFeed";} elseif ($cute_profiles_network == "wp") {echo "Wordpress";} elseif ($cute_profiles_network == "rss") {echo "RSS";} else { echo ucwords($cute_profiles_network); }?></label></th> 
	<td><input type="text" name="cute_profiles_options[<?php echo $cute_profiles_network;?>]" value="<?php echo $cute_profiles[$cute_profiles_network]; ?>" class="regular-text code" /></td> 
</tr>
<?php } ?>
</table>
</div>
</div>

<!-- Set 2 Profiles -->
<div class="postbox">
<h3 class="cutehndle" style="cursor:pointer;"><span>Social Network Profiles - Set 2 </span><img style="float:right;" src="<?php echo cute_profiles_url('images/down.png'); ?>" /></h3>
<div class="cuteinside">
<table class="form-table">
<?php 
global $cute_profiles_networks2;
$count = 0;
foreach ($cute_profiles_networks2 as $cute_profiles_network) { $count++; ?>
<tr <?php if ($count % 2) { echo 'class="alternate"';} ?> valign="top"> 
	<th scope="row" style="width:20%;"><label for="cute_profiles_options[<?php echo $cute_profiles_network;?>]"><?php if ($cute_profiles_network == "stumble") {echo "Stumbleupon";} elseif ($cute_profiles_network == "ff") {echo "FriendFeed";} elseif ($cute_profiles_network == "wp") {echo "Wordpress";} elseif ($cute_profiles_network == "rss") {echo "RSS";} else { echo ucwords($cute_profiles_network); }?></label></th> 
	<td><input type="text" name="cute_profiles_options[<?php echo $cute_profiles_network;?>]" value="<?php echo $cute_profiles[$cute_profiles_network]; ?>" class="regular-text code" /></td> 
</tr>
<?php } ?>
</table>
</div>
</div>

<h2>Customize Looks</h2> 
<p>Customize the Profile Links and Icons</p> 
<table class="form-table">

<tr valign="top">
<th scope="row"><label for="cute_profiles_options[follow]">Profile Links rel attribute</label></th> 
<td><select name="cute_profiles_options[follow]">
<option value="dofollow" <?php if ($cute_profiles['follow'] == "dofollow"){ echo "selected";}?> >Dofollow</option>
<option value="nofollow" <?php if ($cute_profiles['follow'] == "nofollow"){ echo "selected";}?> >No Follow</option>
</select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="cute_profiles_options[align]">Icons Alignment</label></th> 
<td><select name="cute_profiles_options[align]">
<option value="left" <?php if ($cute_profiles['align'] == "left"){ echo "selected";}?> >Left</option>
<option value="right" <?php if ($cute_profiles['align'] == "right"){ echo "selected";}?> >Right</option>
</select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="cute_profiles_options[top]">Icons Distance From Top</label></th> 
<td><input type="text" name="cute_profiles_options[top]" class="small-text" value="<?php echo $cute_profiles['top']; ?>" />&nbsp;px</td>
</tr>

<tr valign="top">
<th scope="row"><label for="cute_profiles_options[size]">Icon Size</label></th> 
<td><select name="cute_profiles_options[size]">
<option value="1" <?php if ($cute_profiles['size'] == "1"){ echo "selected";}?> >16 x 16</option>
<option value="2" <?php if ($cute_profiles['size'] == "2"){ echo "selected";}?> >24 x 24</option>
<option value="3" <?php if ($cute_profiles['size'] == "3"){ echo "selected";}?> >32 x 32</option>
</select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="cute_profiles_options[theme]">Icon Theme</label></th> 
<td><select name="cute_profiles_options[theme]">
<option value="1" <?php if ($cute_profiles['theme'] == "1"){ echo "selected";}?> >Normally Gray - On hover Colored</option>
<option value="2" <?php if ($cute_profiles['theme'] == "2"){ echo "selected";}?> >Normally Light Colored - On hover Full Colored</option>
</select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="cute_profiles_options[insert]">Insertion of the Profiles</label></th> 
<td><select name="cute_profiles_options[insert]">
<option value="auto" <?php if ($cute_profiles['insert'] == "auto"){ echo "selected";}?> >Automatic Insertion</option>
<option value="manual" <?php if ($cute_profiles['insert'] == "manual"){ echo "selected";}?> >Manual Insertion</option>
</select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="cute_profiles_options[media]">Display Media for Cute Profiles</label></th> 
<td><select name="cute_profiles_options[media]">
<option value="screen" <?php if ($cute_profiles['media'] == "screen"){ echo "selected";}?> >On Screen only</option>
<option value="all" <?php if ($cute_profiles['media'] == "all"){ echo "selected";}?> >On all media, like screen, handheld etc.</option>
</select></td>
</tr>

</table>
<p>Note:- For Automatic Insertion, your Wordpress theme should have get_footer in the template file like index.php or single.php of the theme. For manual insertion use the tag <strong>put_cute_profiles();</strong></p> 
<p>Refer the Usage section of the plugin for more details on how to use the tempate tag.</p>

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</div>


   <div id="side-info-column" class="inner-sidebar"> 
			<div class="postbox"> 
			  <h3 class="hndle"><span>About this Plugin:</span></h3> 
			  <div class="inside">
                <ul>
                <li><a href="http://www.clickonf5.org/cute-profiles" title="Cute Profiles Homepage" >Plugin Homepage</a></li>
                <li><a href="http://www.clickonf5.org/" title="Visit Internet Techies" >Plugin Parent Site</a></li>
                <li><a href="http://www.clickonf5.org/phpbb/cute-profiles-f13/" title="Support Forum for Cute Profiles" >Support Forum</a></li>
                <li><a href="http://www.clickonf5.org/about/tejaswini" title="Cute Profiles Author Page" >About the Author</a></li>
                <li><a href="http://wordpress.org/extend/plugins/cute-profiles/stats/">Status:Downloaded <strong><?php echo $plug_api->downloaded; ?></strong> times</a></li>
                <li><a href="http://clickonf5.org/go/cute-profiles/" title="Donate if you liked the plugin and support in enhancing this plugin and creating new plugins" >Donate with Paypal</a></li>
                </ul> 
              </div> 
			</div> 
     </div>

   <div id="side-info-column" class="inner-sidebar"> 
			<div class="postbox"> 
			  <h3 class="hndle"><span>Credits:</span></h3> 
			  <div class="inside">
                <ul>
                <li><a href="http://www.komodomedia.com/blog/2009/06/social-network-icon-pack/" title="Social Network Icon Pack" >Komodomedia Icon Pack</a></li>
                <li><a href="http://codex.wordpress.org/Main_Page" title="Wordpress Help" >Wordpress Codex</a></li>
                </ul> 
              </div> 
			</div> 
     </div>  
     
       <div id="side-info-column" class="inner-sidebar"> 
			<div class="postbox"> 
			  <h3 class="hndle"><span>Support &amp; Donations</span></h3> 
			  <div class="inside">
					<script language="JavaScript" type="text/javascript">
                    <!--
                        // Customize the widget by editing the fields below
                        // All fields are required
                    
                        // Your Feedity RSS feed URL
                        feedity_widget_feed = "http://feedity.com/rss.aspx/clickonf5-org/UlVSUldS";
                    
                        // Number of items to display in the widget
                        feedity_widget_numberofitems = "5";
                    
                        // Show feed item published date (values: yes or no)
                        feedity_widget_showdate = "no";
                    
                        // Widget box width (in px, pt, em, or %)
                        feedity_widget_width = "220px";
                    
                        // Widget background color in hex or by name (eg: #ffffff or white)
                        feedity_widget_backcolor = "#ffffff";
                    
                        // Widget font/link color in hex or by name (eg: #000000 or black)
                        feedity_widget_fontcolor = "#000000";
                    //-->
                    </script>
                    <script language="JavaScript" type="text/javascript" src="http://feedity.com/js/widget.js"></script>
              </div> 
			</div> 
     </div>  

</div> <!--end of poststuff -->

</form>
</div> <!--end of float wrap -->
<?php	
}
// Hook for adding admin menus
if ( is_admin() ){ // admin actions
  add_action('admin_menu', 'cute_profiles_settings');
  add_action( 'admin_init', 'register_cute_profiles_settings' ); 
} 
function register_cute_profiles_settings() { // whitelist options
  register_setting( 'cute-profiles-group', 'cute_profiles_options' );
}

?>