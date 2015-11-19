<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">
		    <?php _e('This post is password protected. Enter the password to view comments.','Berlin'); ?> 
		</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>


	<ol class="commentlist">
	<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>   
    
    <?php 
    
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $commenter = wp_get_current_commenter();
    
    $commenter['comment_author'] = esc_attr__( 'Name (required)', 'Berlin' ); 
    $commenter['comment_author_email'] = esc_attr__( 'Mail (required)', 'Berlin' ); 
    $commenter['comment_author_url'] = esc_attr__( 'Website', 'Berlin' );
    
    $fields =  array( 
         
        'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="" size="22"' . $aria_req . ' />' . '<label for="author"><small> ' . $commenter['comment_author'] . '</small></label> ' . ( $req ? '<span class="required"></span>' : '' ) . '</p>',  
        
        'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="" size="22"' . $aria_req . ' /><label for="email"><small> ' . $commenter['comment_author_email'] . '</small></label> ' . ( $req ? '<span class="required"></span>' : '' ) . '</p>',  
        
        'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" value="" size="22" /><label for="url"><small> ' . esc_attr( $commenter['comment_author_url'] ) . '</small></label></p>'
                    
    ); ?> 

     <?php comment_form( array(        'fields' => apply_filters( 'comment_form_default_fields', $fields ), 'label_submit' => esc_attr__( 'Submit Comment', 'Berlin' ), 'title_reply' => esc_attr__( 'Your Comments', 'Berlin' ), 'title_comment' => '', 'comment_field' => '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" cols="75%" rows="10" aria-required="true"></textarea></p>', 'comment_notes_after' => '', 'comment_notes_before' => '', 'title_reply_to' => esc_attr__( 'Leave a Reply to %s' )) ); ?>
    <?php else: ?>

<?php endif; // if you delete this the sky will fall on your head ?>
