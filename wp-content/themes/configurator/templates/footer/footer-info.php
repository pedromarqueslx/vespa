<?php

	$prefix = configurator_get_prefix();

	$page_slug =  get_page_template_slug(); 

	$footer_fixed = get_theme_mod( 'footer_fixed', 'no' );

	if( $page_slug != 'templates/page-blank.php' ) {
		$footer_fixed_class = ( $footer_fixed === 'yes' ) ? ' footer-fixed' : '';

		$footer_style = get_theme_mod( 'footer_style', 'dark' );
		$footer_style = ( $footer_style == 'light' ) ? ' footer-light ' : ' footer-dark ';


	$footer = configurator_get_meta_value( $id, '_amz_footer', 'show' ); // id, meta_key, meta_default

	if( 'show' == $footer ) {

	?>
		<footer id="footer" class="<?php echo esc_attr( $footer_style . $footer_fixed_class ); ?>">
			<?php 
			$footer_widget = get_theme_mod( 'footer_widget', 'show' );
			$footer_widget_layout = get_theme_mod( 'footer_widget_col', 'layout12' );

			if( 'show' === $footer_widget ){

				echo '<div id="pageFooterCon" class="pageFooterCon clearfix amz-custom-footer-layout amz-footer-' . esc_attr( $footer_widget_layout ) . '">';
					echo '<div id="pageFooter" class="container">';
						echo '<div class="row">';

							// Load footer layouts
							get_template_part ( 'templates/footer/layout/'. $footer_widget_layout );

						echo '</div>'; // row
					echo '</div>'; // pageFooter
				echo '</div>'; // pageFooterCon

	 		}
	 		// Small footer
	 		if ( is_customize_preview() ) { echo '<div class="customize-footer-small">'; }

				echo configurator_print_small_footer();

			if ( is_customize_preview() ) { echo '</div>'; }
		 	?>

		</footer>
	<?php } // $footer 
	} // $page_slug 
