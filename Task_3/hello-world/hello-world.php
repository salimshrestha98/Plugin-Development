<?php

/**
* Plugin Name:  Hello World
* Description:  This is a demo plugin for task 3
* Version:      1.0
* Author:       Salim Shrestha
* Author URI:   https://salim.com.np

*/

register_activation_hook(__FILE__, 'hw_show_message_activation_hook');

function hw_show_message_activation_hook() {
    set_transient('hw_show_message_trans', true, 5);
}

add_action( 'admin_notices', 'hw_show_message');

function hw_show_message() {
    if ( get_transient( 'hw_show_message_trans' )) :
    ?>
    <div class="updated notice is-dismissible">
        <p>The Plugin is activated successfully!</p>
    </div>
    <?php endif;
    delete_transient( 'hw_show_message_trans' );
}

?>