<!-- Show the most recent 4 posts-->
<?php query_posts( 'posts_per_page=3' ); ?>
<?php if (have_posts()) : ?>
	<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 777px; height: 437px;">
        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <!-- your loading screen content here --><h1>Cargando</h1>
        </div>
        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 777px; height: 437px;">
        	<?php while (have_posts()) : the_post(); ?>
				<!--<?php get_template_part('content'); ?>-->
	            <?php get_template_part('dmgcontent','slider'); ?>
		        <?php $counter++; ?>
			<?php endwhile; ?>
        </div>
        <?php get_template_part('dmgcontent','setupslider'); ?>
    </div>
<?php else : ?>
	<?php get_template_part('content', 'none'); ?>
<?php endif; ?>
