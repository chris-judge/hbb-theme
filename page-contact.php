<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$image_id = get_post_thumbnail_id();
		?>
		<div class="page-contact">

			<?php if( have_rows('hero') ): ?>
			<?php while( have_rows('hero') ): the_row(); ?>
				<?php if(get_sub_field('background_video')): ?>
					<?php $video_id = get_sub_field('background_video'); ?>
					<div class="hero half bg cover center img-op flex txt video img-op-vid-parent" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>" mp4-src="<?=$video_id['url'];?>">
						<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
						<div class="content-wrap tac txt-white">
							<h1 class="lg"><?php the_sub_field('headline'); ?></h1>
							<?php if(get_field('phone','options')): ?>
								<?php $phone = get_field('phone','options'); ?>
								<?php $phone = str_replace('.', '', $phone); ?>
								<p><a href="tel:<?=$phone;?>"><?php the_field('phone','options'); ?></a></p>
							<?php endif; ?>
							<?php if(get_field('address','options')): ?>
								<p><a href="https://www.google.com/maps/place/<?php the_field('address','options');?>"><?php the_field('address','options'); ?></a></p>
							<?php endif; ?>
						</div>
					</div>
				<?php else: ?>
					<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
					<section class="hero half bg cover center img-op flex txt" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>">
						<div class="content-wrap tac txt-white">
							<h1 class="lg"><?php the_sub_field('headline'); ?></h1>
							<?php if(get_field('phone','options')): ?>
								<?php $phone = get_field('phone','options'); ?>
								<?php $phone = str_replace('.', '', $phone); ?>
								<p><a href="tel:<?=$phone;?>"><?php the_field('phone','options'); ?></a></p>
							<?php endif; ?>
							<?php if(get_field('address','options')): ?>
								<p><a href="https://www.google.com/maps/place/<?php the_field('address','options');?>"><?php the_field('address','options'); ?></a></p>
							<?php endif; ?>
						</div>
					</section>
				<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>

			<?php if( have_rows('main') ): ?>
			<?php while( have_rows('main') ): the_row(); ?>
				<section class="main container-fluid">
					<div class="row tac">
						<div class="col-md-12">
							<h2 class="alt"><?php the_sub_field('headline'); ?></h2>
							<div class="form-swap">
								<div class="form-select" data-title="Brochure"><span class="check">X</span>Brochure</div>
								<div class="form-select" data-title="For Sales"><span class="check">X</span>For Sales</div>
								<div class="form-select" data-title="For Service & Parts"><span class="check">X</span>For Service &amp; Parts</div>
							</div>
						</div>
						<div class="col-md-12 loader-holder">
							<div class="loader lg invert">
								<?php include('_/img/loading.svg'); ?>
							</div>
						</div>
					</div>
					<div class="row form-rows" data-title="Brochure">
						<div class="col-md-12">
							<div class="form-wrap">
								<?php /*
									<iframe src="http://hellsbayboatworks.force.com/ContactBrochure" width='100%' height="720"></iframe>
								*/ ?>
								<iframe src="http://hellsbayboatworks.force.com/ContactBrochure" width='100%' height="1275" scrolling="no"></iframe>
							</div>
						</div>
					</div>
					<div class="row form-rows" data-title="For Sales">
						<div class="col-md-12">
							<div class="form-wrap">
								<iframe src="http://hellsbayboatworks.force.com/ContactSales" width='100%' height="775" scrolling="no"></iframe>
							</div>
						</div>
					</div>
					<div class="row form-rows" data-title="For Service & Parts">
						<div class="col-md-12">
							<div class="form-wrap">
								<iframe src="http://hellsbayboatworks.force.com/ContactPartsandServices" width='100%' height="775" scrolling="no"></iframe>
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