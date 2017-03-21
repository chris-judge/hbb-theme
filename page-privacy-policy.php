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
			</section>
		</div>
	<?php endwhile; ?>
	<?php endif; ?>	
<?php get_footer(); ?>
