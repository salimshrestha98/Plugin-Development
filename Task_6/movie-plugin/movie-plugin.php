<?php
/**
 * Plugin Name: Movie Plugin
 * Author: Salim Shrestha
 * Author URI: https://salim.com.np
 * Description: This is the task 6 plugin to create administration menus.
 */

function mp_add_admin_menu_main() {
    add_menu_page(
        'Movie',
        'Movie',
        'manage_options',
        'mp-top-menu',
        'mp_top_menu_callback',
        'dashicons-format-video',
        10
    );
    add_submenu_page(
        'mp-top-menu',
        'Dashboard',
        'Dashboard',
        'manage_options',
        'mp-sub-dashboard',
        'mp_sub_dashboard_callback'
    );
    add_submenu_page(
        'mp-top-menu',
        'Settings',
        'Settings',
        'manage_options',
        'mp-sub-settings',
        'mp_sub_settings_callback'
    );
}

function mp_top_menu_callback() {
    echo "Movie";
}

function mp_sub_dashboard_callback() {
    echo "Dashboard";
}

function mp_sub_settings_callback() {
    echo "Settings";
}

add_action( 'admin_menu', 'mp_add_admin_menu_main' );

?>