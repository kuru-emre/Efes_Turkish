<?php

if ( ! function_exists('laurent_elated_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function laurent_elated_contact_form_map() {
		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'laurent'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'laurent') => 'default',
				esc_html__('Custom Style 1', 'laurent') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'laurent') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'laurent') => 'cf7_custom_style_3'
			),
			'description' => esc_html__('You can style each form element individually in Elated Options > Contact Form 7', 'laurent')
		));
	}
	
	add_action('vc_after_init', 'laurent_elated_contact_form_map');
}

// replace cf7 submit button with our button
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
add_action('wpcf7_init', 'laurent_elated_cf7_button');

if (!function_exists('laurent_elated_cf7_button')) {
    function laurent_elated_cf7_button() {
        wpcf7_add_form_tag('submit', 'laurent_elated_cf7_button_handler');
    }
}

if (!function_exists('laurent_elated_cf7_button_handler')) {
    function laurent_elated_cf7_button_handler($tag) {
        $tag = new WPCF7_FormTag($tag);
        $class = wpcf7_form_controls_class($tag->type);

        $atts = array();
        $atts['class'] = $tag->get_class_option($class);
        $atts['class'] .= ' eltdf-btn eltdf-btn-medium eltdf-btn-outline';
        $atts['id'] = $tag->get_id_option();
        $atts['tabindex'] = $tag->get_option('tabindex', 'int', true);

        $value = isset($tag->values[0]) ? $tag->values[0] : '';
        if (empty($value)) {
            $value = esc_html__('Send', 'laurent');
        }

        $atts['type'] = 'submit';
        $atts = wpcf7_format_atts($atts);

        $html = sprintf('<button %1$s><span class="eltdf-btn-text">%2$s</span></button>', $atts, $value);

        return $html;
    }
}