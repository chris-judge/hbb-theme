
<?php if(in_category('events')): ?>
	<?php get_template_part( 'events' ); ?>
<?php else: ?>
	<?php get_template_part( 'news' ); ?>
<?php endif; ?>