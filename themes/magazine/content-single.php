<?php 
	$cat1 = get_option( "aviso-cat", "default" );
	//Mostrar la imagen representativa cuando el post NO es de Aviso Oportuno
	$isAvisoOportuno = has_category( $cat1 );
?>
<?php if(!$isAvisoOportuno): ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
		<header class="entry-header clearfix">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php the_tags('<div class="entry-tags clearfix"><span>' . __('TOPICS:', 'mh-newsdesk-lite') . '</span>','','</div>'); ?>
		</header>
		
		<?php mh_newsdesk_lite_featured_image(); ?>
		
		<?php mh_newsdesk_lite_post_meta(); ?>
		<div class="entry-content clearfix">
			<?php the_content(); ?>
		</div>
	</article>
<?php else: ?>
	<?php get_template_part('content', 'singleAviso'); ?>
<?php endif ?>
<div>
		<!-- SHARE BUTTON -->
		<div class="fb-like facebook-widget" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
		</div>
		<br/>
		<!-- COMMENT DIRECTION -->
		<div class="fb-comments facebook-widget" data-href="<?php the_permalink(); ?>" data-numposts="5" data-colorscheme="light">
		</div>
		<!-- END COMMENT DIRECTION -->
	</div>
	<?php get_template_part('posts', 'related'); ?>