<?php
/**
 * Custom post types
 *
 * @package _tk
 */

function riders() {
	register_post_type( 'rider',
		array( 'labels' => array(
			'name' => __( 'Riders' ), 
			'singular_name' => __( 'Rider' ),
			'all_items' => __( 'All Riders' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Rider' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Riders' ),
			'new_item' => __( 'New Rider' ), 
			'view_item' => __( 'View Rider' ), 
			'search_items' => __( 'Search Riders' ), 
			'not_found' =>  __( 'Nothing found in the Database.' ), 
			'not_found_in_trash' => __( 'Nothing found in Trash' ), 
			'parent_item_colon' => ''
		), 
		'description' => __( 'This is the example rider' ),
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 10, 
		'menu_icon' => get_stylesheet_directory_uri() . '/images/icons/helmet_icon.png', 
		'rewrite'	=> array( 'slug' => 'rider', 'with_front' => false ),
		'has_archive' => 'rider', 
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail')
		) 
	);
}
add_action( 'init', 'riders');

function spots() { 
	register_post_type( 'spot',
		array( 'labels' => array(
			'name' => __( 'Spots' ), 
			'singular_name' => __( 'Spot' ),
			'all_items' => __( 'All Spots' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Spot' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Spots' ),
			'new_item' => __( 'New Spot' ), 
			'view_item' => __( 'View Spot' ), 
			'search_items' => __( 'Search Spots' ), 
			'not_found' =>  __( 'Nothing found in the Database.' ), 
			'not_found_in_trash' => __( 'Nothing found in Trash' ), 
			'parent_item_colon' => ''
		), 
		'description' => __( 'This is the example spot' ),
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 10, 
		'menu_icon' => get_stylesheet_directory_uri() . '/images/icons/pin_icon.png', 
		'rewrite'	=> array( 'slug' => 'spot', 'with_front' => false ),
		'has_archive' => 'spot', 
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail')
		)
	);
}
add_action( 'init', 'spots');

flush_rewrite_rules();