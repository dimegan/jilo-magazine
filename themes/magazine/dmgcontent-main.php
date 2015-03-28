<div>
	<div class="clearfix">
		<div class="category-style">
			<?php query_posts('category_name=Jilotepec&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
		</div>
		<div class="category-style">
			<?php query_posts('category_name=Aculco&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
		</div>
	</div>
	<!-- Sponsor 1-->
	<div id="sponsor-one">
		<?php dynamic_sidebar('home-1'); ?>
	</div>
	<div class="clearfix">
		<div class="category-style">
			<?php query_posts('category_name=Soyaniquilpan&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
		</div>
		<div class="category-style">
			<?php query_posts('category_name=Chapa de mota&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
		</div>
	</div>
	<!-- Sponsor 1-->
	<div id="sponsor-two">
		<?php dynamic_sidebar('home-2'); ?>
	</div>
</div>