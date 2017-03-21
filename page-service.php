<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$image_id = get_post_thumbnail_id();
		?>
		<div class="page-service">
			<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
			<section class="hero half bg cover center img-op" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>"></section>

			<?php if( have_rows('intro') ): ?>
			<?php while( have_rows('intro') ): the_row(); ?>
				<section class="intro container-fluid">
					<div class="row sm--row">
						<div class="col-md-12">
							<div class="content-wrap">
								<h1 class="alt"><?php the_sub_field('headline'); ?></h1>
								<div class="ce-wrap">
									<p><?php the_sub_field('tagline'); ?></p>
									<p class="lg">
										<?php if(get_sub_field('phone')): ?>
											<a target="_blank" href="tel:<?=str_replace("-", "", get_sub_field('phone'));?>"><?php the_sub_field('phone'); ?></a>
										<?php endif; ?>
										<?php if(get_sub_field('email') && get_sub_field('phone')): ?>
											<span class="divider">|</span>
										<?php endif; ?>
										<?php if(get_sub_field('email')): ?>
											<a target="_blank" href="mailto:<?=get_sub_field('email');?>"><?php the_sub_field('email'); ?></a>
										<?php endif; ?>
									</p>
									<?php the_sub_field('description'); ?>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	

			<?php if( have_rows('image_split') ): ?>
			<?php while( have_rows('image_split') ): the_row(); ?>
				<section class="image-split container-fluid">
					<div class="row">
						<?php if( have_rows('images') ): ?>
						<?php $counter = 1; ?>
						<?php while( have_rows('images') ): the_row(); ?>
							<?php if($counter == 1): ?>
								<div class="col-md-8 tar out">
									<?php $img_id = get_sub_field('image'); ?>
									<?php echo wp_get_attachment_image($img_id['id'], 'full'); ?>
								</div>
							<?php else: ?>
								<div class="col-md-4 out">
									<?php $img_id = get_sub_field('image'); ?>
									<?php echo wp_get_attachment_image($img_id['id'], 'full'); ?>
								</div>
							<?php endif; ?>
						<?php $counter++; ?>
						<?php endwhile; ?>
						<?php endif; ?>	
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	

			<?php if( have_rows('main') ): ?>
			<?php while( have_rows('main') ): the_row(); ?>
				<section class="main container-fluid">
					<div class="row sm--row">
						<div class="col-md-12">
							<div class="content-wrap">
								<div class="ce-wrap">
									<?php the_sub_field('description'); ?>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	

			<?php if( have_rows('gallery') ): ?>
			<?php while( have_rows('gallery') ): the_row(); ?>
				<section class="gallery container-fluid">
					<div class="row">
						<div class="col-md-12 tac">
							<h2 class="alt"><?php the_title(); ?> Gallery</h2>
							<div class="gallery-images flex lb-items-parent">
								<?php if( have_rows('images') ): ?>
								<?php $counter = 1; ?>
								<?php while( have_rows('images') ): the_row(); ?>
									<?php $image = get_sub_field('image'); ?>
									<div class="gallery-image-outer">
										<div class="gallery-background">
											<div class="gallery-image-inner bg cover center img-op lb-img lb-item" lb-url="<?=$image['sizes']['large'];?>" data-index="<?=$counter;?>" img-full="<?=$image['sizes']['large'];?>" img-large="<?=$image['sizes']['large'];?>"></div>
										</div>
									</div>
								<?php $counter++; ?>
								<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>

		</div>
	<?php endwhile; ?>
	<?php endif; ?>	
<?php get_footer(); ?>