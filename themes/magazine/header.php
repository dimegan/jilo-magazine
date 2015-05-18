<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="fb:app_id" content="543561519120483"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!-- PLUGIN COMMENTS -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
  	var js, fjs = d.getElementsByTagName(s)[0];
  	if (d.getElementById(id)) return;
  	js = d.createElement(s); js.id = id;
  	js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=543561519120483&version=v2.0";
  	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- END PLUGIN COMMENTS -->
<div id="mh-wrapper">
<header class="mh-header">
	<div class="header-wrap clearfix contentDiv">
		<!-- WIDGET ICONS SOCIAL -->
		<div class="boxInline">
			<?php if ( ! dynamic_sidebar( 'header-widget-zone' ) ) {} ?>
		</div>
		<div>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src='<?php echo get_template_directory_uri(); ?>/images/quehayred470X100.png' alt='Imagen 1' />
			</a>	
		</div>
		
	</div>

	<div class="header-menu clearfix">
		<nav class="main-nav clearfix">
			<?php wp_nav_menu(array('theme_location' => 'main_nav')); ?>
		</nav>
	</div>

</header>