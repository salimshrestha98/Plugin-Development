<?php
/**
 * Plugin Name: Movie Plugin
 * Author: Salim Shrestha
 * Author URI: https://salim.com.np
 * Description: This is the task 6 plugin to create administration menus.
 */


//  Add the menu for our options page
add_action( 'admin_menu', 'mp_add_admin_menu_main' );

function mp_add_admin_menu_main() {
    add_menu_page('Movie Page', 'Movie', 'manage_options', 'movie-menu-page', 'movie_callback', 'dashicons-format-video', 10);

    add_submenu_page('movie-menu-page', 'Dashboard Page', 'Dashboard', 'manage_options', 'movie-dashboard-page', 'movie_dashboard_callback');

    add_submenu_page('movie-menu-page', 'Movie Settings Page', 'Settings', 'manage_options', 'movie-settings-page', 'movie_settings_callback');

}

function movie_callback() {
    echo "Movie Page";
}

function movie_dashboard_callback() {
    echo "Dashboard Page";
}

function movie_settings_callback() {
    ?>
    <div class="wrap">
        <h2>Movie Plugin</h2>
        <form action="options.php" method="post">
            Settings Form
        </form>
    </div>
    <?php
}

 ?>