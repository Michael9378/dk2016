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

function events() { 
	register_post_type( 'event',
		array( 'labels' => array(
			'name' => __( 'Events' ), 
			'singular_name' => __( 'Event' ),
			'all_items' => __( 'All Events' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Event' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Events' ),
			'new_item' => __( 'New Event' ), 
			'view_item' => __( 'View Event' ), 
			'search_items' => __( 'Search Events' ), 
			'not_found' =>  __( 'Nothing found in the Database.' ), 
			'not_found_in_trash' => __( 'Nothing found in Trash' ), 
			'parent_item_colon' => ''
		), 
		'description' => __( 'This is the example event' ),
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 10, 
		'menu_icon' => get_stylesheet_directory_uri() . '/images/icons/event_icon.png', 
		'rewrite'	=> array( 'slug' => 'event', 'with_front' => false ),
		'has_archive' => 'event', 
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail')
		)
	);
}
add_action( 'init', 'events');

function games() { 
	register_post_type( 'game',
		array( 'labels' => array(
			'name' => __( 'Games' ), 
			'singular_name' => __( 'Game' ),
			'all_items' => __( 'All Games' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Game' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Games' ),
			'new_item' => __( 'New Game' ), 
			'view_item' => __( 'View Game' ), 
			'search_items' => __( 'Search Games' ), 
			'not_found' =>  __( 'Nothing found in the Database.' ), 
			'not_found_in_trash' => __( 'Nothing found in Trash' ), 
			'parent_item_colon' => ''
		), 
		'description' => __( 'This is the example game' ),
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 10, 
		'menu_icon' => get_stylesheet_directory_uri() . '/images/icons/games_icon.png', 
		'rewrite'	=> array( 'slug' => 'game', 'with_front' => false ),
		'has_archive' => 'game', 
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail')
		)
	);
}
add_action( 'init', 'games');

flush_rewrite_rules();