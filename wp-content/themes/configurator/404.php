<?php
get_header();

$prefix = configurator_get_prefix();

//Get Theme Option Value
$configurator_title = get_theme_mod( $prefix.'title', esc_html__( 'Oops!', 'configurator' ) );
$configurator_sub_title = get_theme_mod( $prefix.'sub_title', esc_html__( 'Seems like that page can\'t be found.', 'configurator' ) );
$configurator_description = get_theme_mod( $prefix.'description', esc_html__( 'Please feel free to browse the rest of our site.', 'configurator' ) );
$configurator_home_btn_text = get_theme_mod( $prefix.'home_btn_text', esc_html__( 'Back to Home', 'configurator' ) );

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

			<article id="post-not-found">
				<header class="article-header">
					<h1><?php echo esc_html( $configurator_title ); ?></h1>
					<p><?php echo esc_html( $configurator_sub_title ); ?></p>
				</header>
				<section>
					<p class="404-description"><?php echo esc_html( $configurator_description ); ?></p>
					<p><a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="btn 404-btn"><?php echo esc_html( $configurator_home_btn_text ); ?></a></p>
				</section>
			</article>

		</main>
	</div>
<?php
get_footer();
