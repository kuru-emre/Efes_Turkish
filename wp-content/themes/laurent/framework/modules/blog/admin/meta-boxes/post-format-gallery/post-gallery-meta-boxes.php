<?php

if ( ! function_exists( 'laurent_elated_map_post_gallery_meta' ) ) {
	
	function laurent_elated_map_post_gallery_meta() {
		$gallery_post_format_meta_box = laurent_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'laurent' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		laurent_elated_add_multiple_images_field(
			array(
				'name'        => 'eltdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'laurent' ),
				'description' => esc_html__( 'Choose your gallery images', 'laurent' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'laurent_elated_action_meta_boxes_map', 'laurent_elated_map_post_gallery_meta', 21 );
}
