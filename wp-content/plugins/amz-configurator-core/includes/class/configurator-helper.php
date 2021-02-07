<?php

function configurator_contact_form(){

    // Empty assignment
    $last_field = $message = $header = '';
    $rebuild_fields = array();
    $error = false;

    // Get ajax values
    $template = isset( $_POST['template'] ) ? $_POST['template'] : '';
    $field    = isset( $_POST['field'] ) ? $_POST['field'] : '';
    $values   = isset( $_POST['values'] ) ? $_POST['values'] : '';
    $response = isset( $_POST['response'] ) ? $_POST['response'] : '';

    // Separate values
    if( !empty( $values ) ) {
        // It returns those variables: $email, $subject, $success_notice, $mail_disabled, $email_template, $recaptcha
        extract( $values['values'] );
    }

    // Rebuild array
    if( !empty( $field ) ) {
        foreach ( $field as $key => $value ) {
            if( $last_field != $value['name'] ) {
                $rebuild_fields[ $value['name'] ] = array( $value['value'] );
            }
            else { // for checkbox
                $rebuild_fields[ $value['name'] ] = array_merge( array( $value['value'] ), $old_val );
            }

            $old_val = array( $value['value'] );
            $last_field = isset( $value['name'] ) ? $value['name'] : '';
        }
    }

    // Mail subject
    $subject = !empty( $subject ) ? $subject : esc_html__( 'Mail from ', 'configurator' ). get_bloginfo( 'name' );

    if( 'text' == $email_template ) {
        if( !empty( $rebuild_fields ) ) {

            $message .= $subject.':';
            $message .= "\r\n\r\n"; // break the line

            foreach ( $rebuild_fields as $key => $value ) {
                $message .= esc_html( $key ) .' : '. esc_html( implode( ', ', $value ) );
                $message .= "\r\n\r\n"; // break the line
            }
        }
    }
    else {
        if( !empty( $rebuild_fields ) ) {
            foreach ( $rebuild_fields as $key => $value ) {
                $template = str_replace('{{'. $key .'}}', implode( ', ', $value ), $template );
            }
        }

        // Always set content-type when sending HTML email
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $message = $template;
    }

    // Recaptcha
    $sitekey = get_theme_mod( 'recaptcha_sitekey' );
    $secretkey = get_theme_mod( 'recaptcha_secretkey' );

    if( 'yes' == $recaptcha && !empty( $sitekey ) && !empty( $secretkey ) ) {

        //Protocol
        $protocol = is_ssl() ? 'https' : 'http';
        
        $response = file_get_contents( esc_url( $protocol.'://www.google.com/recaptcha/api/siteverify?secret='. $secretkey .'&response='. $recaptcha ) );
        $response = json_decode( $response, true );

        if( $response["success"] === true ) {
            echo json_encode( array( 'notice' => esc_html( $success_notice ) ) );
            $error = false;
        }
        else {
            echo json_encode( array( 'notice' => esc_html( $recaptcha_notice ) ) );
            $error = true;
        }
    }

    if( !$error ) {
        if ( wp_mail( $email, $subject, $message, $header ) ) {
            echo json_encode( array( 'notice' => esc_html( $success_notice ) ) );
        }
        else {
            echo json_encode( array( 'notice' => esc_html( $mail_disabled ) ) );
        }
    }    

    die();
}

// ajax functions
add_action('wp_ajax_configurator_contact_form',  'configurator_contact_form' );
add_action('wp_ajax_nopriv_configurator_contact_form', 'configurator_contact_form' );


function configurator_ajax_login_form() {

    // Log the current user out, by destroying the current user session.
    if( is_user_logged_in() ) {
        wp_logout();
    }    

    // Get ajax values
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $remember = isset($_POST['remember']) ? $_POST['remember'] : false;

    $error = 0;
    $username_notice = $password_notice = '';

    if( empty( $username ) || empty( $password ) ) {

        $error = 1;

        if( empty( $username ) ) {
            $username_notice = esc_html__( 'Type the username', 'configurator' );
        }
        if( !username_exists( $username ) ) {
            $username_notice = esc_html__( 'Username does not exists', 'configurator' );
        }
        if( empty( $password ) ) {
            $password_notice = esc_html__( 'Type the password', 'configurator' );
        }
    }
    else {

        if( !username_exists( $username ) ) {
            $error = 1;
            $username_notice = esc_html__( 'Username does not exists', 'configurator' );
        }
        else {
            $user_obj = get_user_by( 'login', $username );

            if( !wp_check_password( $password, $user_obj->user_pass ) ) {
                $error = 1;
                $password_notice = esc_html__( 'The password you entered for the username is incorrect', 'configurator' );
            }
        }
    }

    if( $error ) {
        echo json_encode( array( 
            'error' => 1,
            'username' => esc_html( $username_notice ),
            'password' => esc_html( $password_notice )
        ) );
    }
    else {
        $user_data = array();
        $user_data['user_login'] = $username;
        $user_data['user_password'] = $password;
        $user_data['remember'] = $remember;


        $user = wp_signon( $user_data, true );

        wp_set_current_user( $user->ID, $user->user_login );
        wp_set_auth_cookie( $user->ID );
        do_action( 'wp_login', $user->user_login );

        // Get redirect link
        $redirect = get_option( 'login_page_id' );

        // Login page url
        if( !empty( $redirect ) ) {
                $url = esc_url( get_permalink( $redirect ) );
        }
        else {
            $url = esc_url( home_url( '/' ) );               
        }

        echo json_encode( array( 
            'error' => 0,
            'success' => esc_html__( 'Login Successfully', 'configurator' ),
            'redirect' => $url
        ) );
    }

    die();
}

// ajax functions
add_action('wp_ajax_configurator_ajax_login_form',  'configurator_ajax_login_form' );
add_action('wp_ajax_nopriv_configurator_ajax_login_form', 'configurator_ajax_login_form' );


function configurator_ajax_forgot_form() {

    // Get ajax values
    $user_login = isset($_POST['user_login']) ? $_POST['user_login'] : '';
    
    $error = '';
    $success = '';
    
    // check if we're in reset form
    $user_login = trim( $user_login );

    $errors = new WP_Error();


 
    if ( empty( $user_login ) ) {

        $errors->add( 'empty_username', __( 'Enter a username or e-mail address.', 'configurator' ) );

    }
    else if ( strpos( $user_login, '@' ) ) {
        $user_data = get_user_by( 'email', trim( $user_login ) );

        if ( empty( $user_data ) )
            $errors->add( 'invalid_email', esc_html__( 'There is no user registered with that email address.', 'configurator' ) );
    }
    else {
        $login = trim( $user_login );
        $user_data = get_user_by( 'login', $login );
    }

    do_action( 'lostpassword_post', $errors );
 
    // Redefining user_login ensures we return the right case in the email.
    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;
    $key = get_password_reset_key( $user_data );
 
    if ( is_wp_error( $key ) ) {
        return $key;
    }
 
    $message = esc_html__( 'Someone requested that the password be reset for the following account:','configurator' ) . "\r\n\r\n";
    $message .= network_home_url( '/' ) . "\r\n\r\n";
    $message .= sprintf( esc_html__('Username: %s','configurator'), $user_login) . "\r\n\r\n";
    $message .= esc_html__( 'If this was a mistake, just ignore this email and nothing will happen.','configurator' ) . "\r\n\r\n";
    $message .= esc_html__( 'To reset your password, visit the following address:','configurator' ) . "\r\n\r\n";

    $redirect = get_option( 'login_redirect' );

    if( 'dashboard' != $redirect && !empty( $redirect ) ) {
            $url = esc_url( get_permalink( $redirect ) );
    }
    else if( 'dashboard' == $redirect ) {
        $url = esc_url( get_admin_url() );
    }
    else {
        $url = esc_url( home_url( '/' ) );               
    }

    $params = array( 'action' => 'rp', 'key' => $key, 'login' => rawurlencode( $user_login) );

    $url = add_query_arg( $params, $url );
    
    // replace PAGE_ID with reset page ID
    $message .= $url;
 
    if ( is_multisite() ) {
        $blogname = $GLOBALS['current_site']->site_name;
    }
    else {
        $blogname = wp_specialchars_decode( get_option('blogname'), ENT_QUOTES );
    }
 
    $title = sprintf( __('[%s] Password Reset', 'configurator'), $blogname );
    
    
    $title = apply_filters( 'retrieve_password_title', $title, $user_login, $user_data );
     
    $message = apply_filters( 'retrieve_password_message', $message, $key, $user_login, $user_data );
    
    if ( wp_mail( $user_email, wp_specialchars_decode( $title ), $message ) ) {
        $errors->add( 'confirm', esc_html__( 'Check your e-mail for the confirmation link.', 'configurator' ), 'message' );
    }
    else {
        $errors->add('could_not_sent', esc_html__( 'The e-mail could not be sent.', 'configurator' ) . "<br />\n" . esc_html__( 'Possible reason: your host may have disabled the mail() function.', 'configurator' ), 'message');
    }
    
    if( $errors->get_error_code() ) {
        echo json_encode(
            array(
                'error' => 1,
                'notice' => $errors->get_error_message( $errors->get_error_code() )
            )
        );
    }

    if( ! empty( $success_notice ) ) {
        echo json_encode(
            array(
                'error' => 0,
                'notice' => $success_notice
            )
        );
    }
    

    die();
}

// ajax functions
add_action('wp_ajax_configurator_ajax_forgot_form',  'configurator_ajax_forgot_form' );
add_action('wp_ajax_nopriv_configurator_ajax_forgot_form', 'configurator_ajax_forgot_form' );

function configurator_ajax_reset_form() {

    // Get ajax values
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $key = isset($_POST['key']) ? $_POST['key'] : '';
    $errors = new WP_Error();
    
    $user = check_password_reset_key( $key, $login );

    if( !is_wp_error( $user ) ) {
 
        // check to see if user added some string
        if( empty( $password ) ) {
            $errors->add( 'password_required', esc_html__( 'Password is required field', 'configurator' ) );
            $error_notice = esc_html__( 'Password is required field', 'configurator' );
        }

        do_action( 'validate_password_reset', $errors, $user );
     
        if ( ( ! $errors->get_error_code() ) ) {
            $user_obj = get_user_by( 'login', $login );
            wp_set_password( $password, $user_obj->ID );
            
            $errors->add( 'password_reset', esc_html__( 'Your password has been reset.', 'configurator' ) );

            $success_notice = esc_html__( 'Your password has been reset.', 'configurator' );
        }

        // Get redirect link
        $redirect = get_option( 'login_redirect' );

        if( 'dashboard' != $redirect && !empty( $redirect ) ) {
                $url = esc_url( get_permalink( $redirect ) );
        }
        else if( 'dashboard' == $redirect ) {
            $url = esc_url( get_admin_url() );
        }
        else {
            $url = esc_url( home_url( '/' ) );               
        }
        
        // display notice
        if ( empty( $success_notice ) ) {
            echo json_encode( array( 
                'error' => 1,
                'notice' => $error_notice
            ) );
        }
        else {
            echo json_encode( array( 
                'error' => 0,
                'notice' => $success_notice,
                'redirect' => $url
            ) );
        }
    }
    else {

        $errors->add( 'wrong_reset_key', esc_html__( 'Wrong reset key. Please check the mail.', 'configurator' ) );
        $error_notice = esc_html__( 'Wrong reset key. Please check the mail.', 'configurator' );

        echo json_encode( array( 
            'error' => 1,
            'notice' => $error_notice
        ) );
    }

    die();
}

// ajax functions
add_action('wp_ajax_configurator_ajax_reset_form',  'configurator_ajax_reset_form' );
add_action('wp_ajax_nopriv_configurator_ajax_reset_form', 'configurator_ajax_reset_form' );

function configurator_ajax_register_form() {

    // Get ajax values
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Empty assignment
    $username_error_notice = $email_error_notice = $general_error_notice = $success_notice = '';

    $sanitized_user_login = sanitize_user( $username );
    $user_email = apply_filters( 'user_registration_email', $email );

    // Check the username
    if ( $sanitized_user_login == '' ) {
        $username_error_notice = esc_html__( 'Please enter a username.', 'configurator' );
    }
    elseif ( ! validate_username( $username ) ) {
        $username_error_notice = esc_html__( 'This username is invalid because it uses illegal characters. Please enter a valid username.', 'configurator' );
        $sanitized_user_login = '';
    }
    elseif ( username_exists( $sanitized_user_login ) ) {
        $username_error_notice = esc_html__( 'This username is already registered. Please choose another one.', 'configurator' );
    }
    else {
        /** This filter is documented in wp-includes/user.php */
        $illegal_user_logins = array_map( 'strtolower', (array) apply_filters( 'illegal_user_logins', array() ) );
        if ( in_array( strtolower( $sanitized_user_login ), $illegal_user_logins ) ) {
            $username_error_notice = esc_html__( 'Sorry, that username is not allowed.', 'configurator' );
        }
    }

    // Check the email address
    if ( $user_email == '' ) {
        $email_error_notice = esc_html__( 'Please type your email address.', 'configurator' );
    }
    elseif ( ! is_email( $user_email ) ) {
        $email_error_notice = esc_html__( 'The email address is not correct.', 'configurator' );
        $user_email = '';
    }
    elseif ( email_exists( $user_email ) ) {
        $email_error_notice = esc_html__( 'This email is already registered, please choose another one.', 'configurator' );
    }

    if ( empty( $username_error_notice ) && empty( $email_error_notice ) ) {
        $user_pass = wp_generate_password( 12, false );
        $user_id = wp_create_user( $sanitized_user_login, $user_pass, $user_email );

        if ( ! $user_id || is_wp_error( $user_id ) ) {
            $general_error_notice = esc_html__( 'Could not register you please contact the', 'configurator' ).'<a href="'. sanitize_email( get_option( 'admin_email' ) ).'">'. esc_html__( 'administrator', 'configurator' ).'</a>';

            // Set error
            $error = 1;
        }
        else {
            // Set error
            $error = 0;
        }
    }
    else {
        // Set error
        $error = 1;
    }

    if( !$error ) {

        // Get redirect link
        $redirect = get_option( 'login_page_id' );

        // Login page url
        if( !empty( $redirect ) ) {
                $url = esc_url( get_permalink( $redirect ) );
        }
        else {
            $url = esc_url( home_url( '/' ) );               
        }

        // Send password to the user if its created without any error
        $message = esc_html__( 'Howdy hello,','configurator' ) . "\r\n\r\n";
        $message .= esc_html__( 'You can log in with the following information:','configurator' ) . "\r\n\r\n";
        $message .= sprintf( esc_html__( 'Username: %s','configurator' ), $username ) . "\r\n\r\n";
        $message .= sprintf( esc_html__( 'Password: %s','configurator' ), $user_pass ) . "\r\n\r\n";
        $message .= esc_url( $url ) . "\r\n\r\n";
        $message .= esc_html__( 'Thanks!','configurator' ) . "\r\n\r\n";

        if ( is_multisite() ) {
            $blogname = $GLOBALS['current_site']->site_name;
        }
        else {
            $blogname = wp_specialchars_decode( get_option('blogname'), ENT_QUOTES );
        }

        $title = sprintf( __('[%s] Register Account', 'configurator'), $blogname );

        if ( wp_mail( $user_email, wp_specialchars_decode( $title ), $message ) ) {
            $success_notice = esc_html__( 'Check your e-mail for the password. You can reset it later.', 'configurator' );

            // Returns message
            echo json_encode( array( 
                'error' => false,
                'succcess_notice' => $success_notice,
                'redirect' => $url
            ) );

        }
        else {

            $general_error_notice = esc_html__( 'The e-mail could not be sent. Possible reason: your host may have disabled the mail() function.', 'configurator' );

            // Returns message
            echo json_encode( array( 
                'error' => true,
                'username_notice' => $username_error_notice,
                'email_notice' => $email_error_notice,
                'general_notice' => $general_error_notice
            ) );
        }
    }
    else {

        // Returns message
        echo json_encode( array( 
            'error' => true,
            'username_notice' => $username_error_notice,
            'email_notice' => $email_error_notice,
            'general_notice' => $general_error_notice
        ) ); 
    }

    die();
}

// ajax functions
add_action('wp_ajax_configurator_ajax_register_form',  'configurator_ajax_register_form' );
add_action('wp_ajax_nopriv_configurator_ajax_register_form', 'configurator_ajax_register_form' );


function configurator_ajax_update_form() {

    // Get ajax values
    $user_info   = isset($_POST['user_info']) ? $_POST['user_info'] : '';

    // Empty assignment
    $fields = array();

    // Rebuild array
    if( !empty( $user_info ) ) {
        foreach ( $user_info as $key => $info ) {
            $fields[ $info['name'] ] = $info['value'];
        }
    }

    $userid = get_current_user_id();

    if( !empty( $fields ) ) {
        $default_set = array( 'first_name', 'last_name', 'nice_name', 'display_name', 'website', 'email', 'old_password', 'new_password' );
        foreach ( $fields as $key => $field ) {
            if( !in_array( $key, $default_set ) ) {
                $old_meta = get_user_meta( $userid, $key, $single );
                if( $old_meta && $old_meta != $field ) {
                    update_user_meta( $userid, $key, $field );
                }
                else {
                    add_user_meta( $userid, $key, $field );
                }
                
            }
        }
    }

    $current_user_obj = get_userdata( $userid );
    $username = $current_user_obj->user_login;

    // Empty assignment
    $password_error_notice = $email_error_notice = $success_notice = '';

    if( !empty( $new_password ) ) {
        // Check the password
        $user_obj = get_user_by( 'login', $username );
        if ( $old_password == '' ) {
            $password_error_notice = esc_html__( 'Please type your old password.', 'configurator' );
        }
        elseif ( !wp_check_password( $old_password, $user_obj->user_pass ) ) {
            $password_error_notice = esc_html__( 'The password you entered for the username is incorrect', 'configurator' );
        }
    }    

    // check the email
    if ( !empty( $email ) && ! is_email( $email ) ) {
        $email_error_notice = esc_html__( 'The email format is not correct.', 'configurator' );
    }
    elseif ( email_exists( $email ) ) {
        $email_error_notice = esc_html__( 'This email is already registered, please choose another one.', 'configurator' );
    }

    if ( empty( $password_error_notice ) && empty( $email_error_notice ) ) {

        $success_notice = esc_html__( 'Account updated successfully', 'configurator' );

        // Set error
        $error = 0;
    }
    else {
        // Set error
        $error = 1;
    }

    if( !$error ) {

        $user_obj = get_user_by( 'login', $username );

        if( !empty( $new_password ) ) {
            wp_set_password( $new_password, $user_obj->ID );
        }

        wp_update_user( array( 
            'ID' => $user_obj->ID, 
            'user_url' => $website,
            'user_email' => $email,
            'first_name' => $first_name,
            'last_name' => $last_name
        ) );

        // Returns message
        echo json_encode( array( 
            'error' => false,
            'succcess_notice' => $success_notice
        ) );
    }
    else {

        // Returns message
        echo json_encode( array( 
            'error' => true,
            'username_notice' => $username_error_notice,
            'password_notice' => $password_error_notice
        ) ); 
    }

    die();
}

// ajax functions
add_action('wp_ajax_configurator_ajax_update_form',  'configurator_ajax_update_form' );
add_action('wp_ajax_nopriv_configurator_ajax_update_form', 'configurator_ajax_update_form' );

function configurator_banner_share( $share_options = array(), $url = '' ) {

    // Empty assignment
    $social_share = '';

    foreach ( $share_options as $key => $value ) {
        switch ( $value ) {

            case 'facebook':
                $social_share .= '<a href="'. esc_url( 'https://www.facebook.com/sharer/sharer.php?u='.$url ) .'" target="_blank" class="facebook ct-facebook" ></a>';
            break;

            case 'twitter':
                $social_share .= '<a href="'. esc_url( 'https://twitter.com/home?status='.$url ) .'" target="_blank" class="twitter ct-twitter"></a>';
            break;

            case 'gplus':
                $social_share .= '<a href="'. esc_url( 'https://plus.google.com/share?url='.$url ) .'" target="_blank" class="gplus ct-google-plus"></a>';
            break;

            case 'linkedin':
                $social_share .= '<a href="'. esc_url( 'https://www.linkedin.com/cws/share?url='.$url ) .'" target="_blank" class="linkedin ct-linkedin"></a>';
            break;

            case 'pinterest':
                $social_share .= '<a href="'. esc_url('https://pinterest.com/pin/create/button/?url='.$url.'&description='. esc_html( get_the_title() ) ) .'" target="_blank" class="pinterest ct-pinterest-p"></a>';
            break;
            
            default:
            break;
        }
    }

    return $social_share;

}

// Social share
if( !function_exists( 'configurator_social_share' ) ) {
    function configurator_social_share( $icon ) {

        $url = get_permalink();

        if( 'facebook' == $icon ) {
            $share = '<a href="'. esc_url( 'https://www.facebook.com/sharer/sharer.php?u='.$url ) .'" target="_blank" class="facebook ct-facebook" ></a>';
        }

        if( 'twitter' == $icon ) {
            $share = '<a href="'. esc_url( 'https://twitter.com/home?status='.$url ) .'" target="_blank" class="twitter ct-twitter"></a>';
        }

        if( 'gplus' == $icon ) {
            $share = '<a href="'. esc_url( 'https://plus.google.com/share?url='.$url ) .'" target="_blank" class="gplus ct-google-plus"></a>';
        }

        if( 'linkedin' == $icon ) {
            $share = '<a href="'. esc_url( 'https://www.linkedin.com/cws/share?url='.$url ) .'" target="_blank" class="linkedin ct-linkedin"></a>';
        }

        if( 'pinterest' == $icon ) {
            $share = '<a href="'. esc_url('https://pinterest.com/pin/create/button/?url='.$url.'&description='. esc_html( get_the_title() ) ) .'" target="_blank" class="pinterest ct-pinterest"></a>';
        }

        return $share;
    }
}