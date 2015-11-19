<?php 
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar'
));

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer'
));


function new_excerpt_length($length) {
	return 15;
}
add_filter('excerpt_length', 'new_excerpt_length');


function getImage($num) {
global $more;
$more = 1;
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '',$postOutput);;
$image[$i] = $postOutput;
$start=$imgEnd+1;
}
if(stristr($image[$num],'<img')) { echo '<a href="'.$link.'">'.$image[$num]."</a>"; }
$more = 0;
}


function the_thumb($size = "medium", $add = "") {
global $wpdb, $post;
$thumb = $wpdb->get_row("SELECT ID, post_title FROM {$wpdb->posts} WHERE post_parent = {$post->ID} AND post_mime_type LIKE 'image%' ORDER BY menu_order");
if(!empty($thumb)) {
$image = image_downsize($thumb->ID, $size);
print "<img src='{$image[0]}' alt='{$thumb->post_title}' {$add} />";
}
}

//Theme Options//

$themename = "Angelia";
$shortname ="ang";
$ang_categories_obj = get_categories('hide_empty=0');
$ang_categories = array();
foreach ($ang_categories_obj as $ang_cat) {
	$ang_categories[$ang_cat->cat_ID] = $ang_cat->category_nicename;
}
$categories_tmp = array_unshift($ang_categories, "Select a category:");	
$number_entries = array("Select a Number:","1","2","3","4","5","6","7","8","9","10" );
$options = array(

array(
"name" => "Angelia Theme Options" , 
"type" => "title"),

array (
"type" => "open"),

array(
"name" => "General",
"type" => "heading"
),

array(
"name" => "Styles",
"desc" => "Switch Style",
"id" => $shortname."_style",
"type" => "select",
"options" => array("Style1","Style2","Style3","Style4","Style5","Style6","Style7","Style8","Style9","Style10"),
"std" => "Style1",
),

array(
"name" => "BreadCrumbs",
"desc" => "Hide Breadcrumbs?",
"id" => $shortname."_breadcrumbs",
"type" => "checkbox",
"std" => ""
),

array(
"name" => "Homepage",
"type" => "heading"
),

array(
"name" => "Slider Category",
"desc" => "Select  the category for slider",
"id" => $shortname."_slider_cat",
"type" => "select",
"std" => "Select a category",
"options" => $ang_categories),

array(
"name" => "Slider Posts Count",
"desc" => "How many posts you want to show in slider?",
"id" => $shortname."_slider_count",
"type" => "select",
"std" => "3",
"options" => $number_entries),

array(
"name" => "Featured Posts Category",
"desc" => "Select the category of featured posts",
"id" =>$shortname."_featured_cat",
"type" => "select",
"std" => "Select a category",
"options" => $ang_categories),

array(
"name" => "Featured Posts count",
"desc" => "How many Featured posts you want to show on homepage?",
"id" => $shortname."_featured_count",
"type" => "select",
"std" => "3",
"options" => $number_entries),

array(
"name" => "Social Icons",
"type" => "heading"
),

array(
"name" => "Hide all the Social Icons",
"id" => $shortname."_hide_social",
"type" => "checkbox",
"std" => ""),

array(
"name" => "Twitter Icon",
"desc" => "Check to hide Twitter icon. If not type your twitter url below:",
"id" => $shortname."_hide_tw",
"type" => "checkbox",
"std" => ""),

array(
"id" => $shortname."_tw_url",
"type" => "text2",
"desc" => "Type Your Twitter URL",
"std" => ""
),

array(
"name" => "Facebook Icon",
"desc" => "Check to hide Facebook icon. If not type your Facebook url below:",
"id" => $shortname."_hide_fb",
"type" => "checkbox",
"std" => ""),

array(
"id" => $shortname."_fb_url",
"type" => "text2",
"desc" => "Type Your Facebook URL",
"std" => ""
),

array(
"name" => "Myspace Icon",
"desc" => "Check to hide Myspace icon. If not type your Myspace url below:",
"id" => $shortname."_hide_ms",
"type" => "checkbox",
"std" => ""),

array(
"id" => $shortname."_ms_url",
"type" => "text2",
"desc" => "Type Your Myspace URL",
"std" => ""
),

array(
"name" => "RSS Feed Icon",
"desc" => "Check to hide Feedburner icon. If not type your Feedburner url below:",
"id" => $shortname."_hide_rss",
"type" => "checkbox",
"std" => ""),

array(
"id" => $shortname."_rss_url",
"type" => "text2",
"desc" => "Type Your Feedburner URL",
"std" => ""
),



array(
"name" => "Footer",
"type" => "heading"
),

array(
"name" => "Footer Text",
"desc" => "Type your own footer text",
"id" => $shortname."_text",
"type" => "textarea",
"std" => "&#169;Angelia 2010"),


array(
"type" => "close"),

array(
"type" => "submit")
);


/*Add a Theme Options Page*/
function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>




<div class="wrap" style="margin:0px 20px; padding:20px 0px 0px;">

<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>
<div style="width:808px; background:#eee; border:1px solid #ddd; padding:20px; overflow:hidden; display: block; margin: 0px 0px 30px;">

<?php break;

case "close":
?>

</div>

<?php break;

case "misc":
?>
<div style="width:808px; background:#fffde2; border:1px solid #ddd; padding:20px; overflow:hidden; display: block; margin: 0px 0px 30px;">
	<?php echo $value['name']; ?>
</div>
<?php break;

case "title":
?>

<div style="width:810px; height:22px; background:#555; padding:9px 20px; overflow:hidden; margin:0px; font-family:Verdana, sans-serif; font-size:18px; font-weight:normal; color:#EEE;">
	<?php echo $value['name']; ?>
</div>

<?php break;

case "heading":
?>

<div style="width:800px; height:22px; color:#555; padding:9px 0px; overflow:hidden; margin:0px; font-family:Verdana, sans-serif; font-size:21px; font-weight:bold; font-style:normal; border-bottom:solid 2px #666; margin-bottom:15px;">
	<?php echo $value['name']; ?>
</div>

<?php break;

case 'text':
?>

<div style="width:800px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<input style="width:200px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" />
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['desc']; ?>
	</span>
</div>


<?php
break;


case 'text2':
?>

<div style="width:460px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden; float:right;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:auto; float:left;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<input style="width:200px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" />
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['desc']; ?>
	</span>
</div>


<?php
break;





case 'textarea':
?>

<div style="width:808px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<textarea name="<?php echo $value['id']; ?>" style="width:600px; height:120px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); } ?></textarea>
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['desc']; ?>
	</span>
</div>

<?php
break;
/*Ralph Damiano*/
case 'select':
?>

<div style="width:600px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select>
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['desc']; ?>
	</span>
</div>

<?php
break;

case "checkbox":
?>

<div style="width:600px; padding:0px 0px 0px; margin:0px 0px 0px; overflow:hidden; float:left;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:350px; float:left;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px; width:200px; float:left;">
		<?php echo $value['desc']; ?>
	</span>
</div>


<?php
break;

case "submit":
?>


<?php break;
}
}
?>

<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>



<?php
}

add_action('admin_menu', 'mytheme_add_admin');

/*End of Add a Theme Options Page*/

/*End of Theme Options =======================================*/


function dimox_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $name = 'Home'; //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      single_cat_title();

 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}
?>