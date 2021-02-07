<#

function randomText( len ){
	var text = "";
	var charset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

	for( var i=0; i < len; i++ ){
    	text += charset.charAt(Math.floor(Math.random() * charset.length));
    }

	return text;
}

// Variable declaration
var default_html_template,
	atts,
	wrap_class,
	style,
	form_fields,
	css_custom,
	btn_style,
	btn_size,
	btn_type,
	btn_color,
	_n_success,
	_n_mail_disabled,
	_n_required,
	_n_email_error,
	_n_url,
	_n_number,
	_n_length,
	_n_alphanumeric,
	_n_quantity,
	_n_recaptcha,
	send_to,
	email_address,
	recaptcha,
	subject,
	email_template,
	html_template,
	type,
	label,
	required,
	alphanumeric,
	placeholder,
	width,
	clear,
	name,
	icon,
	min,
	max,
	min_quantity,
	max_quantity,
	help,
	options,
	btn_text,
	optional,
	required,
	alphanumeric,
	template_html,
	field_html = '',
	field_uid,
	validation_range,
	quantity_range,
	recaptcha_html,
	values = [],
	notice,
	attr,
	error_message,
	wrap_start,
	wrap_end,
	before_field,
	after_field,
	icon_html;

default_html_template = '<html><body><table><tbody><tr><td>Name</td><td>{{Name}}</td></tr><tr><td>Email</td><td>{{Email}}</td></tr></tbody></table></body></html>';

//init atts variable and define some variable for using
atts             = ( data.atts !== undefined ) ? data.atts : {};
wrap_class       = [];
// Appearance
style            = kc.std( atts, 'style', 'simple' ); // simple, round, line, modern-line
// Form Fields
form_fields      = jQuery.parseJSON( kc.tools.base64.decode( kc.std( atts, 'form_fields', '' ) ) );
// Styling
css_custom       = kc.std( atts, 'css_custom', '' );
// Button Style
btn_style        = kc.std( atts, 'btn_style', 'btn-solid' );
btn_size         = kc.std( atts, 'btn_size', 'btn-md' );
btn_type         = kc.std( atts, 'btn_type', 'btn-oval' );
btn_primary      = kc.std( atts, 'btn_primary', 'btn-primary' );
// Notices
_n_success       = kc.tools.base64.decode( kc.std( atts, '_n_success', 'Your message was successfully sent' ) );
_n_mail_disabled = kc.tools.base64.decode( kc.std( atts, '_n_mail_disabled', 'The e-mail could not be sent. Possible reason: your host may have disabled the mail() function.' ) );
_n_required      = kc.tools.base64.decode( kc.std( atts, '_n_required', 'You cannot leave this field as empty' ) );
_n_email_error   = kc.tools.base64.decode( kc.std( atts, '_n_email_error', 'You have not given a correct e-mail address' ) );
_n_url           = kc.tools.base64.decode( kc.std( atts, '_n_url', 'The input value is not a correct URL' ) );
_n_number        = kc.tools.base64.decode( kc.std( atts, '_n_number', 'The input value was not a correct number' ) );
_n_length        = kc.tools.base64.decode( kc.std( atts, '_n_length', 'Please follow the character range' ) );
_n_alphanumeric  = kc.tools.base64.decode( kc.std( atts, '_n_alphanumeric', 'The input value can only contain alphanumeric characters' ) );
_n_quantity      = kc.tools.base64.decode( kc.std( atts, '_n_quantity', 'Please choose between in this range of items' ) );
_n_recaptcha     = kc.tools.base64.decode( kc.std( atts, '_n_recaptcha', 'You are a robot' ) );
// Form Settings
send_to          = kc.std( atts, 'send_to', 'admin_email' ); //admin_email, different_email
email_address    = kc.std( atts, 'email_address', '' );
recaptcha        = kc.std( atts, 'recaptcha', 'no' ); // yes, no
// Email Settings
subject          = kc.std( atts, 'subject', '' );
email_template   = kc.std( atts, 'email_template', 'text' ); // text, html
html_template    = kc.std( atts, 'html_template', default_html_template );
	
wrap_class 		= kc.front.el_class( atts );
 
wrap_class.push('contact-form-wrap' );

// For passing those values to retrieve in mail ajax function
values['email']            = ( 'admin_email' == send_to ) ? '' : email_address; // pix_configurator.admin_email
values['subject']          = ( '' != subject ) ? subject : '';
values['success_notice']   = ( '' != _n_success ) ? _n_success : kc.tools.base64.decode( 'Your message was successfully sent' );
values['mail_disabled']    = ( '' != _n_mail_disabled ) ? _n_mail_disabled : kc.tools.base64.decode( 'The e-mail could not be sent. Possible reason: your host may have disabled the mail() function.' );
values['recaptcha_notice'] = ( '' != _n_recaptcha ) ? _n_recaptcha : kc.tools.base64.decode( 'You are a robot' );
values['email_template']   = email_template;
values['recaptcha']        = recaptcha;

// Html tags
wrap_start = '<div class="'+ kc.tools.esc_attr( 'form-'+style ) +'">';
wrap_end   = '</div>';

//console.log(form_fields);

for( var key in form_fields ) {

	// Empty assignment
	attr = [];
	notice = [];
	error_message = [];

	// Field values
	type         = ( ! _.isUndefined( form_fields[key]['type'] ) ) ? form_fields[key]['type'] : 'text',
	label        = ( ! _.isUndefined( form_fields[key]['label'] ) ) ? form_fields[key]['label'] : '',
	required     = ( ! _.isUndefined( form_fields[key]['required'] ) ) ? form_fields[key]['required'] : 'no',
	alphanumeric = ( ! _.isUndefined( form_fields[key]['alphanumeric'] ) ) ? form_fields[key]['alphanumeric'] : 'no',
	placeholder  = ( ! _.isUndefined( form_fields[key]['placeholder'] ) ) ? form_fields[key]['placeholder'] : '',
	width        = ( ! _.isUndefined( form_fields[key]['width'] ) ) ? form_fields[key]['width'] : 'col4',
	clear        = ( ! _.isUndefined( form_fields[key]['clear'] ) ) ? form_fields[key]['clear'] : 'no',
	name         = ( ! _.isUndefined( form_fields[key]['name'] ) ) ? form_fields[key]['name'] : '',
	icon         = ( ! _.isUndefined( form_fields[key]['icon'] ) ) ? form_fields[key]['icon'] : '',
	min          = ( ! _.isUndefined( form_fields[key]['min'] ) ) ? form_fields[key]['min'] : '1',
	max          = ( ! _.isUndefined( form_fields[key]['max'] ) ) ? form_fields[key]['max'] : '10',		
	min_quantity = ( ! _.isUndefined( form_fields[key]['min_quantity'] ) ) ? form_fields[key]['min_quantity'] : '1',
	max_quantity = ( ! _.isUndefined( form_fields[key]['max_quantity'] ) ) ? form_fields[key]['max_quantity'] : '',
	help         = ( ! _.isUndefined( form_fields[key]['help'] ) ) ? form_fields[key]['help'] : '',	
	options      = ( ! _.isUndefined( form_fields[key]['options'] ) ) ? form_fields[key]['options'] : '',
	btn_text     = ( ! _.isUndefined( form_fields[key]['btn_text'] ) ) ? form_fields[key]['btn_text'] : kc.tools.base64.decode( 'Submit' ),
	
	clear        = ( 'yes' == clear ) ? 'clear' : '';
	optional     = ( 'no' == required ) ? 'data-validation-optional="true"' : '',
	required     = ( 'yes' == required ) ? 'required' : '',
	alphanumeric = ( 'yes' == alphanumeric ) ? 'alphanumeric' : '';
	options = ( '' != options ) ? options.split('|') : [];

	// Validation range
	if( '' != min && '' != max ) {
		validation_range = min+'-'+max;
	}
	else if( '' != min ) {
		validation_range = 'min'+min;
	}
	else if( '' != max ) {
		validation_range = 'max'+max;
	}

	// Quantity range
	if( '' != min_quantity && '' != max_quantity ) {
		quantity_range = min_quantity+'-'+max_quantity;
	}
	else if( '' != min_quantity ) {
		quantity_range = 'min'+min_quantity;
	}
	else if( '' != max_quantity ) {
		quantity_range = 'max'+max_quantity;
	}

	// Error notices array
	notice['required']     = ( '' != _n_required ) ? 'data-validation-error-msg-required="'+ kc.tools.esc_attr( _n_required ) +'"' : '';
	notice['email']        = ( '' != _n_email_error ) ? 'data-validation-error-msg-email="'+ kc.tools.esc_attr( _n_email_error ) +'"' : '';
	notice['url']          = ( '' != _n_url ) ? 'data-validation-error-msg-email="'+ kc.tools.esc_attr( _n_url ) +'"' : '';
	notice['number']       = ( '' != _n_number ) ? 'data-validation-error-msg-number="'+ kc.tools.esc_attr( _n_number ) +'"' : '';
	//notice['length']       = ( '' != _n_length ) ? 'data-validation-error-msg-length="'+ kc.tools.esc_attr( _n_length ) +' '+ validation_range +'"' : '';
	notice['alphanumeric'] = ( '' != _n_alphanumeric ) ? 'data-validation-error-msg-alphanumeric="'+ kc.tools.esc_attr( _n_alphanumeric ) +'"' : '';
	//notice['quantity']     = ( '' != _n_quantity ) ? 'data-validation-error-msg-qty="'+ kc.tools.esc_attr( _n_quantity ) +' '+ quantity_range +'"' : '';

	icon_html   = ( '' != icon ) ? '<i class="'+ kc.tools.esc_attr( icon ) +'"></i>' : '';

	// Generate unique id
	if( 'radio' != type && 'checkbox' != type ) {
		field_uid = randomText( 4 )+'-'+randomText( 4 );
	}

	// Email Template
	if( 'html' == email_template ) {
		template_html = html_template;
	}

	// Html tags
	before_field   = '<div class="field-group '+ kc.tools.esc_attr( width +' '+ clear ) +'">';
	after_field    = '</div>';

	// It wraps the field
	field_html += before_field;

	if( '' != label ) {
		if( 'radio' != type && 'checkbox' != type ) {
			field_html += '<label for="'+ kc.tools.esc_attr( field_uid ) +'">'+ kc.tools.esc( label ) +'</label>';
		}
		else {
			field_html += '<label>'+ kc.tools.esc( label ) +'</label>';
		}
	}

	switch( type ) {

    	case 'text':

			attr[0] = 'id="'+ kc.tools.esc_attr( field_uid ) +'"';
			attr[1] = 'type="text"';
			attr[2] = 'name="'+ kc.tools.esc_attr( name ) +'"';
			attr[3] = 'placeholder="'+ kc.tools.esc_attr( placeholder ) +'"';
			attr[4] = 'class="textfield"';
			attr[5] = 'data-validation="'+ kc.tools.esc_attr( required +' '+ alphanumeric ) +' length"';
			attr[6] = 'data-validation-length="'+ kc.tools.esc_attr( validation_range ) +'"';
			attr[7] = optional;
			attr[8] = 'data-validation-help="'+ kc.tools.esc_attr( help ) +'"';
			attr[9] = notice['required'] +' '+ notice['alphanumeric'] +' '+ notice['length'];

			field_html += '<input '+ attr.join( ' ' ) +'>';
			field_html += icon_html;
			field_html += '<span class="error"></span>';

		break;

		case 'email':

			attr[0] = 'id="'+ kc.tools.esc_attr( field_uid ) +'"';
			attr[1] = 'type="text"';
			attr[2] = 'name="'+ kc.tools.esc_attr( name ) +'"';
			attr[3] = 'placeholder="'+ kc.tools.esc_attr( placeholder ) +'"';
			attr[4] = 'class="textfield"';
			attr[5] = 'data-validation="'+ kc.tools.esc_attr( required ) +' email"';
			attr[6] = 'data-validation-length="'+ kc.tools.esc_attr( validation_range ) +'"';
			attr[7] = optional;
			attr[8] = 'data-validation-help="'+ kc.tools.esc_attr( help ) +'"';
			attr[9] = notice['required'] +' '+ notice['email'];

			field_html += '<input '+ attr.join( ' ' ) +'>';
			field_html += icon_html;
			field_html += '<span class="error"></span>';

		break;

    	case 'number':

			attr[0] = 'id="'+ kc.tools.esc_attr( field_uid ) +'"';
			attr[1] = 'type="text"';
			attr[2] = 'name="'+ kc.tools.esc_attr( name ) +'"';
			attr[3] = 'placeholder="'+ kc.tools.esc_attr( placeholder ) +'"';
			attr[4] = 'class="textfield"';
			attr[5] = 'data-validation="'+ kc.tools.esc_attr( required ) +' number length"';
			attr[6] = 'data-validation-length="'+ kc.tools.esc_attr( validation_range ) +'"';
			attr[7] = optional;
			attr[8] = 'data-validation-help="'+ kc.tools.esc_attr( help ) +'"';
			attr[9] = notice['required'] +' '+ notice['number'] +' '+ notice['length'];

			field_html += '<input '+ attr.join( ' ' ) +'>';
			field_html += icon_html;
			field_html += '<span class="error"></span>';

		break;

    	case 'url':

			attr[0] = 'id="'+ kc.tools.esc_attr( field_uid ) +'"';
			attr[1] = 'type="text"';
			attr[2] = 'name="'+ kc.tools.esc_attr( name ) +'"';
			attr[3] = 'placeholder="'+ kc.tools.esc_attr( placeholder ) +'"';
			attr[4] = 'class="textfield"';
			attr[5] = 'data-validation="'+ kc.tools.esc_attr( required ) +' url"';
			attr[6] = 'data-validation-length="'+ kc.tools.esc_attr( validation_range ) +'"';
			attr[7] = optional;
			attr[8] = 'data-validation-help="'+ kc.tools.esc_attr( help ) +'"';
			attr[9] = notice['required'] +' '+ notice['url'];

			field_html += '<input '+ attr.join( ' ' ) +'>';
			field_html += icon_html;
			field_html += '<span class="error"></span>';

		break;

		case 'textarea':

			attr[0] = 'id="'+ kc.tools.esc_attr( field_uid ) +'"';
			attr[1] = 'name="'+ kc.tools.esc_attr( name ) +'"';
			attr[2] = 'class="textarea"';
			attr[3] = 'data-validation="'+ kc.tools.esc_attr( required +' '+ alphanumeric ) +'"';
			attr[4] = 'data-validation-length="'+ kc.tools.esc_attr( validation_range ) +'"';
			attr[5] = optional;
			attr[6] = 'data-validation-help="'+ kc.tools.esc_attr( help ) +'"';
			attr[7] = notice['required'] +' '+ notice['alphanumeric'] +' '+ notice['length'];

			field_html += '<textarea '+ attr.join( ' ' ) +'>'+ kc.tools.esc( placeholder ) +'</textarea>';
			field_html += icon_html;
			field_html += '<span class="error"></span>';

		break;

		case 'radio':

			if( options.length > 0 ) {

				for( var key in options ) {

					attr = [];

					field_uid = randomText( 4 )+'-'+randomText( 4 );

					attr[0] = 'id="'+ kc.tools.esc_attr( field_uid ) +'"';
					attr[1] = 'type="radio"';
					attr[2] = 'name="'+ kc.tools.esc_attr( name ) +'"';
					attr[3] = 'class="radio"';
					attr[4] = 'value="'+ kc.tools.esc_attr( options[key] ) +'"';
					attr[5] = ( 0 == key ) ? 'checked' : '';
					attr[6] = 'data-validation="'+ kc.tools.esc_attr( required ) +'"';
					attr[7] = optional;
					attr[8] = notice['required'];

					field_html += '<input '+ attr.join( ' ' ) +'>';
					field_html += '<label for="'+ kc.tools.esc_attr( field_uid ) +'">'+ kc.tools.esc( options[key] ) +'</label>';
				}

				field_html += '<span class="error"></span>';

			}

		break;

		case 'checkbox':

			if( options.length > 0 ) {

				for( var key in options ) {

					attr = [];

					field_uid = randomText( 4 )+'-'+randomText( 4 );

					attr[0] = 'id="'+ kc.tools.esc_attr( field_uid ) +'"';
					attr[1] = 'type="checkbox"';
					attr[2] = 'name="'+ kc.tools.esc_attr( name ) +'"';
					attr[3] = 'class="checkbox"';
					attr[4] = 'value="'+ kc.tools.esc_attr( options[key] ) +'"';
					attr[5] = 'data-validation="'+ kc.tools.esc_attr( required ) +'"';
					attr[6] = 'data-validation-qty="'+ kc.tools.esc_attr( quantity_range ) +'"';
					attr[7] = optional;
					attr[8] = notice['required'];

					field_html += '<input '+ attr.join( ' ' ) +'>';
					field_html += '<label for="'+ kc.tools.esc_attr( field_uid ) +'">'+ kc.tools.esc( options[key] ) +'</label>';
				}

				field_html += '<span class="error"></span>';

			}

		break;

		case 'select':

			if( options.length > 0 ) {

				attr[0] = 'id="'+ kc.tools.esc_attr( field_uid ) +'"';
				attr[1] = 'name="'+ kc.tools.esc_attr( name ) +'"';
				attr[2] = 'class="select"';
				attr[3] = 'data-validation="'+ kc.tools.esc_attr( required ) +'"';
				attr[4] = optional;
				attr[5] = notice['required'];

				field_html += '<select '+ attr.join( ' ' ) +'>';
					field_html += '<option value="empty">'+ kc.tools.esc( 'Choose the option' ) +'</option>';

					for( var key in options ) {

						field_html += '<option value="'+ kc.tools.esc_attr( options[key] ) +'">'+ kc.tools.esc( options[key] ) +'</option>';
					}

				field_html += '</select>';

				field_html += '<span class="error"></span>';

			}

		break;

		case 'submit':

			attr[0] = 'type="submit"';
			attr[1] = 'name="'+ kc.tools.esc_attr( name ) +'"';
			attr[2] = 'class="submit submit-contact-form btn '+ btn_style +' '+ btn_size +' '+ btn_type +' '+ btn_color +'"';

			field_html += '<button '+ attr.join( ' ' ) +'>'+ kc.tools.esc( btn_text ) +'</button>';

		break;

	    default:
	    break;
	}

	// It wraps the field
	field_html += after_field;

}
 
#>
<div class="{{{wrap_class.join(' ')}}}" >
	<form action='POST' class='contact-form'>
		{{{wrap_start}}}
			<div class="row">
				{{{field_html}}}
			</div>
		{{{wrap_end}}}
	</form>
</div>