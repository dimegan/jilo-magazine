</div>
<footer class="mh-footer">
	<div class="content">
  			<div class="footer-space1">
  				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
					<img src='<?php echo get_template_directory_uri(); ?>/images/quehaygray.JPG' alt='Imagen 1' />
				</a >
				<ul  class="list-unstyled">
					<div class="margin-footer">
						<li>
							<string>Orquidea No. 3 Col. Javier Barrios</string>
						</li>
						<li>
							<string>Jilotepec, Estado de México, México</string>
						</li>
					</div>

					<div class="contact-footer">
						<li>
							<img class="size-image-icon" src='<?php echo get_template_directory_uri(); ?>/images/email2.png' alt='Imagen 1' />
							<string>periodicoquehay@gmail.com</string>
						</li>
						<li>
							<img class="size-image-icon" src='<?php echo get_template_directory_uri(); ?>/images/tel2.png' alt='Imagen 1' />
							<string>Tel. (01761) 734 07 97</string>
						</li>
						<li>
							<img class="size-image-icon" src='<?php echo get_template_directory_uri(); ?>/images/tel2.png' alt='Imagen 1' />
							<string>Cel. 5543 67 55 59</string>
						</li>
					</div>

					<div class=" icon-social">
						<a href="https://www.facebook.com/periodicoquehayjilo" >
							<img src='<?php echo get_template_directory_uri(); ?>/images/facebook.png' alt='Imagen 1' />
						</a>
						<a href="https://twitter.com/Quehayen" >
							<img src='<?php echo get_template_directory_uri(); ?>/images/twiter.png' alt='Imagen 1' />
						</a>
						<a href="https://plus.google.com/102245833833633947019/posts" >
							<img src='<?php echo get_template_directory_uri(); ?>/images/google.png' alt='Imagen 1' />
						</a>
						<a href="https://www.youtube.com/user/periodicoquehay" >
							<img src='<?php echo get_template_directory_uri(); ?>/images/youtube.png' alt='Imagen 1' />
						</a>
					</div>
				</ul>
			</div>
			<div class="footer-space2">
				<?php wp_nav_menu( array( 'menu' => 'General', 
						'theme_location' => 'secondary',
						'menu_id'      => 'footer-menu',
						'before' => '<div class="footer-tab">',
						'after' => '</div>' ) ); ?>
				<div style="clear:both;"></div>
			</div>
		</div>
		
	</div>
	
</footer>
<p class="copyright text-center">Copyright 2015 Periódico Que hay. Derechos Reservados</p>
<?php wp_footer(); ?>
<!-- google analytics code -->
<?php get_template_part('analyticstracking'); ?>
</body>
</html>