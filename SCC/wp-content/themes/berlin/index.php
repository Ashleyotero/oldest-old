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

<!--BEGIN FEATURED POSTS-->
    <ul id="slider-nav"></ul>
    <?php $i = 0; $slider_query = new WP_Query("showposts=4&cat=1"); ?>	
    <div id="slider-posts">
        <?php while ($slider_query->have_posts() && $i<=4) : $slider_query->the_post(); $do_not_duplicate = $post->ID; ?>
    		<?php $i++; ?>
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
		<?php endwhile; wp_reset_query(); $i = 0; ?>
	</div>
	
<div class="column span-7 first news colborder">
<?php query_posts('showposts=3&cat=1'); ?>
<h3><em><a href="<?php echo get_category_link($category);?>"><?php single_cat_title(); ?></a></em></h3>
<hr />
<?php while (have_posts()) : the_post(); ?>
<div class="post-<?php the_ID(); ?>">
<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6> 
<div class="meta"><?php the_time('M j, Y') ?> | by <?php the_author_posts_link(); ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> | <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read &rarr;</a> </div>
<p><?php echo substr(get_the_excerpt(),0,180); ?>...</p>
</div>
<?php endwhile; ?>
</div>

<div class="column span-7 last news">
<?php query_posts('showposts=3&cat=1'); ?>
<h3><em><a href="<?php echo get_category_link($category);?>"><?php single_cat_title(); ?></a></em></h3>
<hr />
<?php while (have_posts()) : the_post(); ?>
<div class="post-<?php the_ID(); ?>">
<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6> 
<div class="meta"><?php the_time('M j, Y') ?> | by <?php the_author_posts_link(); ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> | <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read &rarr;</a> </div>
<p><?php echo substr(get_the_excerpt(),0,180); ?>...</p>
</div>
<?php endwhile; ?>
</div>
<hr class="space" />
</div>

<div class="column span-9 last news">
<div id="home_right">
<?php query_posts('showposts=3&cat=1'); ?>
<h3><em><a href="<?php echo get_category_link($category);?>"><?php single_cat_title(); ?></a></em></h3>
<ul class="news-block">
<?php while (have_posts()) : the_post(); ?>
<li class="<?php post_style(); ?> post-<?php the_ID(); ?>">
<?php get_the_image( array( 'custom_key' => array( 'thumbnail' ), 'default_size' => 'thumbnail', 'width' => '150', 'height' => '150', 'image_class' => 'alignleft' ) ); ?>
<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6> 
<p><?php echo substr(get_the_excerpt(),0,180); ?>...</p>
</li>
<?php endwhile; wp_reset_query(); ?>
</ul>

<!-- ABOUT BOX -->
<div class="box">
<h6>About <?php bloginfo('name'); ?></h6> 
<p class="small"><?php bloginfo('description'); ?></p>
</div>
<div class="box">
<h2>Latest Videos</h2> 
[tubepress]
</div>
</div>
</div>
<hr />
<!--END RIGHT SIDE-->


<!--FIVE CATEGORIES-->
<?php $i = 0; ?>
<?php
$display_categories = array("1","1","1","1","1");
foreach ($display_categories as $category) { ?>
<?php query_posts("showposts=1&cat=$category"); ?>
<?php while (have_posts()) : the_post(); $i++; ?>
<div class="column span-4 post-<?php the_ID(); ?><?php if ($i < 5) { ?> append-1<?php  } ?><?php if ($i == 5) { ?> last<?php $i = 0; } ?>">
<h3><em><a href="<?php echo get_category_link($category);?>"><?php single_cat_title(); ?></a></em></h3>
<h6><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h6>
<?php get_the_image( array( 'custom_key' => array( 'thumbnail' ), 'default_size' => 'thumbnail', 'width' => '150', 'height' => '150', 'image_class' => '' ) ); ?>
<div class="excerpt_small"><p><?php echo substr(get_the_excerpt(),0,180); ?>...</p></div>
<p class="postmetadata"><?php the_time('M d, Y') ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
<?php endwhile; wp_reset_query(); ?>

<h6 class="category_more"><a href="<?php echo get_category_link($category);?>">More in <?php single_cat_title(); ?></a></h6>
<?php query_posts("showposts=5&offset=1&cat=$category"); ?>
<ul>
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="title"><?php the_title(); ?></a></li>
<?php endwhile; wp_reset_query(); ?>
</ul>
</div>
<?php } ?>
<!--END FIVE CATEGORIES-->

<hr />
<?php get_sidebar(); ?>
<?php get_footer(); ?>
