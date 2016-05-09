<?php
/*
Template Name: pinnacle_premium
*/
?>

<?php get_header(); ?>
<?php get_template_part('templates/page', 'header'); ?>
	<div class="[ container ]">
		<div class="[ row ]">
			<div class="[ col-ss-12 col-sm-6 col-sm-offset-3 ]">
				<div class="panel-grid " id="pg-1128-1"><div style="padding-bottom: 50px; " class="panel-row-style"><div class="panel-grid-cell" id="pgc-1128-1-0">&nbsp;</div><div class="panel-grid-cell" id="pgc-1128-1-1"><div class="so-panel widget widget_black-studio-tinymce widget_black_studio_tinymce panel-first-child panel-last-child" id="panel-1128-1-1-0"><div class="textwidget"><script type="text/javascript">
				jQuery(document).ready(function($) {
			    	$.extend($.validator.messages, {
				        required: "This field is required.",
						email: "Please enter a valid email address.",
					 });
					$("#kad-feedback-new-post").validate();
				});
				</script>
				<script type="text/javascript" src="http://localhost:8888/fusion-works/wp-content/themes/pinnacle_premium/assets/js/jquery.validate-ck.js"></script>
				<div id="kt-feedback-postbox" class="testimonial-form-container">
					<div class="kt-feedback-inputarea">
						<form id="kad-feedback-new-post" name="new_post" method="post" enctype="multipart/form-data" action="http://localhost:8888/fusion-works/white-papers-download/" novalidate="novalidate">
							<p><label>Name</label>
								<input type="text" class="full required requiredField" value="" id="kt-feedback-post-title" name="post-title">
												</p>
							<p><label>Email</label>
								<textarea class="required requiredField" name="posttext" id="kt-feedback-post-text" cols="60" rows="10"></textarea>
							</p>
							<p>
								<label>Position</label>
								<input type="text" class="full" id="kt-feedback-post-location" value="" name="post-location">
							</p>
							<p>
								<label>Company</label>
								<input type="text" class="full" value="" id="kt-feedback-post-company" name="post-company">
							</p>
							<p>
								<label>32 + 3</label>
								<input type="text" id="kt-feedback-post-verify" class="kad-quarter required requiredField" name="post-verify">
							</p>
							<input type="hidden" name="hval" id="hval" value="1c383cd30b7c298ab50293adfecb7b18">
							<input type="hidden" id="post-title-nonce" name="post-title-nonce" value="11114b0183"><input type="hidden" name="_wp_http_referer" value="/fusion-works/white-papers-download/">				<input id="submit" type="submit" class="kad-btn kad-btn-primary" tabindex="3" value="Download">
							<input type="hidden" name="submitted" id="submitted" value="true">
						</form>
					</div>
				</div>
				</div></div></div><div class="panel-grid-cell" id="pgc-1128-1-2">&nbsp;</div></div></div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>