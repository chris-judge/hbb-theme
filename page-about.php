<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$image_id = get_post_thumbnail_id();
		?>
		<div class="page-about">

			<?php if( have_rows('hero') ): ?>
			<?php while( have_rows('hero') ): the_row(); ?>
				<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
				<section class="hero half bg cover center img-op video flex" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>">
					<?php if(get_sub_field('video_id')): ?>
						<div class="play-btn" data-url="<?php the_sub_field('video_id'); ?>">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="59.004px" height="59.004px" viewBox="0 0 59.004 59.004" enable-background="new 0 0 59.004 59.004" xml:space="preserve">
							<g>
								<defs>
									<rect id="SVGID_1_" width="59.004" height="59.004"/>
								</defs>
								<clipPath id="SVGID_2_">
									<use xlink:href="#SVGID_1_"  overflow="visible"/>
								</clipPath>
								<path class="color" clip-path="url(#SVGID_2_)" fill="#FFFFFF" d="M43.889,30.233L21.725,41.826c-0.55,0.287-1.207-0.11-1.207-0.73V17.91
									c0-0.62,0.657-1.02,1.207-0.731l22.164,11.593C44.482,29.079,44.482,29.923,43.889,30.233"/>
								<path class="color" clip-path="url(#SVGID_2_)" fill="#FFFFFF" d="M29.502,59.005C13.234,59.005,0,45.77,0,29.502C0,13.234,13.234,0,29.502,0
									s29.502,13.234,29.502,29.502C59.004,45.77,45.77,59.005,29.502,59.005 M29.502,2.339C14.523,2.339,2.34,14.524,2.34,29.502
									c0,14.977,12.184,27.162,27.162,27.162c14.978,0,27.163-12.185,27.163-27.162C56.665,14.524,44.479,2.339,29.502,2.339"/>
							</g>
							</svg>

						</div>
					<?php endif; ?>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>

			<?php if( have_rows('intro') ): ?>
			<?php while( have_rows('intro') ): the_row(); ?>
				<section class="intro container-fluid">
					<div class="row sm--row">
						<div class="col-md-12">
							<div class="content-wrap">
								<h1 class="alt"><?php the_sub_field('headline'); ?></h1>
								<div class="ce-wrap">
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
								<div class="col-md-7 tar out">
									<?php $logo_id = get_sub_field('image'); ?>
									<?php echo wp_get_attachment_image($logo_id['id'], 'full'); ?>
								</div>
							<?php else: ?>
								<div class="col-md-5 out">
									<?php $logo_id = get_sub_field('image'); ?>
									<?php echo wp_get_attachment_image($logo_id['id'], 'full'); ?>
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

			<?php if( have_rows('copy_split') ): ?>
			<?php while( have_rows('copy_split') ): the_row(); ?>
				<section class="copy-split container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="content-wrap tac">
								<div class="ce-wrap">
									<h2><?php the_sub_field('headline'); ?></h2>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	

			<?php if( have_rows('conclusion') ): ?>
			<?php while( have_rows('conclusion') ): the_row(); ?>
				<section class="conclusion container-fluid">
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

			<?php if( have_rows('featured_skiffs') ): ?>
			<?php while( have_rows('featured_skiffs') ): the_row(); ?>
				<section class="container-fluid page-highlight tac">
					<h3 class="alt">Featured Skiffs</h3>
					<div class="row">
						<?php if( have_rows('skiff_type') ): ?>
						<?php while( have_rows('skiff_type') ): the_row(); ?>
							<?php $hold_page = get_sub_field('page_link'); ?>
							<?php if($hold_page): ?>
								<?php $post = $hold_page; ?>
								<?php setup_postdata($post); ?>
									<div class="col-md-4 tile title">
										<a href="<?php the_permalink(); ?>" class="txt-white">
											<?php $image_id = get_post_thumbnail_id();?>
											<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
											<div class="bg cover center" style="background-image:url(<?=$img_src[0];?>);">
											</div>
											<div class="content-wrap tal txt-shadow">
												<h4><?php the_title(); ?></h4>
												<hr class="white sm">
											</div>
										</a>
									</div>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>	
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	

			<?php if( have_rows('other_pages') ): ?>
			<?php while( have_rows('other_pages') ): the_row(); ?>
				<section class="container-fluid other-pages-nav">
					<div class="row">
						<div class="col-md-12">
							<?php if( have_rows('page') ): ?>
								<ul class="tac">
								<?php while( have_rows('page') ): the_row(); ?>
									<?php $hold_page = get_sub_field('page_link'); ?>
									<?php if($hold_page): ?>
										<?php $post = $hold_page; ?>
										<?php setup_postdata($post); ?>
										<li><a href="<?php the_permalink(); ?>" class="btn"><?php the_title(); ?></a></li>
										<?php wp_reset_postdata(); ?>
									<?php endif; ?>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>	
						</div>
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	

		</div>
	<?php endwhile; ?>
	<?php endif; ?>	
<?php get_footer(); ?>