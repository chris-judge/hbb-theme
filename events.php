<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$image_id = get_post_thumbnail_id();
		?>
		<div class="page-single-event page-single-news">
			<section class="main container-fluid">
				<div class="row">
					<div class="col-md-6 tar">
						<?php $img_id = get_field('flyer'); ?>
						<?php echo wp_get_attachment_image($img_id['id'], 'full'); ?>
					</div>
					<div class="col-md-6">
						<div class="intro">
							<h1 class="alt"><?php the_title(); ?></h1>
							<div class="post-info ce-wrap">
								<?php if(get_field('start_date') || get_field('end_date')): ?>
									<?php if(get_field('start_date') && get_field('end_date')): ?>
										<?php if(get_field('start_date') == get_field('end_date')): ?>
											<p><strong>Date:</strong> <?=date('F j, Y',strtotime(get_field('start_date')));?></p>
										<?php else: ?>
											<p><strong>Date:</strong> <?=date('F j',strtotime(get_field('start_date')));?> - <?=date('j, Y',strtotime(get_field('end_date')));?></p>
										<?php endif; ?>
									<?php elseif(get_field('start_date')): ?>
										<p><strong>Date:</strong> <?=date('F j, Y',strtotime(get_field('start_date')));?></p>
									<?php elseif(get_field('end_date')): ?>
										<p><strong>Date:</strong> <?=date('F j, Y',strtotime(get_field('end_date')));?></p>
									<?php endif; ?>
								<?php endif; ?>
								<?php if(get_field('time')): ?>
									<p><strong>Time:</strong> <?=the_field('time');?></p>
								<?php endif; ?>
								<?php if(get_field('location')): ?>
									<p><strong>Location:</strong> <?=the_field('location');?></p>
								<?php endif; ?>
								<?php if(get_field('price')): ?>
									<p><strong>Price:</strong> <?=the_field('price');?></p>
								<?php endif; ?>
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
						<div class="main">
							<div class="ce-wrap">
								 <?php the_content(); ?>
							</div>
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
