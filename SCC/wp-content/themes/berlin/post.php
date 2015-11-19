 
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"> 
<?php the_title(); ?>
		</a></h2> 
	<p class="small">
<?php the_time('F jS, Y') ?>
		&nbsp;|&nbsp; <?php _e('by','Berlin'); ?> 
<?php the_author_posts_link(); ?>
		&nbsp;|&nbsp; <?php _e('published in ','Berlin'); ?>
<?php
				the_category(', '); ?>&nbsp;|&nbsp;<?php
				comments_popup_link(__('Leave A Comment &#187;', 'Berlin'), __('1 Comment &#187;', 'Berlin'),_n('% Comment &#187;', '% Comments &#187;',get_comments_number (),'Berlin')); 
				
				edit_post_link('Edit', ' &nbsp;|&nbsp; ', '');
			?>
	</p>
	<div class="entry">
	<?php get_the_image( array( 'custom_key' => array( 'thumbnail' ), 'default_size' => 'thumbnail', 'width' => '150', 'height' => '150', 'image_class' => 'alignleft' ) ); ?>
	<?php the_excerpt('Read the rest of this entry &raquo;'); ?>
	</div>
</div>
<div class="clear"></div>