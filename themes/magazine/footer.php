</div>
<footer class="mh-footer">
	<div>
		<?php wp_nav_menu( array( 'menu' => 'General', 
				'theme_location' => 'secondary',
				'menu_id'      => 'footer-menu',
				'before' => '<div class="footer-tab">',
				'after' => '</div>' ) ); ?>
		<div style="clear:both;"></div>
	</div>
</footer>
<p class="copyright text-center">Copyright 2015 Periodico Que hay. Derechos Reservados</p>
<?php wp_footer(); ?>
<!-- google analytics code -->
<?php get_template_part('analyticstracking'); ?>
</body>
</html>