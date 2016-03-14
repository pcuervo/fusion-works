
<?php
	 if(!kadence_hide_pagetitle()) { ?>
<?php } else { 
	global $post, $pinnacle; 

		$bsub = get_post_meta( $post->ID, '_kad_subtitle', true );
		$shortcode_slider = get_post_meta( $post->ID, '_kad_shortcode_slider', true );
		$post_header_title = get_post_meta( $post->ID, '_kad_post_header_title', true );
		$title_color = get_post_meta( $post->ID, '_kad_pagetitle_title_color', true );
		$sub_color = get_post_meta( $post->ID, '_kad_pagetitle_sub_color', true );
		$title_align = get_post_meta( $post->ID, '_kad_pagetitle_align', true );
		$bg_color = get_post_meta( $post->ID, '_kad_pagetitle_bg_color', true );
		$bg_image = get_post_meta( $post->ID, '_kad_pagetitle_bg_image', true );
		$bg_position = get_post_meta( $post->ID, '_kad_pagetitle_bg_position', true );
		$bg_repeat = get_post_meta( $post->ID, '_kad_pagetitle_bg_repeat', true );
		$bg_cover = get_post_meta( $post->ID, '_kad_pagetitle_bg_cover', true );
		$bg_parallax = get_post_meta( $post->ID, '_kad_pagetitle_bg_parallax', true );
		$top_padding = get_post_meta( $post->ID, '_kad_pagetitle_ptop', true );
		$bottom_padding = get_post_meta( $post->ID, '_kad_pagetitle_pbottom', true );

	if(!empty($title_color) && $title_color != '#') {$tcolor = 'color:'.$title_color.';';} else {$tcolor = '';}
	if(!empty($sub_color) && $sub_color != '#') {$scolor = 'color:'.$sub_color.';';} else {$scolor = '';}
	if(!empty($bg_color) && $bg_color != '#') {$bcolor = 'background-color:'.$bg_color.';';} else {$bcolor = '';}
	if(!empty($bg_image)) {
		$b_image = 'background:url('.$bg_image.');';
		if(isset($bg_position)) {$b_position = 'background-position:'.$bg_position.';'; }
		if($bg_repeat) {$brepeat = 'background-repeat:repeat;';} else {$brepeat = "";}
		if($bg_cover) {$bcover = 'background-size:cover;';} else {$bcover = 'background-repeat:no-repeat;';}
		if($bg_parallax) {$b_parallax = 'kad-parallax';} else {$b_parallax = '';}

		} else {
		$b_image = ''; $b_position = ""; $brepeat = ""; $bcover = ""; $b_parallax = '';
		if(!empty($bg_color) && $bg_color != '#') {$bcolor = 'background:'.$bg_color.';';} else {$bcolor = '';}}
	if(!empty($title_align) && $title_align != 'default') {$talign = 'text-align:'.$title_align.';';} else {$talign = '';}
	if(!empty($top_padding)) {$tpadding = 'padding-top:'.$top_padding.'px;';} else {$tpadding = '';}
	if(!empty($bottom_padding)) { $bpadding = 'padding-bottom:'.$bottom_padding.'px;';} else {$bpadding = '';}

if(!empty($post_header_title)) {
	$page_title_title = $post_header_title;
} else {
	if(isset($pinnacle['single_product_header_title']) && $pinnacle['single_product_header_title'] == 'custom') {
		if(isset($pinnacle['product_header_title_text'])) {$page_title_title = $pinnacle['product_header_title_text']; } else { $page_title_title = '';}
		$bsub = $pinnacle['product_header_subtitle_text'];
	} else if (isset($pinnacle['single_product_header_title']) && $pinnacle['single_product_header_title'] == 'posttitle') {
		$page_title_title =  get_the_title();
	} else {
		if ( $terms = wp_get_post_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
	        $main_term = $terms[0];
	        $page_title_title = $main_term->name;
	    } else {
	    	$shop_page_id = woocommerce_get_page_id( 'shop' );
	    	$shop_page = get_post( $shop_page_id );
	    	$page_title_title = $shop_page->post_title;
	    }
	}
}

if(!empty($shortcode_slider)) { ?>
			<div class="sliderclass">
			<?php echo do_shortcode( $shortcode_slider); ?>
			</div><!--sliderclass-->
<?php } else {
?>
<div id="pageheader" class="titleclass <?php echo esc_attr($b_parallax);?>" style="<?php echo esc_attr($bcolor).' '.esc_attr($b_image).' '.esc_attr($b_position).' '.esc_attr($brepeat).' '.esc_attr($bcover);?>">
<div class="header-color-overlay"></div>
<?php do_action("kt_header_overlay"); ?>
	<div class="container">
		<div class="page-header" style="<?php echo esc_attr($tpadding).' '.esc_attr($bpadding).' '.esc_attr($talign);?>">
			<div class="row">
				<div class="col-md-12">
				  	<h1 style="<?php echo esc_attr($tcolor);?>" class="product_page_title entry-title"><?php echo $page_title_title; ?></h1>
					  <?php if(!empty($bsub)) { echo '<p class="subtitle" style="'.esc_attr($scolor).'"> '.$bsub.' </p>'; } ?>
				</div>
				<div class="col-md-12">
				   	<?php if(kadence_display_shop_breadcrumbs()) { kadence_breadcrumbs(); } ?>
				</div>
			</div>
		</div>
	</div><!--container-->
</div><!--titleclass-->
<?php } } ?>
<?php do_action('after_page_header');?>