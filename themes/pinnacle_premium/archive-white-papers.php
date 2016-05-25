<?php get_header(); ?>

	<div id="pageheader" class="titleclass [ margin-bottom--xxxlarge ]" style=" background:url(/wp-content/uploads/2016/03/man-notebook-notes-macbook.png); background-position:center center; background-repeat:no-repeat; background-size:cover;">
		<div class="header-color-overlay"></div>
		<div class="container">
			<div class="page-header" style="opacity: 1;">
				<div class="row">
					<div class="col-md-12">
						<h1 style="color:#0a0a0a;" class="kad-page-title">White papers</h1>
					</div>
				<div class="col-md-12"></div>
				</div>
			</div>
		</div><!--container-->
	</div>
	<section class="[ container ][ margin-bottom--xxxlarge ]" id="white_paper">
		<div class="[ row ]">
			<div class="[ col-ss-12 col-sm-8 col-sm-offset-2 ][ margin-bottom--xlarge ]">
				<p>Download and explore our resources to learn more about what Fusionworks can do for your organization.</p>
			</div>
			<div class="[ clearfix ]"></div>
			<?php $white_papers = get_white_papers(); ?>
			<?php foreach ( $white_papers as $key => $paper ) :?>
				<div class="[ col-xs-12 col-md-4 ][ text-center ][ margin-auto ]">
					<a href="<?php echo site_url('white-papers-download'); ?>/?wppdfid=<?php echo $paper['id'] ?>">
						<img class="[ block ]" src="<?php echo THEMEPATH; ?>assets/img/pdf.jpg" alt="image pdf">
						<br>
						<?php echo $paper['title']; ?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

<?php get_footer(); ?>