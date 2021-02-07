<?php 

/*
 * Testimonial Widget
*/
class Configurator_Recent_Post_Widget extends WP_Widget {

	function __construct() {
		$widget_options = array('classname' => 'recentpost', 'description' => esc_html__('Display Recent Posts','configurator' ));
		parent::__construct('configurator_recent_post',esc_html__('Configurator:: Recent Post','configurator' ),$widget_options);
	}

	function widget($args, $instance) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		ob_start();
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'configurator' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		$show_image = isset( $instance['show_image'] ) ?  $instance['show_image'] : false;
		if ( ! $number )
 			$number = 10;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		
		
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );

		//Empty assignment
		$image = '';

		if ( $r->have_posts() ) :

			echo wp_kses( $before_widget, array( 'div' => array( 'id' => array(), 'class' => array() ) ) );
				if ( $title ) {
					echo wp_kses( $before_title, array( 'h3' => array( 'class' => array() ) ) );
					echo esc_html( $title );
					echo wp_kses( $after_title, array( 'h3' => array( 'class' => array() ) ) );
				} 
				echo '<ul>';
					while ( $r->have_posts() ) : $r->the_post();
			
						$format = get_post_format();

			       		if ( $format != 'gallery') { 
			       			$image = configurator_featured_thumbnail( 70, 70, 0, 0, 1 );
			       		}       		

						else {
				       		//Get gallery meta values
				    		$gallery = json_decode( configurator_get_meta_value( get_the_ID(), '_amz_gallery', '' ) );

				    		$image = configurator_get_image_by_id( 70, 70, $gallery[0]->itemId, 0, 0, 1 );
						}
						
						echo '<li>';
							if ( $show_image ) {
								if( ! empty( $image ) ) {
									echo '<div class="postImg">';
										echo wp_kses( $image, array( 'img' => array( 'src' => array(), 'alt' => array() ) ) );
									echo '</div>';
								}
							}
								
							echo '<div class="content ">';
								echo '<p><a href="'. esc_url( get_permalink() ) .'">'. esc_html( get_the_title() ) .'</a></p>';
									if ( $show_date ) {
										echo '<span class="meta">'. esc_html( get_the_time( get_option('date_format', 'd M Y') ) ).'</span>';
									}
							echo '</div>';

						echo '</li>';
        
					endwhile;
				echo '</ul>';

			echo wp_kses( $after_widget, array( 'div' => array( 'id' => array(), 'class' => array() ) ) );

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_image'] = isset( $new_instance['show_image'] ) ? (bool) $new_instance['show_image'] : false;

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
			delete_option('widget_recent_entries');

		return $instance;
	}

	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : esc_html__( 'Recent Posts', 'configurator' );
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : true;
		$show_image = isset( $instance['show_image'] ) ? (bool) $instance['show_image'] : true;
?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'configurator' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?> type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'configurator' ); ?></label>
		<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'configurator' ); ?></label></p>
        
        <p><input class="checkbox" type="checkbox" <?php checked( $show_image ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_image' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>"><?php esc_html_e( 'Display post image?', 'configurator' ); ?></label></p>


<?php
	}
}

function configurator_recent_post_widget_init(){
	register_widget('Configurator_Recent_Post_Widget');	
}
add_action('widgets_init','configurator_recent_post_widget_init');