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
            dur_register_user($_POST);
            wp_redirect($redirect_url);
            exit();

        } else {
            include('templates/register_html.php');
        }
    } else {
        $user = wp_get_current_user();
        echo "No form for you. " . $user->user_login;
    }
}

function dur_register_user($params) {
    // print_r($params);
    $user_email = check_input( $params['email'] );
    $user_pass = check_input( $params['password'] );
    $user_uname = check_input( $params['username'] );
    $user_dname = check_input( $params['display_name'] );
    $user_fname = check_input( $params['first_name'] );
    $user_lname = check_input( $params['last_name'] );
    $user_role = check_input( $params['role'] );

    // checking if the username is already taken
    $user_exists = username_exists( $user_uname );

    // checking if the email is already registered
    $email_taken = email_exists( $user_email );

    if ( !$user_exists || !$email_taken ) {
        $user_id = wp_create_user(
            $user_uname,
            $user_pass,
            $user_email
        );

        add_user_meta($user_id, 'Display Name', $user_dname, $unique = false);
        add_user_meta($user_id, 'Username', $user_uname, $unique = false);
        add_user_meta($user_id, 'First Name', $user_fname, $unique = false);
        add_user_meta($user_id, 'Last Name', $user_lname, $unique = false);

        $wp_user_capabilities = json_encode( array($user_role) );
        add_user_meta($user_id, 'wp_capabilities', $wp_user_capabilities, $unique = false);

        return 1;
    }

}

function check_input($input) {
    if ( !empty($input) ) {
        $input = htmlspecialchars($input);
        $input = trim($input);

        return $input;
    } else {
        // wp_redirect($_SERVER["REQUEST URI"]);
        // exit;
    }
    // return $input;

}

add_shortcode( 'dur-form', 'dur_main' );

?>