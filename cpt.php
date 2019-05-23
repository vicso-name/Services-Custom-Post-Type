<?php
/**
 * Register Services custom post type.
**/
function themeslug_create_post_type() {
	$labels = array(
	  'name' => __( 'Services' ),
	  'singular_name' => __( 'Service' ),
	  'add_new' => __( 'New Service' ),
	  'add_new_item' => __( 'Add new' ),
	  'edit_item' => __( 'Edit' ),
	  'new_item' => __( 'New' ),
	  'view_item' => __( 'View' ),
	  'search_items' => __( 'Search' ),
	  'not_found' =>  __( 'No Services found' ),
	  'not_found_in_trash' => __( 'No found in trash' ),
	  );
	$args = array(
	  'labels' => $labels,
	  'has_archive' => true,
	  'public' => true,
	  'hierarchical' => false,
	  'menu_position' => 5,
	  'supports' => array(
		'title',
		'editor',
		'excerpt',
		'custom-fields',
		'thumbnail'
		),
	  'taxonomies' => array('category'),
	  );
	register_post_type( 'service', $args);
  }
  
add_action( 'init', 'themeslug_create_post_type' );
  
function my_cpt_support_author() {
    add_post_type_support( 'service', 'author' );
}

add_action('init', 'my_cpt_support_author');

/**
 * Register taxonomy for custom post type.
**/
  
function themeslug_register_taxonomy() {
    register_taxonomy( 'articles_category', 'service',
        array(
        'labels' => array(
            'name'              => 'Services categories',
            'singular_name'     => 'Service category',
            'search_items'      => 'Search categories',
            'all_items'         => 'All categories',
            'edit_item'         => 'Edit categories',
            'update_item'       => 'Update category',
            'add_new_item'      => 'Add category',
            'new_item_name'     => 'New category',
            'menu_name'         => 'Services category',
            ),
        'hierarchical' => true,
        'sort' => true,
        'args' => array( 'orderby' => 'term_order' ),
        'rewrite' => array( 'slug' => 'blog' ),
        'show_admin_column' => true
        )
        );
    }
add_action( 'init', 'themeslug_register_taxonomy' );
