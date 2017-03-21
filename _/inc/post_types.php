<?php

/*
* Creating a function to create our CPT
*/

function downloads() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => __( 'Downloads'),
		'singular_name'       => __( 'Download'),
		'menu_name'           => __( 'Downloads'),
		'parent_item_colon'   => __( 'Parent Download'),
		'all_items'           => __( 'All Downloads'),
		'view_item'           => __( 'View Download'),
		'add_new_item'        => __( 'Add New Download'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Download'),
		'update_item'         => __( 'Update Download'),
		'search_items'        => __( 'Search Download'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash'),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'downloads' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title' , 'thumbnail'),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'category' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite'  => array( 'slug' => 'downloads', 'with_front' => false ),
	);
	
	// Registering your Custom Post Type
	register_post_type( 'downloads', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'downloads', 0 );



function videos() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => __( 'Videos'),
		'singular_name'       => __( 'Video'),
		'menu_name'           => __( 'Videos'),
		'parent_item_colon'   => __( 'Parent Video'),
		'all_items'           => __( 'All Videos'),
		'view_item'           => __( 'View Video'),
		'add_new_item'        => __( 'Add New Video'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Video'),
		'update_item'         => __( 'Update Video'),
		'search_items'        => __( 'Search Video'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash'),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'videos' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title' , 'thumbnail'),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'category' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite'  => array( 'slug' => 'videos', 'with_front' => false ),
	);
	
	// Registering your Custom Post Type
	register_post_type( 'videos', $args );

}


/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'videos', 0 );




function guides() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => __( 'Guides/Captains'),
		'singular_name'       => __( 'Guide/Captain'),
		'menu_name'           => __( 'Guides/Captains'),
		'parent_item_colon'   => __( 'Parent Guide/Captain'),
		'all_items'           => __( 'All Guides/Captains'),
		'view_item'           => __( 'View Guide/Captain'),
		'add_new_item'        => __( 'Add New Guide/Captain'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Guide/Captain'),
		'update_item'         => __( 'Update Guide/Captain'),
		'search_items'        => __( 'Search Guide/Captain'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash'),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'guides/captains' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title' , 'thumbnail'),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'category' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite'  => array( 'slug' => 'guides-captains', 'with_front' => false ),
	);
	
	// Registering your Custom Post Type
	register_post_type( 'guides/captains', $args );

}


/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'guides', 0 );