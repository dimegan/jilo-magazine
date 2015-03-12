<?php if (have_posts()) : ?>
	<?php $counter = 1; ?>
	<?php $max_posts = $wp_query->post_count; ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php if ($counter == 1) : ?>
			<?php get_template_part('content', 'lead'); ?>
			<hr class="mh-separator">
		<?php else : ?>
			<?php get_template_part('content'); ?>
		<?php endif; ?>
		<?php $counter++; ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part('content', 'none'); ?>
<?php endif; ?>
<?php mh_newsdesk_lite_pagination(); ?>