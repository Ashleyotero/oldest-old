<?php get_header(); ?>
<div class="column span-17 colborder first" id="maincontent">
	<div class="content">
<?php if (have_posts()) : ?>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><em> 
<?php single_cat_title(); ?>
			</em></h2> 
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><em>Archive for 
<?php the_time('F jS, Y'); ?>
			</em></h2> 
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><em>Archive for 
<?php the_time('F, Y'); ?>
			</em></h2> 
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><em>Archive for 
<?php the_time('Y'); ?>
			</em></h2> 
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle"><em>Author Archive</em></h2> 
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><em>Blog Archives</em></h2> 
<?php } ?>
<?php while (have_posts()) : the_post(); ?>
<?php getPost(); ?>
<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft">
<?php next_posts_link('&laquo; Previous Entries') ?>
			</div>
			<div class="alignright">
<?php previous_posts_link('Next Entries &raquo;') ?>
			</div>
		</div>
<?php else : ?>
		<h2 class="center">Not Found</h2> 
<?php get_search_form(); ?>
<?php endif; ?>
	</div>
</div>
<div class="column span-6 last">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar-Single') ) : ?>
    <?php endif; ?>
</div>
<hr />
<?php get_sidebar(); ?>
<?php get_footer(); ?>
