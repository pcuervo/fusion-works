<?php

/**
* Here we add all the javascript that needs to be run on the footer.
**/
function footer_scripts(){
	global $post;

	if( wp_script_is( 'functions', 'done' ) ) :

?>
		<script type="text/javascript">
			$( document ).ready(function() {

				console.log('sjfjnf');

				/*------------------------------------*\
					#GLOBAL
				\*------------------------------------*/


				/**
				 * Triggered events
				**/
				

				<?php if( is_home() ) : ?>

					/**
					 * On load
					**/

					

				<?php endif; ?>

				<?php if( is_page( 'erp' ) ) : ?>

				
					new WOW().init();

				<?php endif; ?>


			});
		</script>
<?php
	endif;
}// footer_scripts
?>