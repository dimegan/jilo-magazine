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
		<a href="#">
			<?php echo '<img src="' . get_template_directory_uri() . '/images/sopnsor1.jpg' . '" alt="No Picture" />'; ?>
		</a>
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
</div>