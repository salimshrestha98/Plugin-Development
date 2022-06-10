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

 ?>