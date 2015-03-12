<?php get_header(); ?>
<div class="mh-section mh-group">
	<div id="main-content" class="mh-loop">
		<?php mh_newsdesk_lite_before_page_content(); ?>		
		<?php if(is_home()){ ?>
			<?php get_template_part('dmgcontent', 'home'); ?>
			<?php get_template_part('dmgcontent', 'main'); ?>
		<?php } else {?>
			<?php get_template_part('dmgcontent', 'listarchives'); ?>
		<?php } ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>