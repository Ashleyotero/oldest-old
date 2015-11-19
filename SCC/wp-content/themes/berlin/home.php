<?php get_header(); ?>
<?php function post_style() {
	static $post_count;
	$post_count++;
		if ($post_count % 2) {
			echo "post_alt";
		}
		else {
			echo "post_first";
		}
}
?>
<!--START LEFT SIDE-->
<div id="feature" class="column span-15 first">
   
    <?php 
        // Grab Option Tree theme options 
        if (function_exists( 'get_option_tree') ) { $options = get_option_tree( 'option_tree'); }

        // Start Slider
        if (function_exists( 'get_option_tree') && get_option_tree( 'berlin_homepage',$options) == 'Upload images')  {  ?>
            <span id="slider-nav"></span>
            <div id="slider-posts">

            <?php 
            $home_images = get_option_tree('berlin_home_images',$options,false,true);

            if($home_images <> '') { 

                   foreach( $home_images as $image ) { ?>

                <div class="slide">
                    <div class="slide-thumbnail">
                        <img src="<?php echo $image['image']; ?>" alt="<?php echo $image['title']; ?>" width="590" height="400" />              
                    </div>
                    
                    <div class="slide-details">
                        <h2 class="entry-title"><a href="<?php if( $image['link'] <> '') { echo $image['link']; } else { echo "#"; } ?>"><?php echo $image['title']; ?></a></h2>
                        <div class="description">
                	<p><?php echo $image['description']; ?></p> 
                        </div>
                    </div> 
                	<div class="clear"></div> 
                </div>
               <?php }
               } ?>
          </div>             

            <?php } else { 
    
    $dt_top_left_cat = '';    
    if ( function_exists( 'get_option_tree') && get_option_tree( 'berlin_top_left') <> '') { 

          $dt_top_left_cat =  get_option_tree( 'berlin_top_left'); }
          query_posts('cat='.$dt_top_left_cat.'&showposts=4'); ?>

<!--BEGIN FEATURED POSTS-->
    <span id="slider-nav"></span>
    <div id="slider-posts">
        <?php while (have_posts()) : the_post(); ?> 
			<div class="slide">
				<div class="slide-thumbnail">
				<?php get_the_image( array( 'custom_key' => array( 'photo-medium' ), 'default_size' => '590x400', 'width' => '590', 'height' => '400', 'image_class' => '' ) ); ?>
				</div>  
				
				<div class="slide-details">
					<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="description">
					    <p><?php echo substr(get_the_excerpt(),0,180); ?>...</p>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		<?php endwhile; wp_reset_query(); ?>
	</div>
<?php } ?>

<!--BEGIN MIDDLE POSTS-->	
<div class="column span-7 first news colborder">
	<?php
	$dt_mid_left_cat = ''; 
	if ( function_exists( 'get_option_tree') && get_option_tree( 'berlin_mid_left') <> '') {                 
        $dt_mid_left_cat =  get_option_tree( 'berlin_mid_left');     
        } 
            
    if ($dt_mid_left_cat != '') {        
    	$cat_name = get_cat_name($dt_mid_left_cat);    	
        query_posts('cat='.$dt_mid_left_cat.'&showposts=1'); ?> 
        
<h3><em><a href="<?php echo get_category_link($dt_mid_left_cat);?>"><?php echo $cat_name; ?></a></em></h3>
<hr />
<?php while (have_posts()) : the_post(); ?>
<div class="post-<?php the_ID(); ?>">
<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6> 
<div class="meta"><?php the_time('M j, Y') ?> | by <?php the_author_posts_link(); ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> | <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read &rarr;</a> </div>
<p><?php echo substr(get_the_excerpt(),0,180); ?>...</p>
</div>
<?php endwhile; ?> 
 <?php } ?>    
</div>


<div class="column span-7 last news">
    <?php
	$dt_mid_right_cat = ''; 
	if ( function_exists( 'get_option_tree') && get_option_tree( 'berlin_mid_right') <> '') {                 
        $dt_mid_right_cat =  get_option_tree( 'berlin_mid_right');     
        } 
            
    if ($dt_mid_right_cat != '') {        
    	$cat_name = get_cat_name($dt_mid_right_cat);    	
        query_posts('cat='.$dt_mid_right_cat.'&showposts=1'); ?>
<hr />
<?php while (have_posts()) : the_post(); ?>
<div class="post-<?php the_ID(); ?>">
<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
<div class="meta"><?php the_time('M j, Y') ?> | by <?php the_author_posts_link(); ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> | <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read &rarr;</a> </div>
<p><?php echo substr(get_the_excerpt(),0,180); ?>...</p>
</div>
<?php endwhile; ?>
<?php } ?>
</div>
<hr class="space" />
</div>


<!--BEGIN RIGHT SIDE-->
<div class="column span-9 last news">
<div id="home_right">

    <?php
	$dt_top_right_cat = ''; 
	if ( function_exists( 'get_option_tree') && get_option_tree( 'berlin_top_right') <> '') {                 
        $dt_top_right_cat =  get_option_tree( 'berlin_top_right');     
        } 
            
    if ($dt_top_right_cat != '') {        
    	$cat_name = get_cat_name($dt_top_right_cat);    	
        query_posts('cat='.$dt_top_right_cat.'&showposts=3'); ?>

<h3><em><a href="<?php echo get_category_link($dt_top_right_cat);?>"><?php echo $cat_name; ?></a></em></h3>
<ul class="news-block">
<?php while (have_posts()) : the_post(); ?>
<li class="<?php post_style(); ?> post-<?php the_ID(); ?>">
<?php get_the_image( array( 'custom_key' => array( 'thumbnail' ), 'default_size' => 'thumbnail', 'width' => '150', 'height' => '150', 'image_class' => 'alignleft' ) ); ?>
<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6> 
<p><?php echo substr(get_the_excerpt(),0,180); ?>...</p>
</li>
<?php endwhile; wp_reset_query(); ?>
</ul>
<?php } ?> 

<!-- ABOUT BOX -->
<div class="box">
<h6>Upcoming <?php bloginfo('name'); ?> Shows</h6> 
<?php
    $options = array('scope' => 'upcoming', 'artist' => 1, 'limit' => 10);
    echo gigpress_shows($options);
?>
</div>
<div class="box">
<h6>Flyers</h6> 
<img src="/wp-content/uploads/2012/01/stst.jpg" width="100" />
<img src="/wp-content/uploads/2012/01/toasters.jpg" width="100" />
</div>
</div>
</div>
<hr />

<!--END RIGHT SIDE-->

<!--3 CATEGORIES-->
<?php $i = 0; ?>
<?php
   
   $dt_bot_1st_cat = ''; 
if (function_exists( 'get_option_tree') && get_option_tree( 'berlin_bottom_1') <> '') { 
    $dt_bot_1st_cat = get_option_tree( 'berlin_bottom_1'); 
   }             
            
$display_categories = array("$dt_bot_1st_cat"); 
foreach ($display_categories as $category) { ?>
<?php query_posts("showposts=1&cat=$category"); ?> 

<?php while (have_posts()) : the_post(); $i++; ?> 
    
<div class="column span-twoseventyfivepx post-<?php the_ID(); ?><?php if ($i < 3) { ?> append-1<?php  } ?><?php if ($i == 3) { ?> last<?php $i = 0; } ?>">
<h3><em><a href="<?php echo get_category_link($category);?>"><?php single_cat_title(); ?></a></em></h3>
<h6><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h6>

<p class="postmetadata"><?php the_time('M d, Y') ?></p>
<?php get_the_image( array( 'custom_key' => array( 'thumbnail' ), 'default_size' => 'thumbnail', 'width' => '150', 'height' => '150', 'image_class' => '' ) ); ?>
<div class="excerpt_small"><p><?php echo substr(get_the_excerpt(),0,180); ?>...</p></div>
<?php endwhile; wp_reset_query(); ?>

<h6 class="category_more"><a href="<?php echo get_category_link($category);?>">More News...</a></h6>
<?php query_posts("showposts=5&offset=1&cat=$category"); ?>
<div class="more-posts-wrap">  
<?php while (have_posts()) : the_post(); ?>
<span class="more-posts"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="title"><?php the_title(); ?></a></span>
<?php endwhile; wp_reset_query(); ?>
</div>
</div>
<?php } ?>
<!--END 3 CATEGORIES-->

<hr />
<?php get_sidebar(); ?>
<?php get_footer(); ?>
