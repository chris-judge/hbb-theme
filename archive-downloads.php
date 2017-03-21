<?php get_header(); ?>

	<?php $downloads_id = 4; ?>
	<?php $advertisements_id = 5; ?>
	<?php $reviews_id = 6; ?>

	<div class="page-downloads">



		<section class="downloads container-fluid">
			<div class="row">
				<div class="col-md-12 tac">
					<h1 class="alt">Downloads</h1>
					<hr>
				</div>
			</div>
			<?php if ( have_posts() ) : ?>
			<?php $counter = 1; ?>
			<div class="row entries">
				<div class="col-md-12">
					<div class="flex" translate="0">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if(in_array($downloads_id ,wp_get_post_categories($post->ID))): ?>
						<?php $image_id = get_post_thumbnail_id(); ?>
						<?php if($counter < 4): ?>
						<div class="entry tac active" style="order:<?=$counter;?>;" data-index="<?=$counter;?>">
							<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
							<div class="bg center cover" style="background-image:url(<?=$img_src[0];?>);"></div>
						<?php else: ?>
						<div class="entry tac lazy-load" style="order:<?=$counter;?>;" data-index="<?=$counter;?>">
							<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
							<div class="bg center cover lazy-load" style="" data-url="background-image:url(<?=$img_src[0];?>);"></div>
						<?php endif; ?>
							<h2 class="lg"><?php the_title(); ?></h2>
							<?php if( have_rows('sizes') ): ?>
							<?php while( have_rows('sizes') ): the_row(); ?>
								<?php $file = get_sub_field('file'); ?>
								<p><a href="<?=$file['url'];?>"><?php the_sub_field('size_headline'); ?></a></p>
							<?php endwhile; ?>
							<?php endif; ?>	
						</div>
					<?php $counter++; ?>
					<?php endif; ?>
				<?php endwhile; ?>
					</div>
				</div>
				<?php if($counter > 4): ?>
				<div class="arrows">
					<div class="left off"><?php include('_/img/arrow.svg') ?></div>
					<div class="right"><?php include('_/img/arrow.svg') ?></div>
				</div>
				<?php endif; ?>
			</div>
				<?php if($counter > 4): ?>
					<div class="row view-all">
						<div class="col-md-12 tac">
							<a href="" class="btn epd"><span class="view">View All</span><span class="quit">x Close</span></a>
						</div>
					</div>
				<?php endif; ?>
			<?php else : ?>
				<div class="row">
					<div class="col-md-12 tac">
						<p>Sorry, no downloads were found.</p>
					</div>
				</div>
			<?php endif; ?>
		</section>



		<section class="advertisements container-fluid">
			<div class="row">
				<div class="col-md-12 tac">
					<h1 class="alt">Advertisements</h1>
					<hr>
				</div>
			</div>
			<?php if ( have_posts() ) : ?>
			<?php $counter = 1; ?>
			<div class="row entries">
				<div class="col-md-12">
					<div class="flex lb-items-parent" translate="0">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if(in_array($advertisements_id ,wp_get_post_categories($post->ID))): ?>
						<?php $image_id = get_post_thumbnail_id(); ?>
						<?php if($counter < 4): ?>
						<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
						<?php $img_src_full = wp_get_attachment_image_src($image_id,'full'); ?>
						<div class="entry tac active lb-item lb-img" style="order:<?=$counter;?>;" data-index="<?=$counter;?>" lb-title="<?php the_title(); ?>" lb-url="<?=$img_src_full[0];?>">
							<div class="bg center cover" style="background-image:url(<?=$img_src[0];?>);"></div>
						<?php else: ?>
							<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
							<?php $img_src_full = wp_get_attachment_image_src($image_id,'full'); ?>
						<div class="entry tac lazy-load lb-item lb-img" style="order:<?=$counter;?>;" data-index="<?=$counter;?>" lb-title="<?php the_title(); ?>" lb-url="<?=$img_src_full[0];?>">
							<div class="bg center cover lazy-load" style="" data-url="background-image:url(<?=$img_src[0];?>);"></div>
						<?php endif; ?>
							<h2 class="lg"><a href="" class="epd lb-link"><?php the_title(); ?></a></h2>
						</div>
					<?php $counter++; ?>
					<?php endif; ?>
				<?php endwhile; ?>
					</div>
				</div>
				<?php if($counter > 4): ?>
				<div class="arrows">
					<div class="left off"><?php include('_/img/arrow.svg') ?></div>
					<div class="right"><?php include('_/img/arrow.svg') ?></div>
				</div>
				<?php endif; ?>
			</div>
				<?php if($counter > 4): ?>
					<div class="row view-all">
						<div class="col-md-12 tac">
							<a href="" class="btn epd"><span class="view">View All</span><span class="quit">x Close</span></a>
						</div>
					</div>
				<?php endif; ?>
			<?php else : ?>
				<div class="row">
					<div class="col-md-12 tac">
						<p>Sorry, no advertisments were found.</p>
					</div>
				</div>
			<?php endif; ?>
		</section>



		<section class="reviews container-fluid">
			<div class="row">
				<div class="col-md-12 tac">
					<h1 class="alt">Reviews</h1>
					<hr>
				</div>
			</div>
			<?php if ( have_posts() ) : ?>
			<?php $counter = 1; ?>
			<div class="row entries">
				<div class="col-md-12">
					<div class="flex" translate="0">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if(in_array($reviews_id ,wp_get_post_categories($post->ID))): ?>
						<?php if(get_field('file')): ?>
							<?php $image_id = get_post_thumbnail_id(); ?>
							<?php if($counter < 4): ?>
							<div class="entry tac active" style="order:<?=$counter;?>;" data-index="<?=$counter;?>">
								<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
								<?php $file = get_field('file'); ?>
								<a target="_blank" href="<?=$file['url'];?>"><div class="bg center cover" style="background-image:url(<?=$img_src[0];?>);"></div></a>

							<?php else: ?>
							<div class="entry tac lazy-load" style="order:<?=$counter;?>;" data-index="<?=$counter;?>">
								<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
								<?php $file = get_field('file'); ?>
								<a target="_blank" href="<?=$file['url'];?>"><div class="bg center cover lazy-load" style="" data-url="background-image:url(<?=$img_src[0];?>);"></div></a>

							<?php endif; ?>
								<p class="tagline"><?php the_field('review_type'); ?></p>
								<?php $file = get_field('file'); ?>
								<h2 class="lg"><a target="_blanl" href="<?=$file['url'];?>"><?php the_title(); ?></a></h2>

							</div>
							<?php $counter++; ?>
						<?php endif; ?>
					<?php endif; ?>
				<?php endwhile; ?>
					</div>
				</div>
				<?php if($counter > 4): ?>
				<div class="arrows">
					<div class="left off"><?php include('_/img/arrow.svg') ?></div>
					<div class="right"><?php include('_/img/arrow.svg') ?></div>
				</div>
				<?php endif; ?>
			</div>
				<?php if($counter > 4): ?>
					<div class="row view-all">
						<div class="col-md-12 tac">
							<a href="" class="btn epd"><span class="view">View All</span><span class="quit">x Close</span></a>
						</div>
					</div>
				<?php endif; ?>
			<?php else : ?>
				<div class="row">
					<div class="col-md-12 tac">
						<p>Sorry, no reviews were found.</p>
					</div>
				</div>
			<?php endif; ?>
		</section>



	</div>
<?php get_footer(); ?>