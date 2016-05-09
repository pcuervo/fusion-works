<?php

/*------------------------------------*\
	CUSTOM POST TYPES
\*------------------------------------*/

add_action('init', function(){

	// ARCHIVO
	$labels = array(
		'name'          => 'White paper',
		'singular_name' => 'White paper',
		'add_new'       => 'New white paper',
		'add_new_item'  => 'New white paper',
		'edit_item'     => 'Edit white paper',
		'new_item'      => 'New white paper',
		'all_items'     => 'All',
		'view_item'     => 'View white paper',
		'search_items'  => 'Search white papers',
		'not_found'     => 'Not found',
		'menu_name'     => 'White paper'
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'white-papers' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);
	register_post_type( 'white-papers', $args );

});