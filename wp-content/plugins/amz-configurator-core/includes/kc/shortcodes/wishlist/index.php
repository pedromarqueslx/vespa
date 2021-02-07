<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class amz_wishlist extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-wishlist';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Wishlist', 'amz-configurator-core' ),
				'description' => esc_html__('Display a wishlist', 'amz-configurator-core'),
				'icon' => 'sl-paper-plane',
				'category' => esc_html__( 'Configurator', 'amz-configurator-core' ),
				'live_editor' => $sc_path . 'live.php',
				'params' => array(

					// General
					array(
						'label'       => esc_html__( 'Remove Wishlist', 'amz-configurator-core' ),
						'description' => esc_html__( 'Show remove wishlist button', 'amz-configurator-core' ),
						'name'        => 'remove_wishlist_btn',
						'type'        => 'select',
						'value'       => 'yes',
						'options' => array(
							'yes' => esc_html__( 'Yes', 'amz-configurator-core' ),
							'no' => esc_html__( 'No', 'amz-configurator-core' )
						)
					),
					
				)
			)
		);
		$this->map( $args );

	}

	public function output( $atts = array(), $content, $shortcode ) {

		$content = str_replace( array('&#8221;', '&#8243;' ), array( '"', '"' ), $content );
		$content = apply_filters( 'kc_shortcode_content', $content, $shortcode );

		if( isset( $atts['content'] ) && isset( $content ) && !empty( $content ) )
			$atts['content'] = $content;

		$atts = apply_filters( 'kc_shortcode_attributes', $atts, $shortcode );

		extract( shortcode_atts( array(
			// General
			'remove_wishlist_btn' => ''
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		ob_start();

		// Empty assignment
		$list = $heading = '';

		if( !empty( $GLOBALS['amz_wishlist_items'] ) ) {
			$args = array(
				'post_type' => 'product',
				'orderby' => 'post__in',
				'post__in' => $GLOBALS['amz_wishlist_items']

			);

			$q = new WP_Query( $args );

			if ( $q->have_posts() ) : 

				$heading .= '<div class="wishlist-heading">';
					$heading .= '<div><p>'. esc_html__( 'Product', 'configurator' ) .'</p></div>';
					$heading .= '<div><p>'. esc_html__( 'Title', 'configurator' ) .'</p></div>';
					$heading .= '<div><p>'. esc_html__( 'Price', 'configurator' ) .'</p></div>';
					$heading .= '<div><p>&nbsp;</p></div>';
				$heading .= '</div>';

				while ( $q->have_posts() ) : $q->the_post();

					$list .= '<div class="wishlist-item">';
						global $product;

						$list .= '<div><a href="'. esc_url( get_permalink() ) .'" class="product-img">'. configurator_featured_thumbnail( 70, 70, 0, 1, 1 ) .'</a></div>';

						$list .= '<div><h4 class="title"><a href="'. esc_url( get_permalink() ) .'">'. esc_html( get_the_title() ) .'</a></h4></div>';

						$list .= '<div>'. $product->get_price_html() .'</div>';

						if( in_array( $product->get_id(), $GLOBALS['amz_wishlist_items'] ) ) {
							$list .= '<div><a href="#" class="amz-wishlist active" data-id="'. esc_attr( $product->get_id() ) .'" data-remove="true">'. esc_html__('Remove', 'configurator') .'</a></div>';
						}

					$list .= '</div>';				

				endwhile;

			endif;

		}
		else {
			$list = '<p class="no-items">'. esc_html__( 'No wishlist found', 'amz-configurator-core' ) .'</p>';
		}

		wp_reset_query();

		ob_start();
		?>
			
			<div class="wishlist-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="wishlist">

					<?php echo $heading; ?>

					<div class="wishlist-products">
						<?php echo $list; ?>
					</div>
				</div> <!-- .wishlist  -->
			</div> <!-- .wishlist-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new amz_wishlist();
