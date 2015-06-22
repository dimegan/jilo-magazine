<article id="post-<?php the_ID(); ?>" class="aviso-content">	
	<header class="entry-header clearfix">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php the_tags('<div class="entry-tags clearfix"><span>' . __('TOPICS:', 'mh-newsdesk-lite') . '</span>','','</div>'); ?>
	</header>
	<?php mh_newsdesk_lite_post_meta(); ?>
	<div class="entry-content clearfix">
		<?php the_content(); ?>
	</div>
</article>
<?php get_template_part('posts', 'related'); ?>