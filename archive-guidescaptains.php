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
							<option value="all_areas">Select Area</option>
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
					<?php $meta_query = $_SERVER['QUERY_STRING']; ?>
					<?php $meta_key = 'meta_value="'.$meta_query.'"'; ?>
					<?php if($meta_query): ?>
						<?php $meta_count = -1; ?>
						<?php echo do_shortcode('[ajax_load_more container_type="div" post_type="guidescaptains" orderby="rand" posts_per_page="'.$meta_count.'" scroll_distance="225" images_loaded="true" meta_compare="IN" meta_key="area" '.$meta_key.']'); ?>
					<?php else: ?>
						<div class="ce-wrap">
							<?php the_field('guides/captains_description','options'); ?>
							<br/>
							<?php $image = get_field('guides/captains_image','options'); ?>
							<?php echo wp_get_attachment_image($image['id'], 'full'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	</div>
<?php get_footer(); ?>