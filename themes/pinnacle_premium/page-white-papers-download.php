<?php
/*
Template Name: pinnacle_premium
*/
?>
<?php
	if( ! isset( $_GET['wppdfid'] ) ) wp_redirect( site_url( 'white-papers' ) );
	$pdf = get_white_paper_pdf( $_GET['wppdfid']  );
?>
<?php get_header(); ?>
<?php get_template_part('templates/page', 'header'); ?>
	<div class="[ container ]">
		<div class="[ row ]">
			<div class="[ col-ss-12 col-sm-6 col-sm-offset-3 ]">
				<div class="panel-grid " id="pg-1128-1"><div style="padding-bottom: 50px; " class="panel-row-style"><div class="panel-grid-cell" id="pgc-1128-1-0">&nbsp;</div><div class="panel-grid-cell" id="pgc-1128-1-1"><div class="so-panel widget widget_black-studio-tinymce widget_black_studio_tinymce panel-first-child panel-last-child" id="panel-1128-1-1-0"><div class="textwidget">
				<script type="text/javascript">
				jQuery(document).ready(function($) {
			    	$.extend($.validator.messages, {
				        required: "This field is required.",
						email: "Please enter a valid email address.",
					});
			    	$(".js-white-paper-form").validate();
				});
				</script>
				<script type="text/javascript" src="<?php echo JSPATH; ?>jquery.validate-ck.js"></script>
				<div id="kt-feedback-postbox" class="testimonial-form-container">
					<p>File to download: <?php echo $pdf['title'] ?></p>
					<div class="kt-feedback-inputarea">
						<form class="[ js-white-paper-form ]" name="new_post" method="post" enctype="multipart/form-data" novalidate="novalidate">
							<p><label>Name</label>
								<input type="text" class="full required requiredField" value="" id="kt-feedback-post-title" name="name">
							</p>
							<p><label>Email</label>
								<input type="email" class="full required requiredField" value="" id="kt-feedback-post-title" name="email">
							</p>
							<p>
								<label>Position</label>
								<input type="text" class="full" id="kt-feedback-post-location" value="" name="position">
							</p>
							<p>
								<label>Company</label>
								<input type="text" class="full" value="" id="kt-feedback-post-company" name="company">
							</p>	
							<input type="hidden" name="pdf_url" value="<?php echo $pdf['url'] ?>">	
							<input type="hidden" name="pdf_title" value="<?php echo $pdf['title'] ?>">	
							<input type="hidden" name="action" value="send_pdf_by_email">	
							<input id="submit" type="submit" class="kad-btn kad-btn-primary" tabindex="3" value="Send by email">
						</form>
					</div>
				</div>
				</div></div></div><div class="panel-grid-cell" id="pgc-1128-1-2">&nbsp;</div></div></div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>