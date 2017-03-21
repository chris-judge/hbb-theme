		</div>
		<footer class="container-fluid">
			<div class="row">
				<div class="content-wrap">
					<div class="col-md-4">
						<div class="contact-info">
							<h3 class="alt">Hell's Bay Boatworks</h3>
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
					<div class="col-md-4 tac">
						<a class="logo-footer" href="<?php echo get_home_url(); ?>">
							<?php the_field('logo_svg','options'); ?>
						</a>
					</div>
					<div class="col-md-4">
						<?php if(get_field('instagram', 'options') || get_field('facebook', 'options') || get_field('vimeo', 'options') || get_field('youtube', 'options') || get_field('twitter', 'options')): ?>
							<div class="social-wrap">
								<h4>Follow Us</h4>
								<hr class="black xsm">
								<p>
									<?php if(get_field('instagram', 'options')): ?>
										<a target="_blank" href="<?php the_field('instagram', 'options') ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
									<?php endif; ?>

									<?php if(get_field('facebook', 'options')): ?>
										<a target="_blank" href="<?php the_field('facebook', 'options') ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									<?php endif; ?>

									<?php if(get_field('vimeo', 'options')): ?>
										<a target="_blank" href="<?php the_field('vimeo', 'options') ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
									<?php endif; ?>

									<?php if(get_field('youtube', 'options')): ?>
										<a target="_blank" href="<?php the_field('youtube', 'options') ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
									<?php endif; ?>

									<?php if(get_field('twitter', 'options')): ?>
										<a target="_blank" href="<?php the_field('twitter', 'options') ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									<?php endif; ?>
								</p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="content-wrap">
					<div class="col-md-6">
						<p><?php the_field('copyright', 'options'); ?> <span class="divider">|</span> <a href="">Privacy Policy</a> <span class="divider">|</span> <a href="">Sitemap</a></p>
					</div>
					<div class="col-md-6 tar big">
						<p><a target="_blank" href="https://bigeyeagency.com/">Designed by <?php include('_/img/BIGEYE.svg'); ?></a></p>
					</div>
				</div>
			</div>
			<div class="hidden-logo dn">
				<?php include('_/img/logo.svg'); ?>
			</div>
		</footer>

		<div class="lb">
			<div class="overlay">
				<div class="content-wrap txt-white">
					<div class="top tar">
						<div class="close-btn">&times;</div>
					</div>
					<div class="content">
						
					</div>
					<div class="copy">
						<h2 class="alt title"></h2>
						<div class="pages tar">
							<span class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
							<span class="current"></span>
							<span class="divider">/</span>
							<span class="total"></span>
							<span class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php wp_footer(); ?>

		<?php //Font Awesome ?>
		<script src="https://use.fontawesome.com/6a134caf30.js"></script>

	</body>
</html>