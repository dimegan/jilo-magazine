<?php get_header(); ?>
<div class="mh-section mh-group">
	<div id="main-content" class="mh-content">
		<?php mh_newsdesk_lite_before_post_content(); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('content', 'single'); ?>
			<!-- SHARE BUTTON -->
			<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
			<!-- END SHARE BUTTON -->
			<?php mh_newsdesk_lite_postnav(); ?>
			<?php get_template_part('template', 'authorbox'); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- COMMENT DIRECTION -->
		<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" data-colorscheme="light">
		</div>
		<!-- END COMMENT DIRECTION -->
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>