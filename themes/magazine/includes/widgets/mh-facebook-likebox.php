<?php

/***** Facebook Likebox Widget *****/

class mh_newsdesk_lite_facebook_likebox extends WP_Widget {
    function mh_newsdesk_lite_facebook_likebox() {
        $widget_ops = array('classname' => 'mh_newsdesk_lite_facebook_likebox', 'description' => __('Widget to display a Facebook likebox in your sidebar.', 'mh-newsdesk-lite'));
        $this->WP_Widget('mh_newsdesk_lite_facebook_likebox', __('MH Facebook Likebox', 'mh-newsdesk-lite'), $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $facebook_url = isset($instance['facebook_url']) ? $instance['facebook_url'] : 'https://www.facebook.com/MHthemes';
        $width = isset($instance['width']) ? $instance['width'] : '373';
        $height = isset($instance['height']) ? $instance['height'] : '290';
        $faces = !isset($instance['faces']) || $instance['faces'] == 1 ? 'true' : 'false';
        $stream = isset($instance['stream']) && $instance['stream'] == 1 ? 'true' : 'false';
        $header = isset($instance['header']) && $instance['header'] == 1 ? 'true' : 'false';
        $border = isset($instance['border']) && $instance['border'] == 1 ? 'true' : 'false';

        echo $before_widget;
        if (!empty( $title)) { echo $before_title . $title . $after_title; }
        if ($facebook_url) {
	    	echo '<div class="fb-like-box" data-href="' . esc_url($facebook_url) . '" data-width="' . esc_attr($width) . '" data-height="' . esc_attr($height) . '" data-show-faces="' . esc_attr($faces) . '" data-show-border="' . esc_attr($border) . '" data-stream="' . esc_attr($stream) . '" data-header="' . esc_attr($header) . '"></div>'. "\n";
		}
        echo $after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['facebook_url'] = esc_url_raw($new_instance['facebook_url']);
        $instance['width'] = absint($new_instance['width']);
        $instance['height'] = absint($new_instance['height']);
        $instance['faces'] = isset($new_instance['faces']) ? strip_tags($new_instance['faces']) : '';
        $instance['stream'] = isset($new_instance['stream']) ? strip_tags($new_instance['stream']) : '';
        $instance['header'] = isset($new_instance['header']) ? strip_tags($new_instance['header']) : '';
        $instance['border'] = isset($new_instance['border']) ? strip_tags($new_instance['border']) : '';
        return $instance;
    }
    function form($instance) {
        $defaults = array('title' => __('Follow on Facebook', 'mh-newsdesk-lite'), 'facebook_url' => 'https://www.facebook.com/MHthemes', 'width' => '373', 'height' => '290', 'faces' => true, 'stream' => false, 'header' => false, 'border' => false);
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
        	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mh-newsdesk-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <p>
	   		<label for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php _e('Facebook Page URL:', 'mh-newsdesk-lite'); ?></label>
	   		<input class="widefat" type="text" value="<?php echo esc_url($instance['facebook_url']); ?>" name="<?php echo $this->get_field_name('facebook_url'); ?>" id="<?php echo $this->get_field_id('facebook_url'); ?>" />
	    </p>
        <p>
	    	<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:', 'mh-newsdesk-lite'); ?></label>
			<input type="text" size="2" value="<?php echo esc_attr($instance['width']); ?>" name="<?php echo $this->get_field_name('width'); ?>" id="<?php echo $this->get_field_id('width'); ?>" /> px
	    </p>
	    <p>
	    	<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:', 'mh-newsdesk-lite'); ?></label>
			<input type="text" size="2" value="<?php echo esc_attr($instance['height']); ?>" name="<?php echo $this->get_field_name('height'); ?>" id="<?php echo $this->get_field_id('height'); ?>" /> px
	    </p>
	    <p>
      		<input id="<?php echo $this->get_field_id('faces'); ?>" name="<?php echo $this->get_field_name('faces'); ?>" type="checkbox" value="1" <?php checked('1', $instance['faces']); ?>/>
	  		<label for="<?php echo $this->get_field_id('faces'); ?>"><?php _e('Show Faces', 'mh-newsdesk-lite'); ?></label>
    	</p>
    	<p>
      		<input id="<?php echo $this->get_field_id('stream'); ?>" name="<?php echo $this->get_field_name('stream'); ?>" type="checkbox" value="1" <?php checked('1', $instance['stream']); ?>/>
	  		<label for="<?php echo $this->get_field_id('stream'); ?>"><?php _e('Show Stream', 'mh-newsdesk-lite'); ?></label>
    	</p>
    	<p>
      		<input id="<?php echo $this->get_field_id('header'); ?>" name="<?php echo $this->get_field_name('header'); ?>" type="checkbox" value="1" <?php checked('1', $instance['header']); ?>/>
	  		<label for="<?php echo $this->get_field_id('header'); ?>"><?php _e('Show Header', 'mh-newsdesk-lite'); ?></label>
    	</p>
	    <p>
      		<input id="<?php echo $this->get_field_id('border'); ?>" name="<?php echo $this->get_field_name('border'); ?>" type="checkbox" value="1" <?php checked('1', $instance['border']); ?>/>
	  		<label for="<?php echo $this->get_field_id('border'); ?>"><?php _e('Show Border', 'mh-newsdesk-lite'); ?></label>
    	</p><?php
    }
}

?>