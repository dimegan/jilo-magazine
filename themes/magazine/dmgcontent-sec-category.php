<?php $numComments = get_comments_number(); ?>

 <li class="cp-wrap cp-small clearfix">
 	
 	<!-- post Image-->
    <div class="cp-thumb">
 	  <a class="category-secondary-image" href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( array(120, 67) ); } ?></a> 
    </div>
     <!-- post Tittle-->
     <div class="cp-data">
         <p class="cp-widget-title">
         	<a class="" href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" ><?php the_title(); ?></a>
         </p>
         <p class="category-date"><?php the_time('F d, Y');?></p>
    </div>
 </li> 
 