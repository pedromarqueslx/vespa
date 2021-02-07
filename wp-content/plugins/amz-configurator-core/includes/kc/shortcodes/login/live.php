<#

// Variable declaration
var atts,
	wrap_class,
	my_account_html = '';

//init atts variable and define some variable for using
atts                = ( data.atts !== undefined ) ? data.atts : {};
wrap_class          = [];
// My Account
my_account_title    = kc.tools.base64.decode( kc.std( atts, 'my_account_title', 'My Account' ) );
update_btn_txt      = kc.tools.base64.decode( kc.std( atts, 'update_btn_txt', 'Update' ) );
	
wrap_class 		= kc.front.el_class( atts );
 
wrap_class.push('my-account-wrap' );


 
#>
<div class="{{{wrap_class.join(' ')}}}" >
	<p><?php esc_html__( 'Forms not displayed via Ajax, Please save and refresh the page.', 'configurator' ); ?></p>
</div>