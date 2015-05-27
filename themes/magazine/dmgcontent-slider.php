<!-- Use for add slides -->
<div>
	<a u="image" href="<?php the_permalink(); ?>">
    	<img alt="No Picture" <?php if (has_post_thumbnail()) { the_post_thumbnail('content-single'); } else { echo '<img src="' . get_template_directory_uri() . '/images/placeholder-content-single.jpg' . '" alt="No Picture" />'; } ?>
    </a>
    <div u="thumb">
    	<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
    	<p><?php the_excerpt_max_charlength(150); ?></p>
    </div>
</div>