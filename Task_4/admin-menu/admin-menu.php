<?php

/**
 * Plugin Name: Admin Menu
 * Description: This is a demo plugin for task 4.
 * Author: Salim Shrestha
 * Author URI: https://salim.com.np
 */

function am_add_menu_test_email() {
    add_menu_page(
        'Test Email Page',
        'Test Email',
        'manage_options',
        'am-test-email',
        'am_add_menu_html',
        'dashicons-cart',
        4
    );
    add_submenu_page(
        'am-test-email',
        'Send Email Page',
        'Send Email',
        'manage_options',
        'am-send-email',
        'am_send_email_main'
    );
}

add_action( 'admin_menu', 'am_add_menu_test_email' );

function am_add_menu_html() {
    ?>
    <div class="wrap">
        <p>This is admin menu.</p>
    </div>
    <?php
}

function am_send_email_main() {
    if ( $_SERVER["REQUEST_METHOD"] == "GET") {
        include('includes/send-email.php');
    }
    elseif ( $_SERVER["REQUEST_METHOD"] == "POST") {
        apply_filters('am_change_email_content_data');
    }
}

?>