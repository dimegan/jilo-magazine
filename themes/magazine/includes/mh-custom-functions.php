<?php


/***** Logo/Sitename *****/

if (!function_exists('mh_newsdesk_lite_logo')) {
	function mh_newsdesk_lite_logo() {
		$header_img = get_header_image();
		$header_title = get_bloginfo('name');
		$header_desc = get_bloginfo('description');
		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr($header_title) . '" rel="home">' . "\n";
		echo '<div class="logo-wrap" role="banner">' . "\n";
		if ($header_img) {
			echo '<img src="' . esc_url($header_img) . '" height="' . get_custom_header()->height . '" width="' . get_custom_header()->width . '" alt="' . esc_attr($header_title) . '" />' . "\n";
		}
		if (display_header_text()) {
			$text_color = get_header_textcolor();
			if ($text_color != get_theme_support('custom-header', 'default-text-color')) {
				echo '<style type="text/css" id="mh-header-css">';
					echo '.logo-title, .logo-tagline { color: #' . esc_attr($text_color) . '; }';
				echo '</style>' . "\n";
			}
			echo '<div class="logo">' . "\n";
			if ($header_title) {
				echo '<h1 class="logo-title">' . esc_attr($header_title) . '</h1>' . "\n";
			}
			if ($header_desc) {
				echo '<h2 class="logo-tagline">' . esc_attr($header_desc) . '</h2>' . "\n";
			}
			echo '</div>' . "\n";
		}
		echo '</div>' . "\n";
		echo '</a>' . "\n";
	}
}

/***** wp_title Output *****/

if (!function_exists('mh_newsdesk_lite_wp_title')) {
	function mh_newsdesk_lite_wp_title($title, $sep) {
		global $paged, $page, $post;
		if (is_feed())
			return $title;
		$title .= get_bloginfo('name');
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page()))
			$title = "$title $sep $site_description";
		if ($paged >= 2 || $page >= 2)
			$title = "$title $sep " . sprintf(__('Page %s', 'mh-newsdesk-lite'), max($paged, $page));
		return $title;
	}
}
add_filter('wp_title', 'mh_newsdesk_lite_wp_title', 10, 2);

/***** Page Title Output *****/

if (!function_exists('mh_newsdesk_lite_page_title')) {
	function mh_newsdesk_lite_page_title() {
		if (!is_front_page()) {
			echo '<h1 class="page-title">';
			if (is_archive()) {
				if (is_category() || is_tax()) {
					single_cat_title();
				} elseif (is_tag()) {
					single_tag_title();
				} elseif (is_author()) {
					global $author;
					$user_info = get_userdata($author);
					printf(_x('Articles by %s', 'post author', 'mh-newsdesk-lite'), esc_attr($user_info->display_name));
				} elseif (is_day()) {
					echo get_the_date();
				} elseif (is_month()) {
					echo get_the_date('F Y');
				} elseif (is_year()) {
					echo get_the_date('Y');
				} elseif (is_post_type_archive()) {
					global $post;
					$post_type = get_post_type_object(get_post_type($post));
					echo $post_type->labels->name;
				} else {
					_e('Archives', 'mh-newsdesk-lite');
				}
			} else {
				if (is_home()) {
					echo get_the_title(get_option('page_for_posts', true));
				} elseif (is_404()) {
					_e('Page not found (404)', 'mh-newsdesk-lite');
				} elseif (is_search()) {
					printf(__('Search Results for %s', 'mh-newsdesk-lite'), esc_attr(get_search_query()));
				} else {
					the_title();
				}
			}
			echo '</h1>' . "\n";
		}
	}
}

/***** Output Post Meta Data *****/

if (!function_exists('mh_newsdesk_lite_post_meta')) {
	function mh_newsdesk_lite_post_meta() {
		echo '<p class="entry-meta">' . "\n";
			if (has_category() && !is_single()) {
				echo sprintf(_x('%s', 'post category', 'mh-newsdesk-lite'), '<span class="entry-meta-cats">' . get_the_category_list(', ', '') . '</span>') . "\n";
			}
			if (is_single()) {
				echo '<span class="entry-meta-author vcard author">' . sprintf(_x('Publicado por: %s', 'post author', 'mh-newsdesk-lite'), '<a class="fn" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>') . '</span>' . "\n";
			}
			echo '<span class="entry-meta-date updated">' . get_the_date() . '</span>' . "\n";
		echo '</p>' . "\n";
	}
}

/***** Featured Image on Posts *****/

if (!function_exists('mh_newsdesk_lite_featured_image')) {
	function mh_newsdesk_lite_featured_image() {
		global $page, $post;
		if (has_post_thumbnail() && $page == '1') {
			$caption_text = get_post(get_post_thumbnail_id())->post_excerpt;
			echo "\n" . '<div class="entry-thumbnail">' . "\n";
				the_post_thumbnail('content-single');
				if ($caption_text) {
					echo '<span class="wp-caption-text">' . esc_attr($caption_text) . '</span>' . "\n";
				}
			echo '</div>' . "\n";
		}
	}
}

/***** Custom Excerpts *****/

if (!function_exists('mh_newsdesk_lite_trim_excerpt')) {
	function mh_newsdesk_lite_trim_excerpt($text = '') {
		$raw_excerpt = $text;
		if ('' == $text) {
			$mh_newsdesk_lite_lite_options = mh_newsdesk_lite_theme_options();
			$text = get_the_content('');
			$text = strip_shortcodes($text);
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]&gt;', $text);
			$excerpt_length = apply_filters('excerpt_length', $mh_newsdesk_lite_lite_options['excerpt_length']);
			$excerpt_more = apply_filters('excerpt_more', '...');
			$text = wp_trim_words($text, $excerpt_length, $excerpt_more);
		}
		return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
	}
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'mh_newsdesk_lite_trim_excerpt');

/***** Pagination *****/

if (!function_exists('mh_newsdesk_lite_pagination')) {
	function mh_newsdesk_lite_pagination() {
		global $wp_query;
	    $big = 9999;
	    $paginate_links = paginate_links(array(
	    	'base' 		=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
	    	'format' 	=> '?paged=%#%',
	    	'current' 	=> max(1, get_query_var('paged')),
	    	'prev_next' => true,
	    	'prev_text' => __('&laquo;', 'mh-newsdesk-lite'),
	    	'next_text' => __('&raquo;', 'mh-newsdesk-lite'),
	    	'total' 	=> $wp_query->max_num_pages
	    ));
	    if ($paginate_links) {
	    	echo '<div class="pagination clearfix">';
				echo $paginate_links;
			echo '</div>';
		}
	}
}

/***** Pagination for paginated Posts *****/

if (!function_exists('mh_newsdesk_lite_posts_pagination')) {
	function mh_newsdesk_lite_posts_pagination($content) {
		if (is_singular() && is_main_query()) {
			$content .= wp_link_pages(array('before' => '<div class="pagination clear">', 'after' => '</div>', 'link_before' => '<span class="pagelink">', 'link_after' => '</span>', 'nextpagelink' => __('&raquo;', 'mh-newsdesk-lite'), 'previouspagelink' => __('&laquo;', 'mh-newsdesk-lite'), 'pagelink' => '%', 'echo' => 0));
		}
		return $content;
	}
}
add_filter('the_content', 'mh_newsdesk_lite_posts_pagination', 1);

/***** Post / Image Navigation *****/

if (!function_exists('mh_newsdesk_lite_postnav')) {
	function mh_newsdesk_lite_postnav() {
		global $post;
		$parent_post = get_post($post->post_parent);
		$attachment = is_attachment();
		$previous = ($attachment) ? $parent_post : get_adjacent_post(false, '', true);
		$next = get_adjacent_post(false, '', false);

		if (!$next && !$previous)
		return;

		if ($attachment) {
			$attachments = get_children(array('post_type' => 'attachment', 'post_mime_type' => 'image', 'post_parent' => $parent_post->ID));
			$count = count($attachments);
		}
		echo '<nav class="post-nav-wrap" role="navigation">' . "\n";
			echo '<ul class="post-nav clearfix">' . "\n";
				echo '<li class="post-nav-prev">' . "\n";
					if ($attachment) {
						if ($count == 1) {
							$permalink = get_permalink($parent_post);
							echo '<a href="' . $permalink . '"><i class="fa fa-chevron-left"></i>' . __('Back to post', 'mh-newsdesk-lite') . '</a>';
						} else {
							previous_image_link('%link', '<i class="fa fa-chevron-left"></i>' . __('Previous image', 'mh-newsdesk-lite'));
						}
					} else {
						previous_post_link('%link', '<i class="fa fa-chevron-left"></i>' . __('Anterior entrada', 'mh-newsdesk-lite'));
					}
				echo '</li>' . "\n";
				echo '<li class="post-nav-next">' . "\n";
					if ($attachment) {
						next_image_link('%link', __('Next image', 'mh-newsdesk-lite') . '<i class="fa fa-chevron-right"></i>');
					} else {
						next_post_link('%link', __('Siguiente entrada', 'mh-newsdesk-lite') . '<i class="fa fa-chevron-right"></i>');
					}
				echo '</li>' . "\n";
			echo '</ul>' . "\n";
		echo '</nav>' . "\n";
	}
}

/***** Custom Commentlist *****/

if (!function_exists('mh_newsdesk_lite_comments')) {
	function mh_newsdesk_lite_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="vcard meta">
					<?php echo get_avatar($comment->comment_author_email, 70); ?>
					<?php echo get_comment_author_link() ?> |
					<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)) ?>"><?php printf(__('%1$s at %2$s', 'mh-newsdesk-lite'), get_comment_date(),  get_comment_time()) ?></a> |
					<?php if (comments_open() && $args['max_depth']!=$depth) { ?>
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					<?php } ?>
					<?php edit_comment_link(__('(Edit)', 'mh-newsdesk-lite'),'  ','') ?>
				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="comment-info"><?php _e('Your comment is awaiting moderation.', 'mh-newsdesk-lite') ?></div>
				<?php endif; ?>
				<div class="comment-text">
					<?php comment_text() ?>
				</div>
			</div><?php
	}
}

/***** Custom Comment Fields *****/

if (!function_exists('mh_newsdesk_lite_comment_fields')) {
	function mh_newsdesk_lite_comment_fields($fields) {
		$commenter = wp_get_current_commenter();
		$req = get_option('require_name_email');
		$aria_req = ($req ? " aria-required='true'" : '');
		$fields =  array(
			'author'	=>	'<p class="comment-form-author"><label for="author">' . __('Name ', 'mh-newsdesk-lite') . '</label>' . ($req ? '<span class="required">*</span>' : '') . '<br/><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
			'email' 	=>	'<p class="comment-form-email"><label for="email">' . __('Email ', 'mh-newsdesk-lite') . '</label>' . ($req ? '<span class="required">*</span>' : '' ) . '<br/><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
			'url' 		=>	'<p class="comment-form-url"><label for="url">' . __('Website', 'mh-newsdesk-lite') . '</label><br/><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>'
		);
		return $fields;
	}
}
add_filter('comment_form_default_fields', 'mh_newsdesk_lite_comment_fields');

/***** Read More Button *****/

function mh_newsdesk_lite_more() {
	$mh_newsdesk_lite_lite_options = mh_newsdesk_lite_theme_options(); ?>
	<a class="button" href="<?php the_permalink(); ?>">
		<span><?php echo esc_attr($mh_newsdesk_lite_lite_options['excerpt_more']); ?></span>
	</a><?php
}

/***** Load Social Scripts *****/

if (!function_exists('mh_newsdesk_lite_social_scripts')) {
	function mh_newsdesk_lite_social_scripts() {
		if (is_active_widget('', '', 'mh_newsdesk_lite_facebook_likebox')) {
			global $locale;
			echo "<div id='fb-root'></div><script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'https://connect.facebook.net/" . $locale . "/all.js#xfbml=1'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>" . "\n";
		}
	}
}
add_action('wp_footer', 'mh_newsdesk_lite_social_scripts');

/***** Add CSS classes to body tag *****/

if (!function_exists('mh_newsdesk_lite_body_class')) {
	function mh_newsdesk_lite_body_class($classes) {
		$mh_newsdesk_lite_lite_options = mh_newsdesk_lite_theme_options();
		$classes[] = 'mh-' . $mh_newsdesk_lite_lite_options['sidebar'] . '-sb';
		return $classes;
	}
}
add_filter('body_class', 'mh_newsdesk_lite_body_class');

/***** Add CSS3 Media Queries Support for older versions of IE *****/
function my_excerpt($text, $excerpt){
	
	$text = strip_shortcodes( $text );
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]&gt;', $text);
	$text = strip_tags($text);
	$excerpt_length = apply_filters('excerpt_length', 30);
	$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
	$words = preg_split("/[n
	]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);

	if ( count($words) > $excerpt_length ) {
		 array_pop($words);
		 $text = implode(' ', $words);
		 $text = $text . $excerpt_more;
	} else {
	 	$text = implode(' ', $words);
	}
	return $text;
}

function mh_newsdesk_lite_ie_media_queries() {
	echo '<!--[if lt IE 9]>' . "\n";
	echo '<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>' . "\n";
	echo '<![endif]-->' . "\n";
	jilo_magazine_facebook_metas();
}
function jilo_magazine_facebook_metas(){
	if (is_single()) {
		//$resumen = get_the_ID();		
		echo '<meta property="og:title" content="'. get_the_title() .'"/>';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:site_name" content="'. get_bloginfo( 'name' ) .'"/>';
		echo '<meta property="og:url" content="' . get_the_permalink() .'"/>';
		
		$fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumbnail');
		if ($fb_image){
			echo '<meta property="og:image" content="'. $fb_image[0] .'"/>';
		}
		///Post description
		global $post;
		$description = my_excerpt( $post->post_content, $post->post_excerpt );
		$description = strip_tags($description);
		$description = str_replace('"', "'", $description);
		echo '<meta property="og:description" content="'. $description .'" />';
	}else{
		$site_title = get_bloginfo( 'name' );
		echo '<meta property="og:title" content="'. $site_title .'"/>';
		echo '<meta property="og:type" content="website"/>';
		echo '<meta property="og:url" content="' . network_site_url( '/' ) .'"/>';
		echo '<meta property="og:description" content="'. get_bloginfo( 'description' ) .'" />';
		echo '<meta property="og:site_name" content="'. $site_title .'"/>';
	}
}
add_action('wp_head', 'mh_newsdesk_lite_ie_media_queries');

//Facebook and Open Graph nameservers
function add_opengraph_nameser( $output ) {
 return $output . '
	xmlns:og="http://opengraphprotocol.org/schema/"
	xmlns:fb="http://www.facebook.com/2008/fbml"';
 }
add_filter('language_attributes', 'add_opengraph_nameser');
?>
