<?php /* Template Name: Conservation */ ?>
<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$image_id = get_post_thumbnail_id();
		?>
		<div class="page-conservation">
			<section class="hero txt container-fluid">
				<div class="row">
					<div class="col-md-12 tac">
						<h1 class="alt"><?php the_title(); ?></h1>
						<hr>
					</div>
				</div>
			</section>
		<?php if( have_rows('section') ): ?>
			<section class="main container-fluid">
				<div class="row">
					<div class="col-md-4">
						<ul class="conserv-menu tar">
						<?php $counter = 1; ?>
						<?php while( have_rows('section') ): the_row(); ?>
							<?php if($counter == 1): ?>
							<li class="active" data-title="<?php the_sub_field('title'); ?>"><?php the_sub_field('title'); ?><span class="anchor"><?php include('_/img/anchor.svg'); ?></span></li>
							<?php else: ?>
							<li data-title="<?php the_sub_field('title'); ?>"><?php the_sub_field('title'); ?><span class="anchor"><?php include('_/img/anchor.svg'); ?></span></li>
							<?php endif; ?>
						<?php $counter++; ?>
						<?php endwhile; ?>
						</ul>
					</div>
		<?php endif; ?>
		<?php if( have_rows('section') ): ?>
					<div class="col-md-8">
						<div class="conserv-loader loader lg invert">
							<?php include('_/img/loading.svg'); ?>
						</div>
						<?php $counter = 1; ?>
						<?php while( have_rows('section') ): the_row(); ?>
							<?php if($counter == 1): ?>
								<div class="conserv-info active" data-title="<?php the_sub_field('title'); ?>">
									<?php if(get_sub_field('logo') && is_page('conservation')): ?>
										<div class="logo">
											<?php $logo_id = get_sub_field('logo'); ?>
											<?php echo wp_get_attachment_image($logo_id['id'], 'full'); ?>
										</div>
									<?php endif; ?>
							<?php else: ?>
								<div class="conserv-info" data-title="<?php the_sub_field('title'); ?>">
							<?php endif; ?>
								<h2 class="alt"><?php the_sub_field('title'); ?></h2>
								<div class="ce-wrap">
									<?php if(get_sub_field('logo') && !is_page('conservation')): ?>
										<?php $logo_id = get_sub_field('logo'); ?>
										<?php echo wp_get_attachment_image($logo_id['id'], 'full'); ?>
									<?php endif; ?>
									<?php the_sub_field('description'); ?>
								</div>
							</div>
						<?php $counter++; ?>
						<?php endwhile; ?>
					</div>			
				</div>
			</section>
		<?php endif; ?>

		<?php if( have_rows('section') ): ?>
		<?php $counter = 1; ?>
		<?php while( have_rows('section') ): the_row(); ?>
			<?php $save_title = get_sub_field('title'); ?>
			<?php if( have_rows('gallery') ): ?>
			<?php while( have_rows('gallery') ): the_row(); ?>
				<?php if($counter == 1): ?>
					<section class="gallery container-fluid" data-title="<?=$save_title;?>">
						<div class="row">
							<div class="col-md-12 tac">
								<h2 class="alt"><span><?=$save_title;?></span> Gallery</h2>
								<div class="conserv-loader loader lg invert">
									<?php include('_/img/loading.svg'); ?>
								</div>
								<div class="gallery-images flex active lb-items-parent">
									<?php if( have_rows('images') ): ?>
									<?php $icounter = 1; ?>
									<?php while( have_rows('images') ): the_row(); ?>
										<?php $image = get_sub_field('image'); ?>
										<div class="gallery-image-outer">
											<div class="gallery-background">
												<div class="gallery-image-inner bg cover center img-op lb-item lb-img" data-index="<?=$icounter;?>" lb-url="<?=$image['sizes']['large'];?>" img-full="<?=$image['sizes']['large'];?>" img-large="<?=$image['sizes']['large'];?>"></div>
											</div>
										</div>
									<?php $icounter++; ?>
									<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</section>
					<div class="gallery-info dn" data-title="<?=$save_title;?>">
						<?php if( have_rows('images') ): ?>
						<?php while( have_rows('images') ): the_row(); ?>
							<?php $image = get_sub_field('image'); ?>
							<div class="gallery-info-img" img-full="<?=$image['sizes']['large'];?>" img-large="<?=$image['sizes']['large'];?>"></div>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				<?php else: ?>
					<div class="gallery-info dn" data-title="<?=$save_title;?>">
						<?php if( have_rows('images') ): ?>
						<?php while( have_rows('images') ): the_row(); ?>
							<?php $image = get_sub_field('image'); ?>
							<div class="gallery-info-img" img-full="<?=$image['sizes']['large'];?>" img-large="<?=$image['sizes']['large'];?>"></div>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php $counter++; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		<?php endwhile; ?>
		<?php endif; ?>	

		</div>
	<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>