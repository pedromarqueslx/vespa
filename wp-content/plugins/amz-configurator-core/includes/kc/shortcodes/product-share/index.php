<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class product_share extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-product-share';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Product Share', 'amz-configurator-core' ),
				'description' => esc_html__('Display a product share options', 'amz-configurator-core'),
				'icon' => 'sl-paper-plane',
				'category' => esc_html__( 'Shop', 'amz-configurator-core' ),
				'params' => array(

					// General
					'general' => array(
						array(
							'label'       => esc_html__( 'Product ID', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the Product ID, Leave it empty if you adding on single product page', 'amz-configurator-core' ),
							'name'        => 'id',
							'type'        => 'text'
						),
						array(
							'name' => 'social_share',
							'label' => esc_html__( 'Share Options', 'amz-configurator-core' ),
							'type' => 'multiple',
							'options' => array(
								'facebook'  => esc_html__( 'Facebook', 'amz-configurator-core' ),
								'twitter'   => esc_html__( 'Twitter', 'amz-configurator-core' ),
								'gplus'     => esc_html__( 'Google Plus', 'amz-configurator-core' ),
								'linkedin'  => esc_html__( 'Linkedin', 'amz-configurator-core' ),
								'pinterest' => esc_html__( 'Pinterest', 'amz-configurator-core' )
							),
							'description' => esc_html__( 'Choose the Share Options', 'amz-configurator-core' ),
						)
					),

					// Styling
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Regular Price' => array(
										array('property' => 'text-align', 'label' => 'Alignment'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc-single-product.share a'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-single-product.share a'),
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product.share a'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product.share a'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product.share a'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product.share a'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product.share a'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-single-product.share a'),
									)
								)
							)
						)
					)
					
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
			'id' => '',
			'social_share' => 'facebook,twitter,gplus,linkedin,pinterest'
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		// Empty assignment
		$share_html = '';

		$id = !empty( $id ) ? $id : get_the_ID();

		$url = esc_url( get_permalink( $id ) );
		$title = get_the_title( $id );

		$social_share = explode( ',', $social_share );

		foreach( $social_share as $key => $share ) {
			switch ( $share ) {
				case 'facebook':
					$share_html .= '<a href="'. esc_url( 'https://www.facebook.com/sharer/sharer.php?u='.$url ) .'" target="_blank" class="facebook ct-facebook" ></a>';
				break;

				case 'twitter':
					$share_html .= '<a href="'. esc_url( 'https://twitter.com/home?status='.$url ) .'" target="_blank" class="twitter ct-twitter"></a>';
				break;

				case 'gplus':
					$share_html .= '<a href="'. esc_url( 'https://plus.google.com/share?url='.$url ) .'" target="_blank" class="gplus ct-google-plus"></a>';
				break;

				case 'linkedin':
					$share_html .= '<a href="'. esc_url( 'https://www.linkedin.com/cws/share?url='.$url ) .'" target="_blank" class="linkedin ct-linkedin"></a>';
				break;

				case 'pinterest':
					$share_html .= '<a href="'. esc_url('https://pinterest.com/pin/create/button/?url='.$url.'&description='. esc_html( $title ) ) .'" target="_blank" class="pinterest ct-pinterest"></a>';
				break;
				
				default:
				break;
			}
		}

		ob_start();
		?>
			
			<div class="product-share-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="kc-single-product share">
					<?php echo $share_html; ?>
				</div>
			</div> <!-- .product-share-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new product_share();

