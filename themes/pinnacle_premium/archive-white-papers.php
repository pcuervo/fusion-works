<?php get_header(); ?>

	<section class="[ container ]">
		<div class="[ row ]">
			<h2 class="[ text-center ]">White papers</h2>
			<?php $white_papers = get_white_papers(); ?>
			<?php foreach ( $white_papers as $key => $paper ) :?>
				<div class="[ col-xs-12 col-m-4 ]">
					<?php echo $paper['title']; ?>
				</div>
			<?php endforeach; ?>
			
		</div>
	</section>


<?php get_footer(); ?>