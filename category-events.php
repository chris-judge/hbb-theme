<?php get_header(); ?>
	<div class="page-news-events">
		<section class="intro container-fluid">
			<div class="row sm--row">
				<div class="col-md-12">
					<?php wp_nav_menu(array('menu'=>'Blog Menu')); ?>
				</div>
			</div>
		</section>
		<section class="main container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="6" scroll_distance="225" images_loaded="true" category="events"]'); ?>
				</div>
			</div>
		</section>
	</div>
<?php get_footer(); ?>