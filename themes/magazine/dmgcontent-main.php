<div>
	<div class="clearfix">
		<div class="category-style">
			<?php query_posts('category_name=deportes&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
		</div>
		<div class="category-style">
			<?php query_posts('category_name=politica&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
		</div>
	</div>
	<!-- Sponsor 1-->
	<div id="sponsor-one">
		<?php dynamic_sidebar('home-1'); ?>
	</div>
	<div class="clearfix">
		<div class="category-style">
			<?php query_posts('category_name=noticias&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
		</div>
		<div class="category-style">
			<?php query_posts('category_name=politica&showposts=3');?>
			 <?php get_template_part('dmgcontent','categories'); ?>
		</div>
	</div>
	<!-- Sponsor 1-->
	<div id="sponsor-two">
		<?php dynamic_sidebar('home-2'); ?>
	</div>
</div>