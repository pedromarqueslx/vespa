<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !class_exists( 'amz_shortcodes' ) ) {

	class amz_shortcodes {

		private $value;
		
		public function map( $args ) {
			
			global $kc;
			if ( empty( $args ) || !is_array( $args ) )
				return;
			
			$kc->add_map( $args );
			
		}
		
		public function add_shortcode( $name, $callback ) {
			if ( is_callable( $callback ) ) {
				add_shortcode ( $name, $callback );
			}
		}

		public function get_array( $name ) {
			switch ( $name ) {

				case 'order':
					$value = array(
						'desc'	=> esc_html__( 'Descending Order', 'amz-configurator-core' ),
						'asc'	=> esc_html__( 'Ascending Order', 'amz-configurator-core' )
					);
				break;

				case 'orderby':

					$value = array(
						'date'       => esc_html__( 'Date', 'amz-configurator-core' ),
						'modified'   => esc_html__( 'Date Modified', 'amz-configurator-core' ),
						'rand'       => esc_html__( 'Rand', 'amz-configurator-core' ),
						'ID'         => esc_html__( 'ID', 'amz-configurator-core' ),
						'title'      => esc_html__( 'Title', 'amz-configurator-core' ),
						'author'     => esc_html__( 'Author', 'amz-configurator-core' ),
						'name'       => esc_html__( 'Name', 'amz-configurator-core' ),
						'parent'     => esc_html__( 'Parent', 'amz-configurator-core' ),
						'menu_order' => esc_html__( 'Menu Order', 'amz-configurator-core' ),
						'none'       => esc_html__( 'None', 'amz-configurator-core' )
					);

				break;

				case 'menu_list':

					$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
					$menu_list = array();
					$menu_list[] = esc_attr( 'Default', 'amz-header-footer-customizer' );
					if( !empty( $menus ) ) {
						foreach ( $menus as $key => $slug ) {
							$menu_list[$slug->slug] = $slug->name;
						}
					}					

					$value = $menu_list;

				break;
				
				default:
				break;
			}

			return $value;
		}

	}
}

new amz_shortcodes();
