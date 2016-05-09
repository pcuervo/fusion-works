<?php

load_theme_textdomain('pinnacle', get_template_directory() . '/languages');

/*
 * Init Theme Options
 */
require_once locate_template('/themeoptions/redux/framework.php');          					// Options framework
require_once locate_template('/themeoptions/theme_options.php');          						// Options framework
require_once locate_template('/themeoptions/options_assets/pinnacle_extension.php');        	// Options framework


/*
 * Init Theme Startup/Core utilities
 */

require_once locate_template('/lib/utils.php');           										// Utility functions
require_once locate_template('/lib/init.php');            										// Initial theme setup and constants
require_once locate_template('/lib/sidebar.php');         										// Sidebar class
require_once locate_template('/lib/config.php');          										// Configuration
require_once locate_template('/lib/cleanup.php');        										// Cleanup
require_once locate_template('/lib/custom-nav.php');        									// Custom Nav Functions
require_once locate_template('/lib/nav.php');            										// Custom nav modifications
require_once locate_template('/lib/cmb_gallery_metabox.php');     								// Custom metaboxes
require_once locate_template('/lib/metaboxes.php');     										// Custom metaboxes
require_once locate_template('/lib/comments.php');        										// Custom comments modifications
require_once locate_template('/lib/aq_resizer.php');      										// Resize on the fly

/*
 * Init Shortcodes
 */
require_once locate_template('/lib/kad_shortcodes/general_shortcodes.php');      				// Shortcodes
require_once locate_template('/lib/kad_shortcodes/carousel_shortcodes.php');   					// Carousel Shortcodes
require_once locate_template('/lib/kad_shortcodes/custom_carousel_shortcodes.php');  			// Custom Carousel Shortcodes
require_once locate_template('/lib/kad_shortcodes/testimonial_shortcodes.php');   				// Testimonial Shortcodes
require_once locate_template('/lib/kad_shortcodes/testimonial_form_shortcode.php');   			// Testimonial Form Shortcodes
require_once locate_template('/lib/kad_shortcodes/blog_shortcodes.php');   						// Blog Shortcodes
require_once locate_template('/lib/kad_shortcodes/image_menu_shortcodes.php'); 					// Image Menu Shortcodes
require_once locate_template('/lib/kad_shortcodes/google_map_shortcode.php');  					// Map Shortcodes
require_once locate_template('/lib/kad_shortcodes/portfolio_shortcodes.php'); 					// Portfolio Shortcodes
require_once locate_template('/lib/kad_shortcodes/portfolio_cat_shortcodes.php'); 				// Portfolio Type Shortcodes
require_once locate_template('/lib/kad_shortcodes/staff_shortcodes.php'); 						// Staff Shortcodes
require_once locate_template('/lib/kad_shortcodes/latest_posts_carousel_shortcode.php'); 		// Latest Posts Carousel
require_once locate_template('/lib/kad_shortcodes/gallery.php');      							// Gallery Shortcode

/*
 * Init Widgets
 */
require_once locate_template('/lib/premium_widgets.php'); 										// Premium Widgets
require_once locate_template('/lib/widgets.php');         										// Sidebars and widgets
require_once locate_template('/lib/mobile_detect.php');        									// Mobile Detect
require_once locate_template('/lib/plugin-activate.php');   									// Plugin Activation
require_once locate_template('/lib/taxonomy-meta-class.php');   								// Taxonomy meta boxes
require_once locate_template('/lib/taxonomy-meta.php');         								// Taxonomy meta boxes
require_once locate_template('/lib/custom.php');          										// Custom functions


/*
 * Template Hooks
 */
require_once locate_template('/lib/authorbox.php');         									// Author box
require_once locate_template('/lib/breadcrumbs.php');         									// Breadcrumbs
require_once locate_template('/lib/custom-woocommerce.php'); 									// Woocommerce functions
require_once locate_template('/lib/custom-pagebuilderlayouts.php');								// Pagebuilder layout functions
require_once locate_template('/lib/custom-header.php'); 										// Fontend Header
require_once locate_template('/lib/customizer.php'); 											// Custom Customizer
require_once locate_template('/lib/kt_flexslider.php'); 										// Flex Slider Create Function
require_once locate_template('/lib/template_hooks/single_post.php'); 		    				// Single Post Template Hooks
require_once locate_template('/lib/template_hooks/post_list.php'); 		    					// Post List Template Hooks
require_once locate_template('/lib/template_hooks/page.php'); 		    					    // Page Template Hooks
require_once locate_template('/lib/extensions.php');        									// Custom Nav Functions
require_once locate_template('/lib/post-types.php');      										// Post Types

/*
 * Load Scripts
 */
require_once locate_template('/lib/admin_scripts.php');    										// Admin Scripts functions
require_once locate_template('/lib/scripts.php');        										// Scripts and stylesheets
require_once locate_template('/lib/output_css.php'); 											// Fontend Custom CSS

 /*
 * Updater
 */
require_once locate_template('/lib/wp-updates-theme.php');
$KT_UpdateChecker = new ThemeUpdateChecker('pinnacle_premium', 'https://kernl.us/api/v1/theme-updates/567460cc95991bdd09cc527b/');

/*
 * Admin Shortcode Btn
 */
function pinnacle_shortcode_init() {
	if(is_admin()){ if(kad_is_edit_page()){require_once locate_template('/lib/kad_shortcodes.php');	}}
}
add_action('init', 'pinnacle_shortcode_init');


/******************
 * SCRIPTS CUERVO
 *****************/

require_once( 'inc/pages.php' );
require_once( 'inc/post-types.php' );



/*------------------------------------*\
	#CONSTANTS
\*------------------------------------*/

/**
* Define paths to javascript, styles, theme and site.
**/
define( 'JSPATH', get_template_directory_uri() . '/assets/js/' );
define( 'THEMEPATH', get_template_directory_uri() . '/' );
define( 'SITEURL', site_url('/') );


/*------------------------------------*\
	#GET/SET FUNCTIONS
\*------------------------------------*/

/**
* Get all posts from post type White Papers
* @return array $white_papers 
**/
function get_white_papers(){
	global $post;
	$white_papers = array();
	$white_papers_args = array(
		'post_type' 		=> 'white-papers',
		'posts_per_page' 	=> -1,
	);
	$query_white_papers = new WP_Query( $white_papers_args );

	if ( $query_white_papers->have_posts() ) : while( $query_white_papers->have_posts() ) : $query_white_papers->the_post();
		// $img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		$pdfs = get_white_paper_pdfs( $post->post_id );
		var_dump( $pdfs );
		$white_papers[$post->post_name] = array(
			'id'		=> $post->post_id,
			'title'		=> $post->post_title,
			'content'	=> $post->post_content,
		);
	endwhile; endif; wp_reset_query();

	return $white_papers;
}

/**
* Get PDFs from post of type White Papers
* @return array $white_papers 
**/
function get_white_paper_pdfs( $post_id ){
	$pdfs = array();
	$query_pdf_args = array(
		'post_parent'		=> $post_id,
		'post_status' 		=> 'inherit',
		'post_type'			=> 'attachment',
		'post_mime_type' 	=> 'application/pdf',
		'post_per_page'		=> -1,
	);
	$query_pdf = new WP_Query( $query_pdf_args );
	foreach ( $query_pdf->posts as $file) {
		$pdfs[$file->post_name] = array(
			'title' => $file->post_title,
			'url' 	=> $file->guid
		);
	}
	return $pdfs;
}// get_white_paper_pdfs
