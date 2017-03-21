<?php get_header(); ?>
	<div class="page-news-events page-guides-captains">
		<section class="intro container-fluid">
			<div class="row">
				<div class="col-md-12 tac">
					<h1 class="alt">Guides &amp; Captains</h1>
					<hr>
				</div>
			</div>
		</section>
		<section class="main container-fluid">
			<div class="row select-search">
				<div class="col-md-6">
					<div class="select-wrap">
						<select name="gc-sort" id="gc-sort" data-url="<?php echo get_home_url(); ?>/guides-captains" data-selected="<?=$_SERVER['QUERY_STRING'];?>">
							<option value="search">Search</option>
							<option value="all_areas">All Areas</option>
							<option value="alabama_mississippi_louisiana_texas">Alabama Mississippi Louisiana Texas</option>
							<option value="biscayne_bay">Biscayne Bay</option>
							<option value="costal_southeast">Costal Southeast</option>
							<option value="east_central_florida">East Central Florida</option>
							<option value="florida_everglades">Florida Everglades</option>
							<option value="florida_keys">Florida Keys</option>
							<option value="florida_panhandle">Florida Panhandle</option>
							<option value="north_east_florida">North East Florida</option>
							<option value="northeastern_us">Northeastern US</option>
							<option value="southeast_florida">Southeast Florida</option>
							<option value="southwest_florida">Southwest Florida</option>
							<option value="west_central_florida">West Central Florida</option>
						</select>
						<?php include('_/img/arrow-lg.svg'); ?>
					</div>
				</div>
				<div class="col-md-6">
					<form action="<?php bloginfo('siteurl'); ?>/guides-captains" id="searchform" method="get">
					    <div>
					        <input type="search" id="s" name="s" value="" placeholder="Search Guides & Captains"/>
					        <button type="submit" value="" id="searchsubmit"><i class="fa fa-search"></i></button>
					    </div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php if ( have_posts() ) : ?>
					<div class="alm-listing">
					<div class="alm-reveal">
					<?php while ( have_posts() ) : the_post(); ?>
					<li>
					<div class="content-wrap">
						<?php 
							$image_id = get_post_thumbnail_id();
						?>
						<div class="bg cover center" style="background-image:url(<?=wp_get_attachment_url($image_id);?>);"></div>
						<div class="inner-wrap">
							<h2 class="lg"><?php the_title(); ?></h2>
							<p class="loc-auth"><?php the_field('boat_type'); ?></p>
							<p class="loc"><?php the_field('location') ?></p>
							<?php if(get_field('phone')): ?>
								<?php $phone = str_replace('.','',get_field('phone')); ?>
								<p><a href="tel:<?=$phone;?>"><strong>P:</strong> <?php the_field('phone'); ?></a></p>
							<?php endif; ?>
							<?php if(get_field('email')): ?>
								<p><a href="mailto:<?php the_field('email'); ?>"><strong>E:</strong> <?php the_field('email'); ?></a></p>
							<?php endif; ?>
							<?php if(get_field('website')): ?>
								<p><a target="_blank" href="<?php the_field('website'); ?>"><strong>W:</strong> <?php the_field('website'); ?></a></p>
							<?php endif; ?>
							<div class="social">
								<p>
								<?php if(get_field('instagram')): ?>
									<a target="_blank" href="<?php the_field('instagram'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
								<?php endif; ?>	
								<?php if(get_field('facebook')): ?>
									<a target="_blank" href="<?php the_field('facebook'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<?php endif; ?>	
								<?php if(get_field('twitter')): ?>
									<a target="_blank" href="<?php the_field('twitter'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<?php endif; ?>	
								</p>				
							</div>
						</div>
					</div>
					</li>
					<?php endwhile; ?>
					</div>
					</div>
					<?php endif; ?>	
				</div>
			</div>
		</section>
	</div>
<?php get_footer(); ?>