 <li class="category-post-interline cp-wrap cp-large clearfix">
 	<!-- post Image-->
    <div class="cp-thumb-xl">
     	<a  href="<?php the_permalink(); ?>" class="category-img">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
        </a> 
    </div>
     <!-- post Tittle-->
     <h2>
     	<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" >
            <?php the_title();  ?>
        </a>
     </h2>
     <!-- post Date-->
     <p class="category-date"><?php the_time('l F d, Y');?></p>
     <!-- post Resume-->
     <div class="mh-excerpt"><?php the_excerpt(); ?></div>
 </li> 
 