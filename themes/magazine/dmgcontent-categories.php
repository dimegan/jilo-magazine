<h4 class="widget-title">
	<?php 
		$currenCatName = single_cat_title("", false);
	    $category_id = get_cat_ID( $currenCatName );
	    $category_link = get_category_link( $category_id );
	?>
	<a href="<?php echo esc_url( $category_link ); ?>" class="category-title">
		<?php echo $currenCatName; ?>
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