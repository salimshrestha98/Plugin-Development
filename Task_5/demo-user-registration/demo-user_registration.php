<?php
/**
 * Plugin Name: Demo User Registration
 * Description: This is task 5 plugin.
 * Author: Salim Shrestha
 * Author URI: https://salim.com.np
 * Version: 0.0.1
 */

function dur_main( $atts = array(), $content = null ) {
    // Checking if user is logged in
    if ( !is_user_logged_in() ) {
        if ( $_SERVER['REQUEST_METHOD'] == "POST") {
            $redirect_url = $atts['redirect_after_registration'];
            echo "The redirect url is ".$redirect_url;
        } else {
            include('templates/register_html.php');
        }
    }
}

// add_action( 'admin_menu', 'dur_add_menu' );

add_shortcode( 'dur-form', 'dur_main' );


?>