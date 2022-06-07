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
        'am-admin-menu',
        'am_add_menu_html',
        'dashicons-cart',
        4
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



?>