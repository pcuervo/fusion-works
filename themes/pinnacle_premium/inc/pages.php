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

	// Oracle ERP
	if( ! get_page_by_path('oracle-erp') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'oracle-erp',
			'post_name'   => 'ERP',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Microsoft Dynamics CRM
	if( ! get_page_by_path('microsoft-dynamics-crm') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'microsoft-dynamics-crm',
			'post_name'   => 'Microsoft Dynamics CRM',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

});

