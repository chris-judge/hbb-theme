<li>

	<?php if(get_post_type() == 'post'): ?>

		<div class="content-wrap">
			<a href="<?php the_permalink(); ?>">
				<?php 
					$image_id = get_post_thumbnail_id();
				?>
				<div class="bg cover center" style="background-image:url(<?=wp_get_attachment_url($image_id);?>);"></div>
			</a>
			<div class="inner-wrap">
				<?php if(get_field('start_date') || get_field('end_date')): ?>
					<?php if(get_field('start_date') && get_field('end_date')): ?>
						<?php if(get_field('start_date') == get_field('end_date')): ?>
							<p class="date"><?=date('F j',strtotime(get_field('start_date')));?> at <?=get_field('time');?></p>
						<?php else: ?>
							<p class="date"><?=date('F j',strtotime(get_field('start_date')));?> - <?=date('j',strtotime(get_field('end_date')));?> at <?=get_field('time');?></p>
						<?php endif; ?>
					<?php elseif(get_field('start_date')): ?>
						<p class="date"><?=date('F j',strtotime(get_field('start_date')));?> at <?=get_field('time');?></p>
					<?php elseif(get_field('end_date')): ?>
						<p class="date"><?=date('F j',strtotime(get_field('end_date')));?> at <?=get_field('time');?></p>
					<?php endif; ?>
				<?php else: ?>
					<p class="date"><?php the_time('F j, Y'); ?> | <?php the_time('g:i a'); ?></p>
				<?php endif; ?>

				<a href="<?php the_permalink(); ?>"><h2 class="lg"><?php the_title(); ?></h2></a>

				<?php if(get_field('location_city_state')): ?>
					<p class="loc-auth"><?php the_field('location_city_state'); ?></p>
				<?php else: ?>
					<p class="loc-auth">Posted by <?php the_author(); ?></p>
				<?php endif; ?>

				<?php if(in_category('events')): ?>
					<a href="<?php the_permalink(); ?>" class="btn">See Event</a>
				<?php else: ?>
					<a href="<?php the_permalink(); ?>" class="btn">Read Article</a>
				<?php endif; ?>
			</div>
		</div>

	<?php else: ?>

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
					<?php $phone = str_replace('-','.',get_field('phone')); ?>
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

	<?php endif; ?>

</li>