<?php 
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
                    $wpErrors->add( 'recaptcha', __( '<strong>ERROR</strong>: Invalid reCAPTCHA secret key.', 'woocommerce' ) );
                    break;

                case 'missing-input-response' :
                case 'invalid-input-response' :
                    $wpErrors->add( 'recaptcha', __( '<strong>ERROR</strong>: Please check the box to prove that you are not a robot.', 'woocommerce' ) );
                    break;

                default:
                    $wpErrors->add( 'recaptcha', __( '<strong>ERROR</strong>: Something went wront validating the reCAPTCHA.', 'woocommerce' ) );
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