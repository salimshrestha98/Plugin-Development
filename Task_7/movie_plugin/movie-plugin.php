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
            <?php
            settings_fields( 'movie_plugin_options' );
            do_settings_sections( 'movie_plugin' );
            submit_button( 'Save Changes', 'primary' );
            ?>
        </form>
    </div>
    <?php
}

// Register and define the settings
add_action( 'admin_init', 'movie_plugin_admin_init' );

function movie_plugin_admin_init() {

    // Register our settings
    register_setting( 'movie_plugin_options', 'movie_plugin_options' );

    //  Add a settings section
    add_settings_section(
        'movie_plugin_main',
        'Movie Plugin Settings',
        'movie_plugin_section_text',
        'movie_plugin'
    );

    add_settings_field(
        'movie_plugin_movie_name',
        'Movie Name',
        'movie_plugin_setting_name',
        'movie_plugin',
        'movie_plugin_main'
    );

    add_settings_field(
        'movie_plugin_radio',
        'Genre',
        'movie_plugin_setting_radio',
        'movie_plugin',
        'movie_plugin_main'
    );

    add_settings_field(
        'movie_plugin_checkbox',
        'Watched',
        'movie_plugin_setting_checkbox',
        'movie_plugin',
        'movie_plugin_main'
    );

    add_settings_field(
        'movie_plugin_textarea',
        'Review',
        'movie_plugin_setting_textarea',
        'movie_plugin',
        'movie_plugin_main'
    );

    add_settings_field(
        'movie_plugin_dropdown',
        'Rating',
        'movie_plugin_setting_dropdown',
        'movie_plugin',
        'movie_plugin_main'
    );
}

//  Draw the section header
function movie_plugin_section_text() {
    echo '<p>Enter your settings here.</p>';
}

//  Display and fill the Name form field
function movie_plugin_setting_name() {
    //  get option 'text_string' value from the database
    $options = get_option( 'movie_plugin_options' );
    $name = $options['name'];

    //  echo the field
    echo "<input id='name' name='movie_plugin_options[name]' type='text' value='" . esc_attr( $name ) . "'/>";
}

function movie_plugin_setting_radio() {
    $options = get_option( 'movie_plugin_options' );
    $movie_radio = isset( $options['radio'] ) ? $options['radio'] : null;
    ?>
    <input id='radio-action' type='radio' name='movie_plugin_options[radio]' value='radio-action' <?php  echo $movie_radio == 'radio-action' ? 'checked' : ''  ?> />
    <label for='radio-action'>Action</label><br>
    <input id='radio-thriller' type='radio' name='movie_plugin_options[radio]' value='radio-thriller' <?php  echo $movie_radio == 'radio-thriller' ? 'checked' : ''  ?> />
    <label for='radio-thriller'>Thriller</label>
    <?php
}

function movie_plugin_setting_checkbox() {
    $options = get_option( 'movie_plugin_options' );
    $is_checked = '';
    if ( isset( $options['checkbox'] ) ) {
        $is_checked = $options['checkbox'] == 'on' ? 'checked' : '';
    }
    echo "<input type='checkbox' name='movie_plugin_options[checkbox]' $is_checked />";
}

function movie_plugin_setting_textarea() {
    $options = get_option( 'movie_plugin_options' );
    $movie_textarea = isset( $options['textarea'] ) ? $options['textarea'] : '';
    echo "<textarea name='movie_plugin_options[textarea]' rows='10' cols='50'>" . esc_attr( $movie_textarea ) . "</textarea>";
}

function movie_plugin_setting_dropdown() {
    $options = get_option( 'movie_plugin_options' );
    $selected_dropdown = isset( $options['dropdown'] ) ? $options['dropdown'] : '';
    ?>
    <select name='movie_plugin_options[dropdown]'>
        <option value="0" <?= $selected_dropdown == '0' ? 'selected' : '' ?> >0</option>
        <option value="1" <?= $selected_dropdown == '1' ? 'selected' : '' ?> >1</option>
        <option value="2" <?= $selected_dropdown == '2' ? 'selected' : '' ?> >2</option>
        <option value="3" <?= $selected_dropdown == '3' ? 'selected' : '' ?> >3</option>
        <option value="4" <?= $selected_dropdown == '4' ? 'selected' : '' ?> >4</option>
        <option value="5" <?= $selected_dropdown == '5' ? 'selected' : '' ?> >5</option>

    <?php
}

?>


 ?>