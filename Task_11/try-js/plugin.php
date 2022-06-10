<?php

/**
 * Plugin Name: Try JS
 * Author: Salim Shrestha
 * Author URI: https://salim.com.np
 * Description: This a task 11 plugin to add custom js and ajax.
 */

function tj_register_scripts() {
    wp_register_script(
        'tj_main_js',
        plugin_dir_url( __FILE__ ) . 'assets/js/main.js',
        array(),
        '1.0.0',
        true
    );
}
add_action( 'init', 'tj_register_scripts' );

function tj_enqueue_scripts() {
    wp_enqueue_script( 'tj_main_js' );
}
add_action( 'wp_enqueue_scripts', 'tj_enqueue_scripts' );

//  Adding Shortcode
function tj_user_registration_form_html() {
    include_once 'inc/tj-user-registration.php';
}
add_shortcode(
    'tj-user-registration-form',
    'tj_user_registration_form_html'
);

add_action( 'wp_ajax_tj_register_user', 'tj_ajax_register_user' );

function tj_ajax_register_user() {
    $user_data = $_POST['formData'];
    $username = sanitize_text_field( $user_data['username'] );
    $email = sanitize_email( $user_data['email'] );
    $password = sanitize_text_field( $user_data['password'] );
    $return_text = array();

    if ( ! username_exists( $username ) && ( email_exists( $email ) === false ) ) {
        $user_id = wp_create_user(
            $username,
            $password,
            $email
        );

        if ( $user_id ) {
            $return_text['status'] = 'Success';
            $return_text['message'] = 'New User Created Successfully.';            
        } else {
            $return_text['status'] = 'Failed';
            $return_text['message'] = 'Some error occured.';
        }
    } else {
        $return_text['status'] = 'Failed';
        $return_text['message'] = "Username or Email already exists.";
    }

    $return_json = json_encode( $return_text );
    echo $return_json;
    exit;
}

?>  