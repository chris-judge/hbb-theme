<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$image_id = get_post_thumbnail_id();
		?>
		<div class="page-video">
			<section class="intro container-fluid">
				<div class="row">
					<div class="col-md-12 tac">
						<div class="logo-wrap">
							<?php $logo = get_field('logo'); ?>
							<?php echo wp_get_attachment_image($logo['id'], 'full'); ?>
						</div>
						<div class="ce-wrap">
							<?php the_field('description'); ?>
						</div>
					</div>
				</div>
			</section>

			<?php if( have_rows('videos') ): ?>
			<?php while( have_rows('videos') ): the_row(); ?>
			<?php if(get_sub_field('multiple_seasons')): ?>
			<section class="seasons-nav container-fluid">
				<div class="row">
					<div class="col-md-12">
						<ul class="tac">
						<?php if( have_rows('season') ): ?>
						<?php $counter = 1; ?>
						<?php while( have_rows('season') ): the_row(); ?>
							<?php if($counter == 1): ?>
								<li class="active" data-year="<?=the_sub_field('season_year');?>"><?php the_sub_field('season_year'); ?></li>
							<?php else: ?>
								<li data-year="<?=the_sub_field('season_year');?>"><?php the_sub_field('season_year'); ?></li>
							<?php endif; ?>
						<?php $counter++; ?>
						<?php endwhile; ?>
						<?php endif; ?>	
						</ul>
						<div class="conserv-loader loader lg invert tac">
							<?php include('_/img/loading.svg'); ?>
						</div>
					</div>
				</div>
			</section>
			<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>	

			<?php if( have_rows('videos') ): ?>
				<div class="videos-wrap">
			<?php while( have_rows('videos') ): the_row(); ?>

			<?php if(get_sub_field('multiple_seasons')): ?>
				<?php if( have_rows('season') ): ?>
				<?php $counter = 1; ?>
				<?php while( have_rows('season') ): the_row(); ?>
					<?php if($counter == 1): ?>
						<section class="season active lb-items-parent" data-year="<?=the_sub_field('season_year');?>">
							<div class="row-wrap">
								<?php if( have_rows('episode') ): ?>
								<?php $episode_counter = 1; ?>
								<?php while( have_rows('episode') ): the_row(); ?>
									<div class="vid tac">
										<div class="lb-item lb-video tac" lb-url="<?=get_sub_field('episode_id');?>" data-index="<?=$episode_counter;?>" lb-title="<?php the_sub_field('episode_name'); ?>">
											<?php
												$id = get_sub_field('episode_id');
												$id = 'http://vimeo.com/api/v2/video/'.$id.'.php';
												$vimeo = unserialize(file_get_contents($id));
											?>
											<div class="bg center cover img-op" img-full="<?=$vimeo[0]['thumbnail_large'];?>" img-large="<?=$vimeo[0]['thumbnail_large'];?>">
												<div class="overlay"></div>
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
											<h2 class="lg"><?php the_sub_field('episode_name'); ?></h2>
										</div>
									</div>
								<?php $episode_counter++; ?>
								<?php endwhile; ?>
								<?php endif; ?>	
							</div>
						</section>
					<?php else: ?>
						<section class="season lb-items-parent" data-year="<?=the_sub_field('season_year');?>">
							<div class="row-wrap">
								<?php if( have_rows('episode') ): ?>
								<?php $episode_counter = 1; ?>
								<?php while( have_rows('episode') ): the_row(); ?>
									<div class="vid tac dn">
										<div class="epd db lb-item lb-video tac" lb-url="<?=get_sub_field('episode_id');?>" data-index="<?=$episode_counter;?>" lb-title="<?php the_sub_field('episode_name'); ?>">
											<?php
												$id_old = get_sub_field('episode_id');
												$id = 'http://vimeo.com/api/v2/video/'.$id_old.'.php';
											?>
											<div class="bg center cover img-op" data-url="<?=$id_old;?>" img-full="" img-large="">
												<div class="overlay"></div>
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
											<div class="title">
												<h2 class="lg"><?php the_sub_field('episode_name'); ?></h2>
											</div>
										</div>
									</div>
								<?php $episode_counter++; ?>
								<?php endwhile; ?>
								<?php endif; ?>	
							</div>
						</section>
					<?php endif; ?>
				<?php $counter++; ?>
				<?php endwhile; ?>
				<?php endif; ?>	
			<?php else: ?>

				<?php if( have_rows('episodes') ): ?>
				<?php $counter = 1; ?>
				<?php while( have_rows('episodes') ): the_row(); ?>
					<?php if($counter == 1): ?>
						<section class="season episodes active lb-items-parent" data-year="<?=the_sub_field('season_year');?>">
							<div class="row-wrap">
								<?php if( have_rows('episode') ): ?>
								<?php $episode_counter = 1; ?>
								<?php while( have_rows('episode') ): the_row(); ?>
									<?php
										$id_old = get_sub_field('episode_id');
										$id = 'http://vimeo.com/api/v2/video/'.$id_old.'.php';
									?>
									<?php if($episode_counter <= 10): ?>
										<?php $vimeo = unserialize(file_get_contents($id)); ?>
										<div class="vid tac">
									<?php else: ?>
										<div class="vid tac dn">
									<?php endif; ?>
										<div class="epd db lb-item lb-video tac" lb-url="<?=get_sub_field('episode_id');?>" data-index="<?=$episode_counter;?>" lb-title="<?php the_sub_field('episode_name'); ?>">
											<?php if($episode_counter <= 10): ?>
												<div class="bg center cover img-op" img-full="<?=$vimeo[0]['thumbnail_large'];?>" img-large="<?=$vimeo[0]['thumbnail_large'];?>">
											<?php else: ?>
												<div class="bg center cover img-op" data-url="<?=$id_old;?>" img-full="" img-large="">
											<?php endif; ?>
												<div class="overlay"></div>
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
											<div class="title">
												<h2 class="lg"><?php the_sub_field('episode_name'); ?></h2>
											</div>
										</div>
									</div>
								<?php $episode_counter++; ?>
								<?php endwhile; ?>
								<?php endif; ?>	
							</div>
							<div class="por tac" style="height:45px;">
								<div class="conserv-loader loader lg invert tac" style="top:0;">
									<?php include('_/img/loading.svg'); ?>
								</div>
							</div>
						</section>
						<?php endif; ?>
				<?php endwhile; ?>
				<?php endif; ?>	

			<?php endif; ?>

			<?php endwhile; ?>
			</div>
			<?php endif; ?>	

		</div>
	<?php endwhile; ?>
	<?php endif; ?>	
<?php get_footer(); ?>