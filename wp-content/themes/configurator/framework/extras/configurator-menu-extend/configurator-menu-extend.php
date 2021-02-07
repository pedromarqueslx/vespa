<?php
class Configurator_Menu_Extend {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {

		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'configurator_add_custom_nav_fields' ) );
		
		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'configurator_update_custom_nav_fields'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'configurator_edit_walker'), 10, 2 );

		//adding required menu scripts
		add_action( 'admin_enqueue_scripts', array( $this,'configurator_menu_admin_scripts') );

	} // end constructor


	/**
	 * Load Required Styles and scripts 
	 * only for Nav Menu page.
	 * 
	*/
	function configurator_menu_admin_scripts($hook_suffix) {
		if('nav-menus.php' ==  $hook_suffix){
			//Loading Css
    		wp_enqueue_style('fontawesome', "//use.fontawesome.com/releases/v5.3.1/css/all.css", array(), '5.3.1');
			wp_enqueue_style('menu_style', CONFIGURATOR_EXTRAS_URI ."/configurator-menu-extend/css/style.css");
			//Load Insert Icon Plugin
			wp_enqueue_media();
			wp_enqueue_script( 'pix_media_manager', CONFIGURATOR_FRAMEWORK_URI .'/admin/_js/media-upload.js', array( 'jquery' ));
			wp_enqueue_script( 'menu_js', CONFIGURATOR_EXTRAS_URI .'/configurator-menu-extend/js/dialog.js', array( 'jquery' ));
			
		}
	}	
	

	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function configurator_add_custom_nav_fields( $menu_item ) {

		$menu_item->icon = get_post_meta( $menu_item->ID, '_menu_item_icon', true );
		$menu_item->megamenu = get_post_meta( $menu_item->ID, '_menu_item_megamenu', true );
		$menu_item->megamenucol = get_post_meta( $menu_item->ID, '_menu_item_megamenucol', true );
		$menu_item->megamenupos = get_post_meta( $menu_item->ID, '_menu_item_megamenupos', true );
		$menu_item->megamenutitle = get_post_meta( $menu_item->ID, '_menu_item_megamenutitle', true );
		$menu_item->megamenubgimg = get_post_meta( $menu_item->ID, '_menu_item_megamenubgimg', true );
		$menu_item->newtag = get_post_meta( $menu_item->ID, '_menu_item_newtag', true );
		$menu_item->imageurl = get_post_meta( $menu_item->ID, '_menu_item_imageurl', true );
		$menu_item->megamenuchildtitle = get_post_meta( $menu_item->ID, '_menu_item_megamenuchildtitle', true );
		return $menu_item;
	
	}
	
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function configurator_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
		// Check if element is properly sent
		if ( isset($_REQUEST['menu-item-icon']) && is_array( $_REQUEST['menu-item-icon']) ) {
			$icon_value = (isset($_REQUEST['menu-item-icon'][$menu_item_db_id]) && $_REQUEST['menu-item-icon'][$menu_item_db_id])  ? $_REQUEST['menu-item-icon'][$menu_item_db_id] : '';
			update_post_meta( $menu_item_db_id, '_menu_item_icon', $icon_value );
		}

		if ( isset($_REQUEST['menu-item-megamenu']) && is_array( $_REQUEST['menu-item-megamenu']) && isset($_REQUEST['menu-item-megamenu'][$menu_item_db_id]) ){		
			update_post_meta( $menu_item_db_id, '_menu_item_megamenu', true );
		}else{
			update_post_meta( $menu_item_db_id, '_menu_item_megamenu', false );
		}

		if ( isset($_REQUEST['menu-item-megamenucol']) && is_array( $_REQUEST['menu-item-megamenucol']) ) {
			$megamenucol_value = (isset($_REQUEST['menu-item-megamenucol'][$menu_item_db_id]) && $_REQUEST['menu-item-megamenucol'][$menu_item_db_id])  ? $_REQUEST['menu-item-megamenucol'][$menu_item_db_id] : '';
			update_post_meta( $menu_item_db_id, '_menu_item_megamenucol', $megamenucol_value );
		}

		if ( isset($_REQUEST['menu-item-megamenupos']) && is_array( $_REQUEST['menu-item-megamenupos']) && isset($_REQUEST['menu-item-megamenupos'][$menu_item_db_id]) ){			
			update_post_meta( $menu_item_db_id, '_menu_item_megamenupos', true );
		}else{
			update_post_meta( $menu_item_db_id, '_menu_item_megamenupos', false );
		}

		if ( isset($_REQUEST['menu-item-megamenutitle']) && is_array( $_REQUEST['menu-item-megamenutitle']) && isset($_REQUEST['menu-item-megamenutitle'][$menu_item_db_id]) ){			
			update_post_meta( $menu_item_db_id, '_menu_item_megamenutitle', true );
		}else{
			update_post_meta( $menu_item_db_id, '_menu_item_megamenutitle', false );
		}

		if ( isset($_REQUEST['menu-item-megamenubgimg']) && is_array( $_REQUEST['menu-item-megamenubgimg']) && isset($_REQUEST['menu-item-megamenubgimg'][$menu_item_db_id]) ){
			update_post_meta( $menu_item_db_id, '_menu_item_megamenubgimg', $_REQUEST['menu-item-megamenubgimg'][$menu_item_db_id] );
		}else{
			update_post_meta( $menu_item_db_id, '_menu_item_megamenubgimg', '[]' );
		}

		if ( isset($_REQUEST['menu-item-newtag']) && is_array( $_REQUEST['menu-item-newtag']) && isset($_REQUEST['menu-item-newtag'][$menu_item_db_id]) ){		
			update_post_meta( $menu_item_db_id, '_menu_item_newtag', true );
		}else{
			update_post_meta( $menu_item_db_id, '_menu_item_newtag', false );
		}

		if ( isset($_REQUEST['menu-item-imageurl']) && is_array( $_REQUEST['menu-item-imageurl']) && isset($_REQUEST['menu-item-imageurl'][$menu_item_db_id]) ){
			update_post_meta( $menu_item_db_id, '_menu_item_imageurl', $_REQUEST['menu-item-imageurl'][$menu_item_db_id] );
		}else{
			update_post_meta( $menu_item_db_id, '_menu_item_imageurl', '' );
		}

		if ( isset($_REQUEST['menu-item-megamenuchildtitle']) && is_array( $_REQUEST['menu-item-megamenuchildtitle']) && isset($_REQUEST['menu-item-megamenuchildtitle'][$menu_item_db_id]) && $_REQUEST['menu-item-megamenuchildtitle'][$menu_item_db_id] ){			
			update_post_meta( $menu_item_db_id, '_menu_item_megamenuchildtitle', true );
		}else{
			update_post_meta( $menu_item_db_id, '_menu_item_megamenuchildtitle', false );
		}

		
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function configurator_edit_walker($walker,$menu_id) {
	
		return 'Configurator_Walker_Nav_Menu_Edit_Custom';
	
	}

}

// instantiate class
$GLOBALS['pix_entend_menu'] = new Configurator_Menu_Extend();

include_once( CONFIGURATOR_EXTRAS . '/configurator-menu-extend/configurator_edit_custom_walker.php' );
include_once( CONFIGURATOR_EXTRAS . '/configurator-menu-extend/configurator_custom_walker.php' );