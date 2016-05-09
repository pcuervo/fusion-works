<?php get_header(); ?>

	<section class="[ container ]">
		<div class="[ row ]">
			<h2 class="[ text-center ]">White papers</h2>
			<?php $white_papers = get_white_papers(); ?>
			<?php foreach ( $white_papers as $key => $paper ) :?>
				<div class="[ col-xs-12 col-m-4 ]">
					<a href="<?php echo site_url('white-papers-download'); ?>/?wppdfid=<?php echo $paper['id'] ?>"><?php echo $paper['title']; ?></a>
				</div>
			<?php endforeach; ?>
			
		</div>
	</section>

<?php get_footer(); ?>