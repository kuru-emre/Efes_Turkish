<?php

if ( ! function_exists( 'laurent_elated_social_options_map' ) ) {
	function laurent_elated_social_options_map() {

	    $page = '_social_page';
		
		laurent_elated_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__( 'Social Networks', 'laurent' ),
				'icon'  => 'fa fa-share-alt'
			)
		);
		
		/**
		 * Enable Social Share
		 */
		$panel_social_share = laurent_elated_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_social_share',
				'title' => esc_html__( 'Enable Social Share', 'laurent' )
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Social Share', 'laurent' ),
				'description'   => esc_html__( 'Enabling this option will allow social share on networks of your choice', 'laurent' ),
				'parent'        => $panel_social_share
			)
		);
		
		$panel_show_social_share_on = laurent_elated_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_show_social_share_on',
				'title'           => esc_html__( 'Show Social Share On', 'laurent' ),
				'dependency' => array(
					'show' => array(
						'enable_social_share'  => 'yes'
					)
				)
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_post',
				'default_value' => 'no',
				'label'         => esc_html__( 'Posts', 'laurent' ),
				'description'   => esc_html__( 'Show Social Share on Blog Posts', 'laurent' ),
				'parent'        => $panel_show_social_share_on
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_page',
				'default_value' => 'no',
				'label'         => esc_html__( 'Pages', 'laurent' ),
				'description'   => esc_html__( 'Show Social Share on Pages', 'laurent' ),
				'parent'        => $panel_show_social_share_on
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
		do_action('laurent_elated_action_post_types_social_share', $panel_show_social_share_on);
		
		/**
		 * Social Share Networks
		 */
		$panel_social_networks = laurent_elated_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_social_networks',
				'title'           => esc_html__( 'Social Networks', 'laurent' ),
				'dependency' => array(
					'hide' => array(
						'enable_social_share'  => 'no'
					)
				)
			)
		);
		
		/**
		 * Facebook
		 */
		laurent_elated_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'facebook_title',
				'title'  => esc_html__( 'Share on Facebook', 'laurent' )
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_facebook_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'laurent' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Facebook', 'laurent' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_facebook_share_container = laurent_elated_add_admin_container(
			array(
				'name'            => 'enable_facebook_share_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_facebook_share'  => 'yes'
					)
				)
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'facebook_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'laurent' ),
				'parent'        => $enable_facebook_share_container
			)
		);
		
		/**
		 * Twitter
		 */
		laurent_elated_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'twitter_title',
				'title'  => esc_html__( 'Share on Twitter', 'laurent' )
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_twitter_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'laurent' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Twitter', 'laurent' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_twitter_share_container = laurent_elated_add_admin_container(
			array(
				'name'            => 'enable_twitter_share_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_twitter_share'  => 'yes'
					)
				)
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'twitter_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'laurent' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'twitter_via',
				'default_value' => '',
				'label'         => esc_html__( 'Via', 'laurent' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		/**
		 * Linked In
		 */
		laurent_elated_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'linkedin_title',
				'title'  => esc_html__( 'Share on LinkedIn', 'laurent' )
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_linkedin_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'laurent' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via LinkedIn', 'laurent' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_linkedin_container = laurent_elated_add_admin_container(
			array(
				'name'            => 'enable_linkedin_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_linkedin_share'  => 'yes'
					)
				)
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'linkedin_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'laurent' ),
				'parent'        => $enable_linkedin_container
			)
		);
		
		/**
		 * Tumblr
		 */
		laurent_elated_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'tumblr_title',
				'title'  => esc_html__( 'Share on Tumblr', 'laurent' )
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_tumblr_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'laurent' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Tumblr', 'laurent' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_tumblr_container = laurent_elated_add_admin_container(
			array(
				'name'            => 'enable_tumblr_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_tumblr_share'  => 'yes'
					)
				)
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'tumblr_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'laurent' ),
				'parent'        => $enable_tumblr_container
			)
		);
		
		/**
		 * Pinterest
		 */
		laurent_elated_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'pinterest_title',
				'title'  => esc_html__( 'Share on Pinterest', 'laurent' )
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_pinterest_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'laurent' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Pinterest', 'laurent' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_pinterest_container = laurent_elated_add_admin_container(
			array(
				'name'            => 'enable_pinterest_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_pinterest_share'  => 'yes'
					)
				)
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'pinterest_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'laurent' ),
				'parent'        => $enable_pinterest_container
			)
		);
		
		/**
		 * VK
		 */
		laurent_elated_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'vk_title',
				'title'  => esc_html__( 'Share on VK', 'laurent' )
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_vk_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'laurent' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via VK', 'laurent' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_vk_container = laurent_elated_add_admin_container(
			array(
				'name'            => 'enable_vk_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_vk_share'  => 'yes'
					)
				)
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'vk_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'laurent' ),
				'parent'        => $enable_vk_container
			)
		);
		
		if ( defined( 'LAURENT_TWITTER_FEED_VERSION' ) ) {
			$twitter_panel = laurent_elated_add_admin_panel(
				array(
					'title' => esc_html__( 'Twitter', 'laurent' ),
					'name'  => 'panel_twitter',
					'page'  => '_social_page'
				)
			);
			
			laurent_elated_add_admin_twitter_button(
				array(
					'name'   => 'twitter_button',
					'parent' => $twitter_panel
				)
			);
		}
		
		if ( defined( 'LAURENT_INSTAGRAM_FEED_VERSION' ) ) {
			$instagram_panel = laurent_elated_add_admin_panel(
				array(
					'title' => esc_html__( 'Instagram', 'laurent' ),
					'name'  => 'panel_instagram',
					'page'  => '_social_page'
				)
			);
			
			laurent_elated_add_admin_instagram_button(
				array(
					'name'   => 'instagram_button',
					'parent' => $instagram_panel
				)
			);
		}
		
		/**
		 * Open Graph
		 */
		$panel_open_graph = laurent_elated_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_open_graph',
				'title' => esc_html__( 'Open Graph', 'laurent' ),
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_open_graph',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Open Graph', 'laurent' ),
				'description'   => esc_html__( 'Enabling this option will allow usage of Open Graph protocol on your site', 'laurent' ),
				'parent'        => $panel_open_graph
			)
		);
		
		$enable_open_graph_container = laurent_elated_add_admin_container(
			array(
				'name'            => 'enable_open_graph_container',
				'parent'          => $panel_open_graph,
				'dependency' => array(
					'show' => array(
						'enable_open_graph'  => 'yes'
					)
				)
			)
		);
		
		laurent_elated_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'open_graph_image',
				'default_value' => LAURENT_ELATED_ASSETS_ROOT . '/img/open_graph.jpg',
				'label'         => esc_html__( 'Default Share Image', 'laurent' ),
				'parent'        => $enable_open_graph_container,
				'description'   => esc_html__( 'Used when featured image is not set. Make sure that image is at least 1200 x 630 pixels, up to 8MB in size', 'laurent' ),
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
        do_action('laurent_elated_action_social_options', $page);
	}
	
	add_action( 'laurent_elated_action_options_map', 'laurent_elated_social_options_map', laurent_elated_set_options_map_position( 'social' ) );
}