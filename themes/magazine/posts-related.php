<?php 
	$catSlider = get_option( "home_slider-cat", "default" );
	//Mostrar la imagen representativa cuando el post NO es de Aviso Oportuno
	$categories = get_the_category();
	if($categories){
		foreach($categories as $category) {
			if($category->cat_name !== $catSlider ){
				$firstCategory = $category->cat_name; 		
				break;
			}
		}		
		if(isset($firstCategory)){
			$cat = get_cat_ID($firstCategory) ; // El id de la categoría, el (FALSE) es para que no escriba el número
			$post = get_the_ID(); // El id del current post
		}
	}
?>
<?php if(isset($cat) && isset($firstCategory)): ?>
<!-- POST RELACIONADOS POR CATEGORIA -->
<div class="post-relation-by-category">
	<h3>¿Que más hay en 
		<?php echo $firstCategory ?>?
	</h3>	
	<div class="related-posts clearfix">
		<?php if ( is_single() ): // Si es un single post
			 $args = array( // La variable
				'cat'=>$cat, // El id de la categoría que buscamos arriba
				'showposts' => 3, // El número de posts que se van a listar
				'post__not_in' => array($post) // Llama al id del post actual para que no sea listado
				);
			?>
			
			<ul>
			 <?php $recent = new WP_Query($args); while($recent->have_posts()) : $recent->the_post();?>
				 <li class="related-item">
				 	<a href="<?php the_permalink() ?>">
					 	<div class="image-outerwrapper">
						 	<div class="image-wrapper">
						 	<?php the_post_thumbnail( 'medium' ); ?>
						 	</div>
					 	</div>
				 	</a>
				 	<div class="related-info">
					 	<span>
					 		<a class="tittle-post-relation" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
					 	</span>
					 	<br/>
					 	<span class="meta-data"><?php the_time('j F, Y'); ?> </span>
				 	</div>
				 </li>
				 
			 <?php endwhile; ?>
			 <?php wp_reset_postdata(); ?>
			</ul>
		<!-- end If (is_single()) -->
		<?php endif ?>
	</div>
<!-- end post-relation-by-category -->
</div>
<?php endif; ?>