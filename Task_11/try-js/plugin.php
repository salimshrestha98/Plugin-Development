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

?>