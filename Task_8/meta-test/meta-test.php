<?php
/**
 * Plugin Name: Metabox Test
 * Author: Salim Shrestha
 * Author URI: https://salim.com..np
 * Description: This is the task 8 to create a metabox.
 */

add_action( 'add_meta_boxes', 'mt_register_meta_boxes' );

function mt_register_meta_boxes() {
    add_meta_box(
        'mt_meta_box',
        'Test Meta Box',
        'mt_register_meta_box_callback',
        'post',
        'advanced',
        'high'
    );
}

 ?>