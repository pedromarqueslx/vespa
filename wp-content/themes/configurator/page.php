<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Configurator
 */

get_header(); 

$configurator_page_layout = configurator_get_meta_value( get_the_ID(), '_amz_layout', 'default' );

//Sidebar
$configurator_selected_sidebar = configurator_get_meta_value( get_the_ID(), '_amz_sidebar', '0' );

// check the page builder is be using
if( function_exists( 'kc_is_using' ) && kc_is_using() ) :
	$class = ' container-full';
else :
	$class = ' container';
endif;

if( empty( $class ) ) {
	if ( $configurator_page_layout == 'right-sidebar' || $configurator_page_layout == 'left-sidebar' || $configurator_page_layout == 'right-nav' || $configurator_page_layout == 'left-nav' ) {
		$class = ' container';
	}
}

?>

	<div id="primary" class="content-area">
		
		<main id="main" class="site-main<?php echo esc_attr( $class ); ?>">

				<?php 
					if ( $configurator_page_layout == 'right-sidebar' || $configurator_page_layout == 'left-sidebar' || $configurator_page_layout == 'right-nav' || $configurator_page_layout == 'left-nav' ) {
						echo '<div class="row padding-top">';

						echo '<div class="col-md-9 col2-layout">';
					}
				?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); 
						wp_link_pages('before=<p class="page-links">Pages: &after=</p>');
					?>

					<?php
						//Show/Hide comment section
	                    comments_template();
					?>

				<?php endwhile; // End of the loop. ?>


				<?php 
					if ( $configurator_page_layout == 'right-sidebar' || $configurator_page_layout == 'left-sidebar' || $configurator_page_layout == 'right-nav' || $configurator_page_layout == 'left-nav' ) {

						echo '</div>'; //col-md-9

						//If the sidebar position is right or left sidebar, it ll apply
				        if( 'full-width' != $configurator_page_layout ){

				        	if ( $configurator_page_layout == 'right-sidebar' || $configurator_page_layout == 'left-sidebar' ) {

								configurator_sidebar( $configurator_selected_sidebar , 'primary-sidebar' );

							//If the Side Menu Position is right or left, it ll apply
							} elseif( $configurator_page_layout == 'right-nav' || $configurator_page_layout == 'left-nav' ){
								echo '<div id="aside" class="sidebar col-md-3">';
									configurator_side_nav( $configurator_page_layout );
								echo '</div>';
							}
				        }

						echo '</div>'; //row
					}
				?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
