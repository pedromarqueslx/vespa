<?php
/*
The comments page
*/

$configurator_comment_form_title = get_theme_mod( 'single_comment_form_title', esc_html__( 'Leave a Comment', 'configurator' ) );
$configurator_comment_form_btn_text = get_theme_mod( 'single_comment_form_btn_text', esc_html__( 'Add Comment', 'configurator' ) );

  if ( post_password_required() ) { ?>
  	<div class="alert help">
    	<p class="nocomments"><?php esc_html_e("This post is password protected. Enter the password to view comments.", 'configurator' ); ?></p>
  	</div>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<div class="clearfix comments">

		<?php
			$comment_count_allowed_html_array = array(
			    'span' => array(),
			);
		?>

		<h3 id="comments-title">
			<?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'configurator' ), number_format_i18n( get_comments_number() ) ); ?>
		</h3>
		
		<ul class="comment-list">
			<?php wp_list_comments('callback=configurator_comments'); ?>
		</ul>

		<div class="pagination">
		    <?php paginate_comments_links(); ?> 
		</div>

	</div>
  
	<?php else : // this is displayed if there are no comments so far ?>

		<?php if ( comments_open() ) : ?>
	    	<!-- If comments are open, but there are no comments. -->

		<?php else : // comments are closed ?>
	
		<!-- If comments are closed. -->
		<!--p class="nocomments"><?php esc_html_e("Comments are closed.", 'configurator' ); ?></p-->

		<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div class="clear">	
	<?php 

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$comments_args = array(
		'id_form'           => 'commentform',
		'class_form'		=> 'row',
		'id_submit'         => 'submit',
		'class_submit'      => 'btn btn-solid btn-primary btn-oval btn-md btn-uppercase',
		'title_reply'       => $configurator_comment_form_title,
		'title_reply_to'    => $configurator_comment_form_title,
		'cancel_reply_link' => esc_html__( 'Cancel Reply', 'configurator' ),
		'label_submit'      => $configurator_comment_form_btn_text,
	 

		'comment_field' =>  '<p class="comment-form-comment col-md-12 clear"><label for="comment">Comment<span class="color">*</span>'.
	    '</label><textarea id="comment" class="textArea" name="comment"  cols="45" rows="8" placeholder="'. esc_attr__( 'Your Comment here...', 'configurator' ) .'" aria-required="true">' .
	    '</textarea></p>',

		'comment_notes_before' => '',  

		'comment_notes_after' => '',

		'fields' => apply_filters( 'comment_form_default_fields', array(
      
			'author' =>
				'<p class="comment-form-author col-md-6">' .

				'<input id="author" name="author"  class="textArea" type="text" value="" size="30" placeholder="'. esc_attr__( 'Your Name', 'configurator' ) .'"' . $aria_req . ' /></p>',

			'email' =>
				'<p class="comment-form-email col-md-6">' .
				'<input id="email" name="email"  class="textArea" type="text" value="" size="30" placeholder="'. esc_attr__( 'Your E-Mail', 'configurator' ) .'"' . $aria_req . ' /></p>',

			'url' =>
				'<p class="comment-form-url col-md-12">' .
				'<input id="url" name="url" type="text"   class="textArea" value="" size="30" placeholder="'. esc_attr__( 'Got a website?', 'configurator' ) .'" /></p>'
	    ))
	);

	comment_form( $comments_args );

	do_action( 'comment_form', $post->ID ); 
	?>

</div>

<?php endif; // if you delete this the sky will fall on your head ?>