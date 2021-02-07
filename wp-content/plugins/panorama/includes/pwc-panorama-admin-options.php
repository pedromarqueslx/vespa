<?php
/**
 * Frontend Config
 *
 * Frontend Settings
 *
 * @class     PWC_Panorama_config
 * @version   1.0
 * @author    Innwithemes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'pwc_addons_lists', 'pwc_panorama_addons_lists' );

function pwc_panorama_addons_lists( $addons = array() ) {
	$addons['panorama'] = esc_html__( 'Panorama', 'panorama' );

	return $addons;
}

add_filter( 'pwc_addons_panorama_settings_fields', 'pwc_addons_panorama_settings_fields' );

function pwc_addons_panorama_settings_fields( $field = array() ) {

	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
	
	$menu_list['none'] = esc_html__( 'None', 'panorama' );
	
	foreach ( $menus as $key => $slug ) {
		if( isset( $slug->name ) ) {
			$menu_list[$slug->slug] = $slug->name;
		}
	}

	$field = array();

	$field[] = array(
		'title'        => esc_html__( 'Single Configurator', 'panorama' ),
		'type'         => 'title'
	);

	$field[] = array(
		'title'        => esc_html__( 'Single Panorama Logo', 'panorama' ),
		'desc'         => esc_html__( 'Choose logo.', 'panorama' ),
		'id'           => 'panorama_logo',
		'std'          => '',
		'type'         => 'media_manager',
		'multi_select' => 'false',
		'options'      => 'image'
	);

	$field[] = array(
		'title'        => esc_html__( 'Single Panorama Cart Logo', 'panorama' ),
		'desc'         => esc_html__( 'Choose logo.', 'panorama' ),
		'id'           => 'panorama_cart_logo',
		'std'          => '',
		'type'         => 'media_manager',
		'multi_select' => 'false',
		'options'      => 'image'
	);

	$field[] = array(
		'title'   => esc_html__( 'Single Panorama Page Menu', 'panorama' ),
		'desc'    => esc_html__( 'Choose menu location.', 'panorama' ),
		'id'      => 'panorama_menu',
		'std'     => '',
		'type'    => 'select',
		'options' => $menu_list
	);

	return $field;

}

add_action( 'pwc_addons_panorama_license', 'pwc_addons_panorama_license', 10, 1 );

function pwc_addons_panorama_license() {

	$license = get_option( 'pwcp_license_key' );
	$status  = get_option( 'pwcp_license_status' );

	$license_hide = '';
	if( $license ) {
		$license_hide = substr($license, 0, -24) . str_repeat("*", 24);
	}

	?>
	<div class="wrap">
		<h3><?php esc_html_e( 'Active license for automatic update', 'panorama' ); ?></h3>
		<form method="post" action="options.php">

			<?php settings_fields('pwcp_license'); ?>

			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row" valign="top">
							<?php esc_html_e( 'License Key', 'panorama' ); ?>
						</th>
						<td>
							<input id="pwcp_license_key" name="pwcp_license_key" type="text" class="regular-text" value="<?php esc_attr_e( $license_hide ); ?>" />
							<label class="description" for="pwcp_license_key"><?php esc_html_e('Enter your license key', 'panorama'); ?></label>
						</td>
					</tr>
					<?php // if( false !== $license ) { ?>
						<tr valign="top">
							<th scope="row" valign="top">
								<?php esc_html_e( 'Activate License', 'panorama' ); ?>
							</th>
							<td>
								<?php if( $status !== false && $status == 'valid' ) { ?>
									<span class="license-active-status"><?php esc_html_e( 'Active', 'panorama' ); ?></span>
									<?php wp_nonce_field( 'pwcp_nonce', 'pwcp_nonce' ); ?>
									<input type="submit" class="button-secondary" name="pwcp_license_deactivate" value="<?php esc_attr_e( 'Deactivate License', 'panorama' ); ?>"/>
								<?php } else {
									wp_nonce_field( 'pwcp_nonce', 'pwcp_nonce' ); ?>
									<input type="submit" class="button-secondary" name="pwcp_license_activate" value="<?php esc_attr_e( 'Activate License', 'panorama' ); ?>"/>
								<?php } ?>
							</td>
						</tr>
					<?php //} ?>
				</tbody>
			</table>

		</form>

		<h3><?php esc_html_e( 'Buy License', 'panorama' ); ?></h3>
		<?php if( $status !== false && $status == 'valid' ) : ?>
			<p><?php esc_html_e( 'If you need another license, Please purchase the license through below this link.', 'panorama' ); ?></p>
		<?php else: ?>
			<p><?php esc_html_e( 'Please purchase the license through below this link.', 'panorama' ); ?></p>
		<?php endif; ?>
		<a href="https://luminesthemes.com/items/panorama-skin-addon/" target="_blank" class="button-primary"><?php esc_html_e( 'Buy Product', 'panorama' ); ?></a>
	</div>
	<?php
}