<?php 
	$cat1 = get_option( "aviso-cat", "default" );
	//Check if is an Aviso oportuno
	$isAvisoOportuno = has_category( $cat1 );
?>
<?php if(!$isAvisoOportuno): ?>
	<?php get_template_part('content', 'singlePost'); ?>
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