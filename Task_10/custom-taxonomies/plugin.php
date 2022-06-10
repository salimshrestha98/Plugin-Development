<?php

/**
* Plugin Name: Custom Taxonomies
* Author: Salim Shrestha
* Author URI: https://salim.com.np
* Description: This is Task 10. To create custom taxonomies called Fruits.
*/

function ct_register_taxonomy_fruit() {
    $labels = array(
        'name'              => _x( 'Fruits', 'taxonomy general name' ),
        'singular_name'     => _x( 'Fruit', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Fruits' ),
        'all_items'         => __( 'All Fruits' ),
        'parent_item'       => __( 'Parent Fruit' ),
        'parent_item_colon' => __( 'Parent Fruit:' ),
        'edit_item'         => __( 'Edit Fruit' ),
        'update_item'       => __( 'Update Fruit' ),
        'add_new_item'      => __( 'Add New Fruit' ),
        'new_item_name'     => __( 'New Fruit Name' ),
        'menu_name'         => __( 'Fruit' ),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => [ 'slug' => 'fruit' ],
    );
    register_taxonomy( 'fruit', [ 'post', 'page' ], $args );
}

add_action( 'init', 'ct_register_taxonomy_fruit', 1 );

?>