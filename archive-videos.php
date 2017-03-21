<?php get_header(); ?>
	<div class="page-videos page-skiffs">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php 
				$image_id = get_post_thumbnail_id();
			?>
			<section class="skiff-type">
				<a class="skiff" href="<?php the_permalink(); ?>">
					<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
					<div class="hero half bg cover center img-op" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>">
						<div class="overlay"></div>
						<div class="content-wrap txt-white tac">
							<h1 class="alt"><?php the_title(); ?></h1>
							<p class="tagline"><?php the_field('tagline'); ?></p>
						</div>
					</div>
				</a>
			</section>
		<?php endwhile; ?>
		<?php endif; ?>	
	</div>
<?php get_footer(); ?>