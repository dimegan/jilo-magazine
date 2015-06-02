<aside class="mh-sidebar">
	<?php dynamic_sidebar('sidebar'); ?>
	<?php if (is_single()) { ?>
		<?php dynamic_sidebar('single-sidebar'); ?>
	<?php } else{ ?>
		<?php dynamic_sidebar('home-sidebar'); ?>
	<?php } ?>
</aside>
