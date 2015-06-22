<?php
   /*
   Plugin Name: Aviso Oportuno DK
   Plugin URI: http://quehayenjilo.com
   Description: a plugin to create awesomeness and spread joy
   Version: 1.0
   Author: Diego Mendoza & Kevin Pacheco
   License: GPL2
   //Referencias: http://www.wpexplorer.com/create-widget-plugin-wordpress/
   */

   class Aviso_Oportuno_Widget extends WP_Widget {

	 	// constructor
		function Aviso_Oportuno_Widget() {
			parent::WP_Widget(false, $name = __('Aviso Oportuno Widget', 'Aviso_Oportuno_Widget') );
		}

		// widget form creation
		function form($instance) {

			// Check values
			if( $instance) {
			     $title = esc_attr($instance['title']);
			     $text = esc_attr($instance['text']);
			     $textarea = esc_textarea($instance['textarea']);
			} else {
			     $title = '';
			     $text = '';
			     $textarea = '';
			}
			?>

			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>

			<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', 'wp_widget_plugin'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
			</p>

			<p>
			<label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Textarea:', 'wp_widget_plugin'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>">
			<?php echo $textarea; ?></textarea>
			</p>
			<?php
		}

		// update widget
		function update($new_instance, $old_instance) {
		      $instance = $old_instance;
		      // Fields
		      $instance['title'] = strip_tags($new_instance['title']);
		      $instance['text'] = strip_tags($new_instance['text']);
		      $instance['textarea'] = strip_tags($new_instance['textarea']);
		     return $instance;
		}

		// display widget
		function widget($args, $instance) {
		   extract( $args );
		   // these are the widget options
		   $title = apply_filters('widget_title', $instance['title']);
		   $text = $instance['text'];
		   $textarea = $instance['textarea'];
		   echo $before_widget;
		   // Display the widget
		   echo '<div class="widget-text wp_widget_plugin_box">';
		   
		   renderPostList();

		   echo '</div>';
		   echo $after_widget;
		}
	}

	function renderPostList(){
		//Show list of posts
		$cat1 = get_option( "aviso-cat", "default" );
	   //Start wp query
	   query_posts('category_name='.$cat1.'&showposts=3');

	   $currenCatName = single_cat_title("", false);
	   $category_id = get_cat_ID( $currenCatName );
	   $category_link = esc_url(get_category_link( $category_id ));

	   ?>
	   		<div id="aviso-wrapper">
		   		<h4 class="widget-aviso-title">
		   			<a href="<?php echo $category_link; ?>" class="category-title"> 
		   				<?php echo $currenCatName; ?>
		   			</a>
		   		</h4>
		   		<div id="aviso-list-items">
	   <?php
	   //Start posts loop
	   if (have_posts()) : while (have_posts()) : the_post();
	   ?>
	   		<div class="aviso-item">
	   			<div class="cp-thumb-xl">
			     	<a  href="<?php the_permalink(); ?>" class="category-img">
			            <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'content-single' ); } ?>
			        </a> 
			    </div>
			    <div class="aviso-title">
				    <h4>
				     	<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" >
				            <?php the_title();  ?>
				        </a>
				     </h4>
			     </div>
	   		</div>
	   	<?php
	   endwhile; endif;
	   //End posts loop
	   wp_reset_query();
	   //end wp query
	   ?>
	   			<h4 class="link-mas">
	   				<a href="<?php echo $category_link; ?>">Ver mas avisos oportunos</a>
	   			</h4>
	   		</div><!--End aviso-list-items -->
   		</div><!-- End aviso-wrapper-->
	   <?php 
	}
	// register widget
	add_action('widgets_init', create_function('', 'return register_widget("Aviso_Oportuno_Widget");'));
?>