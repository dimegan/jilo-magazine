<h4 class="widget-title">
	<a href="<?php the_permalink(); ?>" class="category-title">
		<?php echo single_cat_title("", false); ?>
	</a>
</h4>
<ul class="cp-widget clearfix">  
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<?php $post_actual = $wp_query->current_post; ?>
	<?php if ( $post_actual == 0 ) { ?>
     	<!-- MAIN POST TO THE CATEGORY -->
     	<?php get_template_part('dmgcontent-prim-category'); ?>
	<?php } ?>
	<?php if ( $post_actual == 1 || $post_actual == 2 ) { ?>
		<!-- SECONDARY POST OF THE CATEGORY -->
		<?php get_template_part('dmgcontent-sec-category'); ?>
	<?php } ?>
<?php endwhile; endif;?>
</ul>