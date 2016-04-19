<?php


/*------------------------------------*\
	CUSTOM PAGES
\*------------------------------------*/

add_action('init', function(){

	// ERP
	if( ! get_page_by_path('erp') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'erp',
			'post_name'   => 'ERP',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Prophix
	if( ! get_page_by_path('prophix') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'prophix',
			'post_name'   => 'Prophix',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

});

