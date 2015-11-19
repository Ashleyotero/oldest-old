<?php include (TEMPLATEPATH.'/get-theme-options.php'); ?>
<?php get_header();?>
<!--Slider Begin-->
<div id="sliderwrap">
	<div class="slidercontent">
    		<div id="slider">
                    <ul>
                    <?php 
					$slidecat = get_option('ang_slider_cat');
					$slidenum = get_option('ang_slider_count');
					?>
                    <?php $sliders = new WP_Query(); 
                    $sliders->query('category_name= '. $slidecat .'&showposts='. $slidenum .'');
                    while ($sliders->have_posts()) : $sliders->the_post(); ?>
                    <li>

                     <div class="content"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1><?php the_excerpt(); ?></div>
                     <div class="sframe"><?php the_thumb('large');?></div>

                    </li>
                    <?php endwhile; ?>
                </ul>
    		</div>
        </div>    
</div>
<!--Slider END-->

<!--Featured2 posts-->
<div id="featured_two">
    <div class="center">
        <div id="featured_two_content">
        		<?php
				$featcat = get_option('ang_featured_cat');
				$featnum = get_option('ang_featured_count');
				?>
                <?php query_posts('category_name=' .$featcat.'&posts_per_page=' .$featnum.''); ?>
                <?php if(have_posts()) : ?><?php while(have_posts()) : the_post();?>
                    
                    <div <?php post_class(); ?> id="post-<?php the_id();?>" >
                    <div class="featured_ribbon"></div>
                    <div class="edit"><?php edit_post_link('Edit'); ?></div><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="thumb"><a href="<?php the_permalink(); ?>"><?php the_thumb(); ?></a></div>
                    <?php the_excerpt(); ?>
                    
                    </div>
                <?php endwhile; ?>
                <?php else: ?>
                    <h2><div class="error"><?php _e('Not Found'); ?></div></h2
                ><?php endif; ?>
        </div>
    </div>
</div>
<!--Featured2 posts END-->

<!--Lates Posts-->
<div id="latest">
    <div class="center">
    	<div class="latestitlte"></div>
        <div class="latestcontent">
        
        <?php $recentPosts = new WP_Query();
    		  $recentPosts->query('showposts=10');?>
                    <div class="jcarousel-angelia">
                      <ul id="carousel" class="jcarousel-angelia">
                <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                       <li> <div <?php post_class(); ?> id="post-<?php the_id();?>" >
                        <a class="tool" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_thumb(); ?></a>
                        </div></li>
                    <?php endwhile; ?>
                    </ul>
                </div>
        </div>
    </div>
</div>
<!--Latest Posts-->

<?php get_footer();?>
