<?php include (TEMPLATEPATH.'/get-theme-options.php'); ?>
<?php get_header();?>

<div class="midrow">
	<div class="center">
<!--Container-->
        <h2 class="single"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="comments-single"><?php comments_popup_link('0 <span>Comments</span>', '1 <span>Comment</span>', '% <span>Comments</span>'); ?></div>
        <?php if ($ang_breadcrumbs == "") {?><?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?><?php }?>
		<div id="container-single">
        
            <div class="container_top"></div>

            <div class="container_bg">
                <div id="posts">

					<?php if(have_posts()): ?><?php while(have_posts()): the_post(); ?>
                    <div <?php post_class(); ?> id="post-<?php the_id(); ?>">


                    <div class="postinfo"><?php  the_author(); ?><?php _e(' on '); ?><?php the_time(' F jS, Y'); ?></div>
                    <?php the_content(); ?>
                    <?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>
                    <div class="edit"><?php edit_post_link('Edit'); ?></div>
                    </div>
                    
                    <div class="comments_template">
                    <?php comments_template(); ?>
                    </div>
                    <?php endwhile; ?>
                    <div class="prv_page"><?php previous_posts_link('« Old Entries', 0); ?></div>
                    <div class="nxt_page"><?php next_posts_link('New Entries »', '0') ?></div>
                    <?php endif; ?>

                </div>
        		<!--Sidebar-->
                <div id="sidebar">
                		<ul>
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar") ) : ?>
						<?php endif; ?>
                        </ul>
                </div>
                <!--Sidebar END-->
            </div>
            <div class="container_bottom"></div>
    	</div>
<!--Container END-->
	</div>
</div>

<?php get_footer();?>