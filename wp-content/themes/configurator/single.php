<?php

get_header(); 

$prefix = configurator_get_prefix();

$layout = get_theme_mod( $prefix.'layout', 'right-sidebar' );
$sidebar = get_theme_mod( $prefix.'sidebar', 0 );
$layout = ( is_active_sidebar( $sidebar ) || is_active_sidebar( 'blog-sidebar' ) ) ? $layout : 'full-width';

?>

	<div id="primary" class="content-area single-post">
		<main id="main" class="site-main container">

		<?php
			if ( $layout != 'full-width' ) {
				echo '<div class="row">';

				echo '<div class="col-md-9">';
			}		

				// Empty assignment
				$social_share = '';

				while ( have_posts() ) : the_post();

					// Featured Image
					if( 'full-width' != $layout ) { // Left/Right Sidebar
						$width = 870;
						$height = 550;
					}
					else {
						$width = 1170;
						$height = 780;
					}
					if( has_post_thumbnail() ) {
						echo '<div class="post-standard">';
					        echo configurator_featured_thumbnail( $width, $height, 0, 0, 1 );
					    echo '</div>';
					}
					echo '<div class="content-cover">';	
						// Print post content
						the_content();

						// Next/Previous post content
						wp_link_pages('before=<p class="page-links">Pages: &after=</p>');

						// Tags & Share
						if ( is_customize_preview() ) { echo '<div class="customize-single-post-tag-share">'; }

							echo configurator_print_single_post_tag_share();

						if ( is_customize_preview() ) { echo '</div>'; }

						// Tags & Share
						if ( is_customize_preview() ) { echo '<div class="customize-single-post-author-box">'; }
						
							echo configurator_print_single_post_author_box();

						if ( is_customize_preview() ) { echo '</div>'; }		

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					echo '</div>';

				endwhile; // End of the loop.

			if ( 'full-width' != $layout ) {
				echo '</div>'; // col-md-9

				// Sidebar
				configurator_sidebar( $sidebar, 'blog-sidebar' );

				echo '</div>'; // row
			}
		?>

		</main>
	</div>
<?php
get_footer();
