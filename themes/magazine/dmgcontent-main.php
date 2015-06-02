<?php 
	$cat1 = get_option( "home_cat1", "default" );
	$cat2 = get_option( "home_cat2", "default" );
	$cat3 = get_option( "home_cat3", "default" );
	$cat4 = get_option( "home_cat4", "default" );
?>
<div>
	<div class="clearfix">
		<div class="category-style">
			<?php query_posts('category_name='.$cat1.'&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
			<?php wp_reset_query(); ?>
		</div>
		<div class="category-style">
			<?php query_posts('category_name='.$cat2.'&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
			 <?php wp_reset_query(); ?>
		</div>
	</div>
	<!-- Sponsor 1-->
	<div id="sponsor-one">
		<?php dynamic_sidebar('home-middle'); ?>
	</div>
	<div class="clearfix">
		<div class="category-style">
			<?php query_posts('category_name='.$cat3.'&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
			 <?php wp_reset_query(); ?>
		</div>
		<div class="category-style">
			<?php query_posts('category_name='.$cat4.'&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
			 <?php wp_reset_query(); ?>
		</div>
	</div>
	<!-- Sponsor 1-->
	<div id="sponsor-two">
		<?php dynamic_sidebar('home-footer'); ?>
	</div>
</div>