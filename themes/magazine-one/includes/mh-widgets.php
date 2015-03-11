<?php

/***** Register Widgets *****/

function mh_newsdesk_lite_register_widgets() {
	register_widget('mh_newsdesk_lite_custom_posts');
	register_widget('mh_newsdesk_lite_posts_large');
	register_widget('mh_newsdesk_lite_recent_posts');
	register_widget('mh_newsdesk_lite_facebook_likebox');
}
add_action('widgets_init', 'mh_newsdesk_lite_register_widgets');

/***** Include Widgets *****/

require_once('widgets/mh-custom-posts.php');
require_once('widgets/mh-posts-large.php');
require_once('widgets/mh-recent-posts.php');
require_once('widgets/mh-facebook-likebox.php');

?>