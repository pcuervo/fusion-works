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
	#GENERAL FUNCTIONS
\*------------------------------------*/

/**
 * Send email to admin when someone request to download a white paper.
 * @return JSON $message - A success/error message about the status of the post.
*/
function notify_admin_white_paper_download( $name, $position, $company, $pdf_title ){

	// require_once('inc/phpmailer/class.phpmailer.php');

	$mail      	= new PHPMailer(); // defaults to using php "mail()"
	$body       = get_white_paper_admin_email_body( $name, $position, $company, $pdf_title );
	$reply_to	= 'no-reply@fusionworks.com';
	$name_to	= 'FusionWorkds';

	$mail->AddReplyTo( $reply_to, $name_to );
	$mail->SetFrom( $reply_to, $name_to );
	$mail->AddReplyTo( $reply_to, $name_to );

	$address = 'miguel@pcuervo.com';
	$mail->AddAddress( $address, $name );
	$mail->Subject = $name . " has downloaded a white paper.";
	$mail->MsgHTML( $body );

	if( !$mail->Send() ) {
		error_log( $mail->ErrorInfo );
		$message = array(
			'error'		=> 1,
			'message'	=> 'An error has occurred. Please try again later.',
		);
	} else {
		$message = array(
			'error'		=> 0,
			'message'	=> 'Thanks ' . $name .'!',
		);
	}

}// notify_admin_white_paper_download

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
		$white_papers[$post->post_name] = array(
			'id'		=> $post->ID,
			'title'		=> $post->post_title,
			'content'	=> $post->post_content,
		);
	endwhile; endif; wp_reset_query();

	return $white_papers;
}

/**
* Get PDFs from post of type White Papers
* @param int $post_id
* @return array $pdf 
**/
function get_white_paper_pdf( $post_id ){
	$pdf = array();
	$query_pdf_args = array(
		'post_parent'		=> $post_id,
		'post_status' 		=> 'inherit',
		'post_type'			=> 'attachment',
		'post_mime_type' 	=> 'application/pdf',
		'post_per_page'		=> 1,
	);
	$query_pdf = new WP_Query( $query_pdf_args );
	foreach ( $query_pdf->posts as $file) {
		$pdf = array(
			'title'		=> get_the_title( $post_id ),
			'pdf_title'	=> $file->post_title,
			'url' 		=> $file->guid
		);
	}
	return $pdf;
}// get_white_paper_pdf

/**
* Get HTML body for email
* @param string $name
* @return HTML $body 
**/
function get_white_paper_download_email_body( $name ){
	$body = <<<EOT
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
				<title>Download PDF</title>
			</head>
			<body>
				<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
					<h1>FusionWorks White Paper</h1>
					<div align="center">
						<p>Hi $name! You will find attached a copy of the white paper you requested.</p>
					</div>
				</div>
			</body>
		</html>
EOT;
	return $body;
}// get_white_paper_download_email_body

/**
* Get HTML body for email
* @param string $name
* @return HTML $body 
**/
function get_white_paper_admin_email_body( $name, $position, $company, $pdf_title ){
	$body = <<<EOT
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
				<title>Download PDF</title>
			</head>
			<body>
				<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
					<h2>FusionWorks White Paper</h2>
					<div align="center">
						<p>Name: $name </p>
						<p>Company: $company</p>
						<p>Position: $position</p>
						<p>White paper: $pdf_title</p>
					</div>
				</div>
			</body>
		</html>
EOT;
	return $body;
}// get_white_paper_admin_email_body


/*------------------------------------*\
	#AJAX RESPONSE FUNCTIONS
\*------------------------------------*/

/**
 * Send email for "more information"
 * @return JSON $message - A success/error message about the status of the post.
*/
function send_pdf_by_email(){

	require_once('inc/phpmailer/class.phpmailer.php');

	$name 		= $_POST['name'];
	$email 		= $_POST['email'];
	$pdf_url	= $_POST['pdf_url'];
	$pdf_title	= $_POST['pdf_title'];
	$reply_to	= 'whatever@fw.com';
	$name_to	= 'Whatevs Bruh';
	$position 	= isset( $_POST['position'] ) ? $_POST['position'] : '';
	$company 	= isset( $_POST['company'] ) ? $_POST['company'] : '';

	$mail      	= new PHPMailer(); // defaults to using php "mail()"
	$body       = get_white_paper_download_email_body( $name );
	//$body       = preg_replace("[\]",'',$body);

	$mail->AddReplyTo( $reply_to, $name_to );
	$mail->SetFrom( $reply_to, $name_to );
	$mail->AddReplyTo( $reply_to, $name_to );

	$address = $email;
	$mail->AddAddress( $address, $name );
	$mail->Subject    = "PHPMailer Test Subject via mail(), basic";
	$mail->MsgHTML( $body );

	$upload_dir = wp_upload_dir();
	$pdf_url_arr = explode( 'uploads/', $pdf_url );
	$attachment = $mail->addAttachment( $upload_dir['basedir'] . '/' . $pdf_url_arr[1] );     

	notify_admin_white_paper_download( $name, $position, $company, $pdf_title );

	if( !$mail->Send() ) {
		error_log( $mail->ErrorInfo );
		$message = array(
			'error'		=> 1,
			'message'	=> 'An error has occurred. Please try again later.',
		);
	} else {
		$message = array(
			'error'		=> 0,
			'message'	=> 'Thanks ' . $name .'!',
		);
	}

	echo json_encode($message , JSON_FORCE_OBJECT);
	exit();

}// send_pdf_by_email
add_action("wp_ajax_send_pdf_by_email", "send_pdf_by_email");
add_action("wp_ajax_nopriv_send_pdf_by_email", "send_pdf_by_email");
