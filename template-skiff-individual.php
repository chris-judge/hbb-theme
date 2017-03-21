<?php /* Template Name: Skiff Individual */ ?>
<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$image_id = get_post_thumbnail_id();
		?>
		<div class="page-skiff-individual">

			<?php if( have_rows('hero') ): ?>
			<?php while( have_rows('hero') ): the_row(); ?>
				<section class="hero half images">
					<?php $img_src = wp_get_attachment_image_src($image_id,'large'); ?>
					<div class="image img-op bg cover center active" data-index="1" img-full="<?=wp_get_attachment_url($image_id);?>" img-large="<?=$img_src[0];?>"></div>
					<?php if( have_rows('images') ): ?>
					<?php $counter = 2; ?>
					<?php while( have_rows('images') ): the_row(); ?>
						<?php $image = get_sub_field('image'); ?>
							<div class="image img-op bg cover center" data-index="<?=$counter;?>" img-full="<?=$image['url'];?>" img-large="<?=$image['sizes']['large'];?>"></div>
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
				</section>
			<?php endwhile; ?>
			<?php endif; ?>

			<?php if( have_rows('intro') ): ?>
			<?php while( have_rows('intro') ): the_row(); ?>
				<section class="intro container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="content-wrap tac">
								<?php $logo_id = get_sub_field('logo'); ?>
								<?php echo wp_get_attachment_image($logo_id['id'], 'full'); ?>
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

			<?php if( have_rows('video') ): ?>
			<?php while( have_rows('video') ): the_row(); ?>
				<?php $image = get_sub_field('image'); ?>
				<section class="video hero half bg cover center img-op flex center" img-full="<?=$image['url'];?>" img-large="<?=$image['sizes']['large'];?>">
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

			<section class="container-fluid features-specs">
				<div class="row">
					<div class="col-md-12 tac">
						<h2 class="alt">Features &amp; Specifications</h2>
					</div>
				</div>
				<?php if( have_rows('colors') ): ?>
				<?php while( have_rows('colors') ): the_row(); ?>
					<div class="row inner">
						<div class="col-md-12">
							<div class="colors flex center">
							<?php if( have_rows('color') ): ?>
							<?php while( have_rows('color') ): the_row(); ?>
								<?php 
									$value = get_sub_field('name');
									$field = get_sub_field_object('name');
									$label = $field['choices'][ $value ];
								?>
								<div class="color-block-outer tac">
									<div class="color-block-inner">
										<div class="top" style="background-color: <?=$value;?>;"></div>
										<div class="bot"><?=$label;?></div>
									</div>
								</div>
							<?php endwhile; ?>
							<?php endif; ?>	
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>

				<?php if( have_rows('specifications') ): ?>
				<?php while( have_rows('specifications') ): the_row(); ?>
					<div class="row inner spec">
						<?php if( have_rows('spec') ): ?>
						<div class="col-md-6">
							<div class="title tar">
								<?php $counter = 1; ?>
								<?php while( have_rows('spec') ): the_row(); ?>
									<?php if($counter == 1): ?>
										<p class="active" data-index="<?=$counter;?>"><?php the_sub_field('title'); ?> <span class="anchor"><?php include('_/img/anchor.svg'); ?></span></p>
									<?php else: ?>
										<p data-index="<?=$counter;?>"><?php the_sub_field('title'); ?> <span class="anchor"><?php include('_/img/anchor.svg'); ?></span></p>
									<?php endif; ?>
									<?php $counter++; ?>
								<?php endwhile; ?>
							</div>
						</div>
						<?php endif; ?>		
						
						<?php if( have_rows('spec') ): ?>
						<div class="col-md-6">
							<div class="description">
								<?php $counter = 1; ?>
								<?php while( have_rows('spec') ): the_row(); ?>
									<?php if($counter == 1): ?>
										<div class="active ce-wrap" data-index="<?=$counter;?>" data-title="<?php the_sub_field('title'); ?>">
											<?php the_sub_field('description'); ?>
										</div>
									<?php else: ?>
										<div class="ce-wrap" data-index="<?=$counter;?>" data-title="<?php the_sub_field('title'); ?>" >
											<?php the_sub_field('description'); ?>
										</div>
									<?php endif; ?>
									<?php $counter++; ?>
								<?php endwhile; ?>
							</div>
						</div>
						<?php endif; ?>	

					</div>
				<?php endwhile; ?>
				<?php endif; ?>	
			</section>

			<?php if( have_rows('gallery') ): ?>
			<?php while( have_rows('gallery') ): the_row(); ?>
				<section class="gallery container-fluid">
					<div class="row">
						<div class="col-md-12 tac">
							<h2 class="alt"><?php the_title(); ?> Gallery</h2>
							<div class="gallery-images flex lb-items-parent">
								<?php if( have_rows('images') ): ?>
								<?php $counter = 1; ?>
								<?php while( have_rows('images') ): the_row(); ?>
									<?php $image = get_sub_field('image'); ?>
									<div class="gallery-image-outer">
										<div class="gallery-background">
											<div class="gallery-image-inner bg cover center img-op lb-item lb-img" data-index="<?=$counter;?>" lb-url="<?=$image['sizes']['large'];?>" img-full="<?=$image['sizes']['large'];?>" img-large="<?=$image['sizes']['large'];?>"></div>
										</div>
									</div>
								<?php $counter++; ?>
								<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile; ?>
			<?php endif; ?>
			
			<section class="other-skiffs-nav container-fluid">
				<div class="row skiff-types">
					<div class="col-md-12 tac">
						<?php $post_anc = get_post_ancestors($post); ?>
						<?php wp_list_pages('title_li=&depth=1&child_of='.$post_anc[1]); ?>
					</div>
				</div>
				<div class="row skiffs">
					<div class="col-md-12 tac">
						<?php wp_list_pages('title_li=&child_of='.$post->post_parent); ?>
					</div>
				</div>
			</section>

		</div>
	<?php endwhile; ?>
	<?php endif; ?>	
<?php get_footer(); ?>