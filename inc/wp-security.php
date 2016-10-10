<?php
/** RESTRINGIR LOGIN */
function restringir_login(){
	global $current_user;
	wp_get_current_user();

	if ($current_user->user_level <  4) { //si no es admin no entra
		wp_redirect( get_bloginfo('url') );
		exit;
	}

}
add_action('admin_init', 'restringir_login', 1);

/** ADD GOOGLE reCAPTCHA */
function wooc_validate_re_captcha_field( $username, $email, $wpErrors )
{
    $remoteIP = $_SERVER['REMOTE_ADDR'];

    $response = wp_remote_post( 'https://www.google.com/recaptcha/api/siteverify', [
        'body' => [
            'secret'   => '6LfhGyoTAAAAAIOwCkH52QcEu1kF6M8bRePKrrLF',
            'response' => $response,
            'remoteip' => $remoteIP
        ]
    ] );

    $response_code = wp_remote_retrieve_response_code( $response );
    $response_body = wp_remote_retrieve_body( $response );

    if ( $response_code == 200 )
    {
        $result = json_decode( $response_body, true );

        if ( ! $result['success'] )
        {
            switch ( $result['error-codes'] )
            {
                case 'missing-input-secret':
                case 'invalid-input-secret':
                    $wpErrors->add( 'recaptcha', __( '<strong>ERROR</strong>: Invalido reCAPTCHA secret key.', 'woocommerce' ) );
                    break;

                case 'missing-input-response' :
                case 'invalid-input-response' :
                    $wpErrors->add( 'recaptcha', __( '<strong>ERROR</strong>: Por favor chequea reCaptcha, para comprobar que no eres un robot.', 'woocommerce' ) );
                    break;

                default:
                    $wpErrors->add( 'recaptcha', __( '<strong>ERROR</strong>: Por favor chequea reCaptcha, para comprobar que no eres un robot.', 'woocommerce' ) );
                    break;
            }
        }
    }
    else
    {
        $wpErrors->add( 'recaptcha_error', __( '<strong>Error</strong>: Unable to reach the reCAPTCHA server.', 'woocommerce' ) );
    }
}
add_action( 'woocommerce_register_post', 'wooc_validate_re_captcha_field', 10, 3 );


?>
