<?php include (TEMPLATEPATH.'/get-theme-options.php'); ?>
<!--Footer Begin-->
<div id="footer">
    <div class="foot">
        <div class="footbar"><ul>        
        		<!--Recent Posts-->
        <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar("Footer") ) : else :  ?>                
                <li class="recent_posts">
                	<h2>Recent Posts</h2>
                    <ul><?php wp_get_archives('title_li=&type=postbypost&limit=7'); ?></ul>
                </li>
                <!--Popular Posts-->
                <li class="popular_posts">
                <h2>Popular Posts</h2>
                <ul>
                <?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY 
    
				comment_count DESC LIMIT 0 , 7");
				foreach ($result as $topten) {
				$postid = $topten->ID;
				$title = $topten->post_title;
				$commentcount = $topten->comment_count;
				if ($commentcount != 0) { ?>
				<li><a href="<?php echo get_permalink($postid); ?>" title="<?php echo $title ?>"><?php echo 
				
				$title ?></a></li>
				<?php } } ?></ul>
                </li>
                <!--Recent Comments-->
                <li class="recent_comments">
                <h2>Recent Comments</h2>
                <?php
					global $wpdb;
					$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
					comment_post_ID, comment_author, comment_date_gmt, comment_approved,
					comment_type,comment_author_url,
					SUBSTRING(comment_content,1,15) AS com_excerpt
					FROM $wpdb->comments
					LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
					$wpdb->posts.ID)
					WHERE comment_approved = '1' AND comment_type = '' AND
					post_password = ''
					ORDER BY comment_date_gmt DESC
					LIMIT 7";
					$comments = $wpdb->get_results($sql);
					$output = $pre_HTML='';
					$output .= "\n<ul>";
					foreach ($comments as $comment) {
					$output .= "\n<li>".strip_tags($comment->comment_author)
					.":" . "<a href=\"" . get_permalink($comment->ID) .
					"#comment-" . $comment->comment_ID . "\" title=\"on " .
					$comment->post_title . "\">" . strip_tags($comment->com_excerpt)
					."</a></li>";
					}
					$output .= "\n</ul>";
					$output .= $post_HTML='';
					echo $output;?>
                </li>
                

		<?php endif; ?>
            </ul>
           <div class="site_info"><?php echo $ang_text; ?>
           . Template by <a href="http://www.towfiqi.com/">Towfiq I.</a>
           </div>
        </div>

    </div>
</div>
<!--Footer END-->
<?php wp_footer(); ?>

</body>
</html>