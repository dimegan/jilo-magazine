<?php get_header(); ?>
<div class="mh-section mh-group">
	<div id="main-content" class="mh-content">
		<?php mh_newsdesk_lite_before_post_content(); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('content', 'single'); ?>
			<?php mh_newsdesk_lite_postnav(); ?>
			<?php get_template_part('template', 'authorbox'); ?>
			<?php endwhile; ?>
			<?php comments_template(); ?>
		<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>