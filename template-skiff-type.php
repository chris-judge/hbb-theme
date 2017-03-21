<?php /* Template Name: Skiff Type */ ?>
<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$image_id = get_post_thumbnail_id();
		?>
		<div class="page-skiff-type">
			<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
			<section class="hero half bg cover center img-op" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>"></section>
			<section class="intro tac">
				<h1 class="alt"><?php the_title(); ?></h1>
				<hr>
			</section>

			<?php if( have_rows('skiffs') ): ?>
			<?php while( have_rows('skiffs') ): the_row(); ?>
				<section class="skiffs container-fluid">
					<?php if( have_rows('skiff') ): ?>
					<?php while( have_rows('skiff') ): the_row(); ?>
						<?php $hold_page = get_sub_field('page'); ?>
						<?php if($hold_page): ?>
							<?php $post = $hold_page; ?>
							<?php setup_postdata($post); ?>
							<?php if( have_rows('skiff_snippet_info') ): ?>
							<?php while( have_rows('skiff_snippet_info') ): the_row(); ?>
								<div class="row skiff">
									<div class="col-md-6 images">
										<?php if( have_rows('images') ): ?>
										<?php $counter = 1; ?>
										<?php while( have_rows('images') ): the_row(); ?>
											<?php $image = get_sub_field('image'); ?>
											<?php if($counter == 1): ?>
												<div class="image active img-op bg cover center" data-index="<?=$counter;?>" img-full="<?=$image['sizes']['large'];?>" img-large="<?=$image['sizes']['large'];?>"></div>
											<?php else: ?>
												<div class="image img-op bg cover center" data-index="<?=$counter;?>" img-full="<?=$image['sizes']['large'];?>" img-large="<?=$image['sizes']['large'];?>"></div>
											<?php endif; ?>
											<?php $counter++; ?>
										<?php endwhile; ?>
										<?php endif; ?>
										<?php if($counter > 2 ): ?>
											<div class="dots">
												<?php for ($i=1; $i < $counter; $i++) { 
													if($i == 1){
													?>
														<div class="dot active txt-shadow" data-index="<?=$i;?>"><i class="fa fa-circle" aria-hidden="true"></i></div>
													<?php
													}else{
													?>
														<div class="dot txt-shadow" data-index="<?=$i;?>"><i class="fa fa-circle" aria-hidden="true"></i></div>
													<?php 
													}
												} ?>
											</div>
										<?php endif; ?>
									</div>
									<div class="col-md-6 info flex center">
										<div class="content-wrap">
											<h2><?php the_title(); ?></h2>
											<div class="ce-wrap">
												<?php the_sub_field('description'); ?>
											</div>
											<div class="specs">
												<?php the_sub_field('specs'); ?>
											</div>
											<a href="<?php the_permalink(); ?>" class="btn">Features &amp; Specifications</a>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
							<?php endif; ?>	
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php endif; ?>	
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	

		</div>
	<?php endwhile; ?>
	<?php endif; ?>	
<?php get_footer(); ?>