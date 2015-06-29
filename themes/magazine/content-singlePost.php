<?php 
	$galeryCat = get_option( "galeria-img", "default" );
	//Mostrar la imagen representativa cuando el post NO es de Aviso Oportuno
	$isGaleryPost = has_category( $galeryCat );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<header class="entry-header clearfix">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php the_tags('<div class="entry-tags clearfix"><span>' . __('TOPICS:', 'mh-newsdesk-lite') . '</span>','','</div>'); ?>
	</header>
	<?php if(!$isGaleryPost): ?>
		<?php mh_newsdesk_lite_featured_image(); ?>
	<?php endif ?>
	<?php mh_newsdesk_lite_post_meta(); ?>
	<div class="entry-content clearfix">
		<?php the_content(); ?>
	</div>
</article>