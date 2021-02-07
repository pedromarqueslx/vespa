<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class amz_static_counter extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-static-counter';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Static Counter', 'amz-configurator-core' ),
				'description' => esc_html__('Display a static counter', 'amz-configurator-core'),
				'is_container' => true,
				'icon' => 'sl-paper-plane',
				'category' => esc_html__( 'Configurator', 'amz-configurator-core' ),
				'live_editor' => $sc_path . 'live.php',
				'params' => array(

					// General
					array(
						'label'       => esc_html__( 'Title', 'amz-configurator-core' ),
						'admin_label' => true,
						'description' => esc_html__( 'Type the title', 'amz-configurator-core'),
						'name'        => 'title',
						'type'        => 'text',
						'value'       => ''
					),

					array(
						'label'       => esc_html__( 'Number', 'amz-configurator-core' ),
						'description' => esc_html__( 'Type the number', 'amz-configurator-core' ),
						'name'        => 'number',
						'type'        => 'text',
						'value'       => ''
					),

					array(
						'label'       => esc_html__( 'Sub Text', 'amz-configurator-core'),
						'description' => esc_html__( 'Enter the sub text after number', 'amz-configurator-core' ),
						'name'        => 'sub_text',
						'type'        => 'text',
						'value'       => ''
					),

					array(
						'label'       => esc_html__('Description', 'amz-configurator-core'),
						'description' => esc_html__('Type the description here', 'amz-configurator-core'),
						'name'        => 'description',
						'type'        => 'textarea',
						'value'       => ''
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
			'title'       => '',
			'number'      => '',
			'sub_text'    => '',
			'description' => ''
			
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		ob_start();

		// Empty assignment
		$output = '';

		// Title
		if( !empty( $title ) ) {
			$title = '<h2 class="title">'. esc_html( $title ) .'</h2>';
		}

		// Number
		if( '' != $number ) {
			$number = '<span class="value">'. esc_html( $number ) .' </span>';
		}

		// Sub Text
		if( !empty( $sub_text ) ) {
			$sub_text = '<span class="text">'. esc_html( $sub_text ) .'</span>';
		}

		if( !empty( $description ) ) {
			$description = '<p>'. esc_html( $description ) .'</p>';
		}

		ob_start();
		?>
			
			<div class="static-counter-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="static-counter">
					<?php echo $title; ?>
					<p class="number">
						<?php echo $number; ?>
						<?php echo $sub_text; ?>
					</p>
					<?php echo $description; ?>
				</div> <!-- .static-counter  -->
			</div> <!-- .static-counter-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new amz_static_counter();
