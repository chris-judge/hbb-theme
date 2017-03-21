<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$image_id = get_post_thumbnail_id();
		?>
		<div class="page-single-news">
			<section class="intro container-fluid">
				<div class="row sm--row">
					<div class="col-md-12">
						<div class="content-wrap">
							<h1 class="alt"><?php the_title(); ?></h1>
							<div class="post-info ce-wrap">
								<p><strong>Posted by:</strong> <?php the_author(); ?></p>
								<p><strong>Date:</strong> <?php the_time('M j, Y'); ?> at <?php the_time('ga') ?></p>
							</div>
							<div class="social-share">
								<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
									<a class="a2a_button_facebook"></a>
									<a class="a2a_button_twitter"></a>
									<a class="a2a_button_google_plus"></a>
									<a class="a2a_button_pinterest"></a>
								</div>
								<script async src="<?php echo get_stylesheet_directory_uri(); ?>/_/js/pro/share.js"></script>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="main container-fluid">
				<div class="row sm--row">
					<div class="col-md-12">
						<div class="ce-wrap">
							 <?php the_content(); ?>
						</div>
					</div>
				</div>
				<div class="row sm--row post-nav">
					<div class="col-md-6">
						<?php previous_post_link('%link', '<i class="fa fa-angle-left" aria-hidden="true"></i> Previous'); ?>
					</div>
					<div class="col-md-6 tar">
						<?php previous_post_link('%link', 'Next <i class="fa fa-angle-right" aria-hidden="true"></i>'); ?>
					</div>
				</div>
			</section>
		</div>
	<?php endwhile; ?>
	<?php endif; ?>	
<?php get_footer(); ?>
