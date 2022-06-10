<?php
/**
 * Plugin Name: Movie Register
 * Author: Salim Shrestha
 * Author URI: https://salim.com.np
 * Description: A plugin to create and use custom post type Movie.
 */


add_action( 'init', 'mrp_register_movie_post_type' );


function mrp_register_movie_post_type() {
    $args = array(
        'labels'        => array(
                            'name'          => 'Movies',
                            'singular_name' => 'Movie',
                            'add_new'       => 'Add New',
                            'add_new_item'  => 'Add New Movie',
                            'edit_item'     => 'Edit Movie',
                            'new_item'      => 'New Movie',
                            'view_item'     => 'View Movie',
                            'view_items'    => 'View Movies',
                            'search_items'  => 'Search Movies',
                            'not_found'     => 'No Movies found.',
                            'archives'      => 'Movie Archives',
                            'atrributes'    => 'Movie Attributes',
                            'featured_image'=> 'Movie Image',
                            'items_list'    => 'Movies List',
                            'item_updated'  => 'Movie updated'
                            ),
        'public'        => true,
        'has_archive'   => true,
        'supports'      => array('title', 'editor', 'thumbnail'),
        'menu_icon'     => 'dashicons-video-alt3',
        'rewrite'       => array( 'slug' => 'movies' ),
        'supports'      => array( 'title', 'editor' )
    );

    register_post_type( 'movie', $args );
}

add_action( 'add_meta_boxes', 'mrp_add_meta_box' );

function mrp_add_meta_box() {
    add_meta_box(
        'mrp_meta_box',
        'Movie Details',
        'mrp_meta_box_html',
        'movie',
        'advanced',
        'high'
    );
}

function mrp_meta_box_html( $post ) {
    $release_date = get_post_meta( $post->ID, 'mrp_release_date', true);
    $director = get_post_meta( $post->ID, 'mrp_director', true);
    $casts = get_post_meta( $post->ID, 'mrp_casts', true);

    include_once 'inc/mrp-metabox-html.php';
}

add_action( 'save_post', 'mrp_save_metabox', 10, 2);

function mrp_save_metabox( $post_id, $post ) {
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $meta_fields = array(
        'mrp_release_date',
        'mrp_director',
        'mrp_casts'
    );
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        foreach ( $meta_fields as $meta_key ) {
            $old_value = get_post_meta( $post->ID, $meta_key, true );
            $new_value = isset( $_POST[$meta_key] ) ? wp_strip_all_tags( $_POST[$meta_key] ) : '';

            if ( $new_value !== $old_value ) {
                update_post_meta( $post->ID, $meta_key, $new_value );
            }
        }
    }
}

// Completed 
?>