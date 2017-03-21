<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$image_id = get_post_thumbnail_id();
		?>
		<div class="page-home">

			<?php if( have_rows('hero') ): ?>
			<?php while( have_rows('hero') ): the_row(); ?>
				<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
				<section class="hero full title bg center cover txt-white img-op" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>">
					<div class="content-wrap tac">
						<h1><?php the_sub_field('headline'); ?></h1>
						<?php if(get_sub_field('learn_more')): ?>
							<div class="skip">
								<p>Learn More <span><i class="fa fa-caret-down" aria-hidden="true"></i></span></p>
							</div>
						<?php endif; ?>
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>

			<?php if( have_rows('intro') ): ?>
			<?php while( have_rows('intro') ): the_row(); ?>
				<section class="container-fluid intro skip-to">
					<div class="row">
						<div class="col-md-12">
							<div class="content-wrap tac">
								<h2><span class="top"><?php the_sub_field('headline_top'); ?></span> <span class="mid"><?php the_sub_field('headline_middle'); ?></span> <span class="bot txt-teal"><?php the_sub_field('headline_bottom'); ?></span></h2>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>

			<?php if( have_rows('skiffs') ): ?>
			<?php while( have_rows('skiffs') ): the_row(); ?>
				<section class="skiffs featured-skiffs">
					<div class="top">
					<?php if( have_rows('skiff') ): ?>
					<?php $bcounter = 1; ?>
					<?php while( have_rows('skiff') ): the_row(); ?>
						<?php $hold_page = get_sub_field('page'); ?>
						<?php if($hold_page): ?>
							<?php $post = $hold_page; ?>
							<?php setup_postdata($post); ?>
							<?php $parent_id = wp_get_post_parent_id($post); ?>
							<?php if( have_rows('skiff_snippet_info') ): ?>
							<?php while( have_rows('skiff_snippet_info') ): the_row(); ?>
								<?php if($bcounter == 1): ?>
									<div class="skiff container-fluid active" data-tite="<?php the_title(); ?>" data-index="<?=$bcounter;?>" data-parent="<?=$parent_id;?>">
								<?php else: ?>
									<div class="skiff container-fluid" data-tite="<?php the_title(); ?>" data-index="<?=$bcounter;?>" data-parent="<?=$parent_id;?>">
								<?php endif; ?>
									<div class="row">
										<div class="col-md-6 images">
											<?php $counter = 1; ?>
											<?php if( have_rows('images') ): ?>
											<?php while( have_rows('images') ): the_row(); ?>
												<?php $image = get_sub_field('image'); ?>
												<?php if($counter == 1): ?>
													<div class="image active img-op bg cover center" data-index="<?=$counter;?>" img-full="<?=$image['sizes']['large'];?>" img-large="<?=$image['sizes']['large'];?>"></div>
												<?php else: ?>
													<div class="image lazy-load bg cover center" data-index="<?=$counter;?>" img-full="<?=$image['sizes']['large'];?>" img-large="<?=$image['sizes']['large'];?>"></div>
												<?php endif; ?>
												<?php $counter++; ?>
											<?php endwhile; ?>
											<?php endif; ?>
											<?php if($counter > 2): ?>
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
											<div class="top-bar">
												<?php $post_anc = get_post_ancestors($post); ?>
												<?php wp_list_pages('title_li=&depth=1&child_of='.$post_anc[1]); ?>
												<hr class="sm">
											</div>
											<div class="content-wrap">
												<h2><?php the_title(); ?></h2>
												<div class="ce-wrap">
													<?php the_sub_field('home_page_description'); ?>
												</div>
												<div class="specs">
													<?php the_sub_field('specs'); ?>
												</div>
												<p><a href="<?php the_permalink(); ?>" class="btn">Learn More</a> <a href="<?php get_home_url(); ?>/hbb/contact" class="btn">Get A Quote</a></p>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
							<?php endif; ?>	
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					<?php $bcounter++; ?>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php if($bcounter > 1): ?>
						<div class="arrows">
							<div class="prev"><i class="fa fa-caret-left" aria-hidden="true"></i></div>
							<div class="next"><i class="fa fa-caret-right" aria-hidden="true"></i></div>
						</div>
					<?php endif; ?>
					</div>
					<div class="bottom">
						<ul class="boat-nav">
							<?php if( have_rows('skiff') ): ?>
							<?php $counter = 1; ?>
							<?php while( have_rows('skiff') ): the_row(); ?>
								<?php $hold_page = get_sub_field('page'); ?>
								<?php if($hold_page): ?>
									<?php $post = $hold_page; ?>
									<?php setup_postdata($post); ?>
									<?php if( have_rows('skiff_snippet_info') ): ?>
									<?php while( have_rows('skiff_snippet_info') ): the_row(); ?>
										<?php if($counter == 1): ?>
											<li class="active" data-title="<?php the_title(); ?>" data-index="<?=$counter;?>"><?php the_title(); ?></li>
										<?php else: ?>
											<li class="" data-title="<?php the_title(); ?>" data-index="<?=$counter;?>"><?php the_title(); ?></li>
										<?php endif; ?>
									<?php endwhile; ?>
									<?php endif; ?>	
									<?php wp_reset_postdata(); ?>
									<?php $counter++; ?>
								<?php endif; ?>
							<?php endwhile; ?>
							<?php endif; ?>	
						</ul>
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	

			<?php if( have_rows('page_highlight') ): ?>
			<?php while( have_rows('page_highlight') ): the_row(); ?>
				<section class="container-fluid page-highlight tac">
					<h3><?php the_sub_field('headline'); ?></h3>
					<hr>
					<div class="row">
						<?php if( have_rows('page') ): ?>
						<?php while( have_rows('page') ): the_row(); ?>
							<?php if(get_sub_field('url') && get_sub_field('image') && get_sub_field('title')) ?>
							<div class="col-md-4 tile title">
								<a href="<?php the_sub_field('url'); ?>" class="txt-white">
									<?php $image =  get_sub_field('image'); ?>
									<div class="bg cover center" style="background-image:url(<?=$image['sizes']['large'];?>);">
									</div>
									<div class="content-wrap tal txt-shadow">
										<h4><?php the_sub_field('title'); ?></h4>
										<hr class="white sm">
									</div>
								</a>
							</div>
						<?php endwhile; ?>
						<?php endif; ?>	
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	

			<?php if( have_rows('form') ): ?>
			<?php while( have_rows('form') ): the_row(); ?>
				<?php $image = get_sub_field('background_image'); ?>
				<?php $video = get_sub_field('background_video'); ?>
				<?php if($video): ?>
					<section class="container-fluid form img-op img-op-vid-parent bg cover center" img-full="<?=$image['url'];?>" img-large="<?=$image['sizes']['large'];?>" mp4-src="<?=$video['url'];?>">
				<?php else: ?>
					<section class="img-op container-fluid form bg center cover" img-full="<?=$image['url'];?>" img-large="<?=$image['sizes']['large'];?>">
				<?php endif; ?>
					<div class="row">
						<div class="col-md-12">
							<div class="content-wrap txt-white tac">
								<h3><?php the_sub_field('headline'); ?></h3>
								<div class="form-wrap">
									<?php $form = get_sub_field('form_select'); ?>
									<?php gravity_form($form->id, true, true, false, '', true, 1); ?>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	

			<?php if( have_rows('instagram') ): ?>
			<?php while( have_rows('instagram') ): the_row(); ?>
				<?php $userid = get_sub_field('instagram_user_id'); ?>
				<?php $accessToken = get_sub_field('instagram_access_token'); ?>
				<section class="instagram container-fluid">
					<div class="row">
						<div class="col-md-12 tac">
							<h3><?php the_sub_field('headline'); ?></h3>
							<hr>
						</div>
					</div>
					<div class="arrow-wrap">
						<div class="row insta-feed">
							<div class="col-md-12 flex insta-slide" translate="0">
								<?php include('_/inc/instagram.php'); ?>
								<?php //echo do_shortcode('[instagram-feed num="12" showheader="false" showbutton="false" showfollow="false"]'); ?>
							</div>
						</div>
						<?php if($i > 3): ?>
							<div class="arrows">
								<div class="prev off"><i class="fa fa-caret-left" aria-hidden="true"></i></div>
								<div class="next"><i class="fa fa-caret-right" aria-hidden="true"></i></div>
							</div>
						<?php endif; ?>
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>	

		</div>
	<?php endwhile; ?>
	<?php endif; ?>	
<?php get_footer(); ?>