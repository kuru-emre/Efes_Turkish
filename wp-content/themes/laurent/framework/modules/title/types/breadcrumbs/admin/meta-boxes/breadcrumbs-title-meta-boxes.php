<?php

if ( ! function_exists( 'laurent_elated_get_hide_dep_for_breadcrumbs_title_meta_boxes' ) ) {
	function laurent_elated_get_hide_dep_for_breadcrumbs_title_meta_boxes() {
		$hide_dep_options = apply_filters( 'laurent_elated_filter_breadcrumbs_title_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'laurent_elated_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function laurent_elated_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
	    $hide_dep_options = laurent_elated_get_hide_dep_for_breadcrumbs_title_meta_boxes();
		
		laurent_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'laurent' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'laurent' ),
				'parent'      => $show_title_area_meta_container,
                'dependency'  => array(
                    'hide' => array(
                        'eltdf_title_area_type_meta' => $hide_dep_options
                    )
                )
			)
		);
	}
	
	add_action( 'laurent_elated_action_additional_title_area_meta_boxes', 'laurent_elated_breadcrumbs_title_type_options_meta_boxes' );
}