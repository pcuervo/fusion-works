<?php


/*------------------------------------*\
	CUSTOM PAGES
\*------------------------------------*/

add_action('init', function(){

	// Oracle ERP
	if( ! get_page_by_path('oracle-erp') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'oracle-erp',
			'post_name'   => 'Oracle ERP',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// // Dynamic GP
	// if( ! get_page_by_path('dinamix-gp') ){
	// 	$page = array(
	// 		'post_author' => 1,
	// 		'post_status' => 'publish',
	// 		'post_title'  => 'dynamics-gp',
	// 		'post_name'   => 'Dynamics GP',
	// 		'post_type'   => 'page'
	// 	);
	// 	wp_insert_post( $page, true );
	// }

	// Dynamics CRM
	if( ! get_page_by_path('dynamics-crm') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'dynamics-crm',
			'post_name'   => 'Dynamics CRM',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// 	// Prophix
	// 	if( ! get_page_by_path('prophix') ){
	// 		$page = array(
	// 			'post_author' => 1,
	// 			'post_status' => 'publish',
	// 			'post_title'  => 'prophix',
	// 			'post_name'   => 'Prophix',
	// 			'post_type'   => 'page'
	// 		);
	// 		wp_insert_post( $page, true );
	// 	}

		// Business Intelligence
		if( ! get_page_by_path('business-intelligence') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'business-intelligence',
				'post_name'   => 'Business Intelligence',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

				// Smart Flow
		if( ! get_page_by_path('smart-flog') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'smart-flog',
				'post_name'   => 'Smart Flow',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// Oracle HCM
		if( ! get_page_by_path('oracle-hcm') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'oracle-hcm',
				'post_name'   => 'Oracle HCM',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}



		// White Paper Form
		if( ! get_page_by_path('white-papers-download') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'white-papers-download',
				'post_name'   => 'Download White Papers',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// White Papers
		if( ! get_page_by_path('white-papers') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'white-papers',
				'post_name'   => 'White Papers',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

});

