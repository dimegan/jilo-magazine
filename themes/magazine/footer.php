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
						<a href="http://jilo-magazine.esy.es/" >
							<img src='<?php echo get_template_directory_uri(); ?>/images/facebook.png' alt='Imagen 1' />
						</a>
						<a href="http://jilo-magazine.esy.es/" >
							<img src='<?php echo get_template_directory_uri(); ?>/images/twiter.png' alt='Imagen 1' />
						</a>
						<a href="http://jilo-magazine.esy.es/" >
							<img src='<?php echo get_template_directory_uri(); ?>/images/youtube.png' alt='Imagen 1' />
						</a>
						<a href="http://jilo-magazine.esy.es/" >
							<img src='<?php echo get_template_directory_uri(); ?>/images/google.png' alt='Imagen 1' />
						</a>
					</div>

					<div class="directory">
						<li>
							<h3 class="title-directory">Directorio</h3>
						</li>
						<li>
							<string class="range-directory">Director y Editor General</string>
							</br>
							<string class="name-directory">Prof. Arturo Chávez V.</string>
						</li>
						<li>
							<string class="range-directory">Distribución, Publicidad y Ventas</string>
							</br>
							<string class="name-directory">Raúl Cadena</string>
							</br>
							<string class="name-directory">Karla Maldonado Sánchez</string>
						</li>
						<li>
							<string class="range-directory">Arte y Diseño</string>
							</br>
							<string class="name-directory">Marco Jiménez R.</string>
						</li>
						<li>
							<string class="range-directory">Colaboradores</string>
							</br>
							<string class="name-directory">Prof. Francisco González Con</string>
							</br>
							<string class="name-directory">Ma. Guadalupe Huicochea E.</string>
							</br>
							<string class="name-directory">Benjamín Arredondo</string>
						</li>
						<li>
							<string class="range-directory">Fotógrafo</string>
							</br>
							<string class="name-directory">Alan Farid Sánchez Molina</string>
						</li>
						<li>
							<string class="range-directory">Asesor Jurídico</string>
							</br>
							<string class="name-directory">Lic. Octavio Maldonado Rodea</string>
						</li>
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
<p class="copyright text-center">Copyright 2015 Periodico Que hay. Derechos Reservados</p>
<?php wp_footer(); ?>
<!-- google analytics code -->
<?php get_template_part('analyticstracking'); ?>
</body>
</html>