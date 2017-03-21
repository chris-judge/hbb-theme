<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$image_id = get_post_thumbnail_id();
		?>
		<div class="page-skiffs">

			<?php if( have_rows('skiff_types') ): ?>
			<?php while( have_rows('skiff_types') ): the_row(); ?>
				<?php if( have_rows('type') ): ?>
				<?php while( have_rows('type') ): the_row(); ?>
					<section class="skiff-type">
						<?php $image = get_sub_field('image'); ?>
						<?php $hold_page = get_sub_field('page'); ?>
						<?php if($hold_page): ?>
							<?php $post = $hold_page; ?>
							<?php setup_postdata($post); ?>
							<?php $hold_post_id = get_the_id(); ?>
							<a class="skiff" href="<?php the_permalink(); ?>">
								<div class="hero half bg cover center img-op" img-full="<?=$image['url'];?>" img-large="<?=$image['sizes']['large'];?>">
									<div class="overlay"></div>
									<h1 class="alt"><?php the_title(); ?></h1>
								</div>
							</a>
							<div class="skiffs tac">
								<?php $args = array(
									'child_of' => $hold_post_id,
									'title_li' => '',
								); ?>
								<?php wp_list_pages($args); ?>
							</div>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</section>
				<?php endwhile; ?>
				<?php endif; ?>	
			<?php endwhile; ?>
			<?php endif; ?>	

		</div>
	<?php endwhile; ?>
	<?php endif; ?>	
<?php get_footer(); ?>