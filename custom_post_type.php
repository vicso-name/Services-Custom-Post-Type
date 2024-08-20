<?php
/**
 * Register Services custom post type.
 */
function themeslug_create_post_type() {
    $labels = array(
        'name'                  => _x( 'Services', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Service', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Services', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Service', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Service', 'textdomain' ),
        'edit_item'             => __( 'Edit Service', 'textdomain' ),
        'new_item'              => __( 'New Service', 'textdomain' ),
        'view_item'             => __( 'View Service', 'textdomain' ),
        'search_items'          => __( 'Search Services', 'textdomain' ),
        'not_found'             => __( 'No services found', 'textdomain' ),
        'not_found_in_trash'    => __( 'No services found in Trash', 'textdomain' ),
        'all_items'             => __( 'All Services', 'textdomain' ),
        'archives'              => __( 'Service Archives', 'textdomain' ),
        'featured_image'        => _x( 'Service Image', 'Overrides the “Featured Image” phrase for this post type', 'textdomain' ),
        'set_featured_image'    => _x( 'Set service image', 'Overrides the “Set featured image” phrase for this post type', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove service image', 'Overrides the “Remove featured image” phrase for this post type', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as service image', 'Overrides the “Use as featured image” phrase for this post type', 'textdomain' ),
        'menu_position'         => 5,
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => true,
        'hierarchical'          => false,
        'supports'              => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'author' ),
        'taxonomies'            => array( 'category' ),
        'show_in_rest'          => true, // Enable Gutenberg editor
        'rewrite'               => array( 'slug' => 'services' ), // Adjust the URL slug for Services
        'capability_type'       => 'post',
    );

    register_post_type( 'service', $args );
}

add_action( 'init', 'themeslug_create_post_type' );

/**
 * Register taxonomy for Services post type.
 */
function themeslug_register_taxonomy() {
    $labels = array(
        'name'              => _x( 'Service Categories', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Service Categories', 'textdomain' ),
        'all_items'         => __( 'All Service Categories', 'textdomain' ),
        'edit_item'         => __( 'Edit Service Category', 'textdomain' ),
        'update_item'       => __( 'Update Service Category', 'textdomain' ),
        'add_new_item'      => __( 'Add New Service Category', 'textdomain' ),
        'new_item_name'     => __( 'New Service Category Name', 'textdomain' ),
        'menu_name'         => __( 'Service Categories', 'textdomain' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_in_rest'      => true, // Enable Gutenberg editor support
        'rewrite'           => array( 'slug' => 'service-category' ),
    );

    register_taxonomy( 'service_category', array( 'service' ), $args );
}

add_action( 'init', 'themeslug_register_taxonomy' );
