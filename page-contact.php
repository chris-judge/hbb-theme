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
							<?php if( have_rows('forms') ): ?>
								<div class="form-swap">
								<?php while( have_rows('forms') ): the_row(); ?>
									<div class="form-select" data-title="<?=get_sub_field('form')->title;?>"><span class="check">X</span><?=get_sub_field('form')->title;?></div>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>	
						</div>
						<div class="col-md-12 loader-holder">
							<div class="loader lg invert">
								<?php include('_/img/loading.svg'); ?>
							</div>
						</div>
					</div>
					<?php if( have_rows('forms') ): ?>
					<?php $tab_fix = 1; ?>
					<?php while( have_rows('forms') ): the_row(); ?>
						<div class="row form-rows" data-title="<?=get_sub_field('form')->title;?>">
							<div class="col-md-12">
								<div class="form-wrap">
									<?php gravity_form_enqueue_scripts(get_sub_field('form')->id, true);  ?>
									<?php gravity_form(get_sub_field('form')->id, true, true, false, '', true, $tab_fix);  ?> 
								</div>
							</div>
						</div>
					<?php $tab_fix+=20; ?>
					<?php endwhile; ?>
					<?php endif; ?>	
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	
			<h1>Salesforce Form</h1>
			<?php include('salesforce-form.php'); ?>
			<hr>
		</div>
	<?php endwhile; ?>
	<?php endif; ?>	
<?php get_footer(); ?>