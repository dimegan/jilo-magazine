<?php get_header(); ?>
<div class="mh-section mh-group">
	<div id="main-content" class="mh-loop">
		<?php mh_newsdesk_lite_before_page_content(); ?>
		<?php mh_newsdesk_lite_page_title(); ?>		
		<?php get_template_part('dmgcontent', 'home'); ?>
		<?php get_template_part('dmgcontent', 'main'); ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>