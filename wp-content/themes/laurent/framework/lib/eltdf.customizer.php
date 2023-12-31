<?php
/**
 * Adds options to the customizer.
 */
defined( 'ABSPATH' ) || exit;

/**
 * LaurentElatedClassCustomizer class.
 */
class LaurentElatedClassCustomizer {
	
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'add_sections' ) );
	}
	
	/**
	 * Get item name.
	 */
	public function get_item_name( $item ) {
		return ucwords( str_replace( '-', ' ', basename( $item ) ) );
	}
	
	/**
	 * Get item class name.
	 */
	public function get_item_class( $item ) {
		return str_replace( '-', '_', basename( $item ) );
	}
	
	/**
	 * Sanitize callback function for checkbox
	 */
	public function sanitize_checkbox( $checked ) {
		return isset( $checked ) && $checked === true;
	}
	
	/**
	 * Add settings to the customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function add_sections( $wp_customize ) {
		
		$wp_customize->add_panel(
			'laurent_performance',
			array(
				'priority' => 250,
				'title'    => esc_html__( 'Laurent Performance', 'laurent' )
			)
		);
		
		$wp_customize->add_section(
			'laurent_performance_icon_packs_section',
			array(
				'panel'       => 'laurent_performance',
				'priority'    => 10,
				'title'       => esc_html__( 'Icon Packs', 'laurent' ),
				'description' => esc_html__( 'Here you can select specific features to disable. Note that disabling certain features and functionalities which you will not be needing or which you are otherwise not utilizing in any way can have a positive effect to the overall performance of your site.', 'laurent' )
			)
		);
		
		foreach ( glob( LAURENT_ELATED_FRAMEWORK_ICONS_ROOT_DIR . '/*', GLOB_ONLYDIR ) as $item ) {
			$wp_customize->add_setting(
				'laurent_performance_disable_icon_pack_' . $this->get_item_class( $item ),
				array(
					'default'           => false,
					'type'              => 'option',
					'sanitize_callback' => array( $this, 'sanitize_checkbox' )
				)
			);
			
			$wp_customize->add_control(
				'laurent_performance_disable_icon_pack_' . $this->get_item_class( $item ),
				array(
					'section'  => 'laurent_performance_icon_packs_section',
					'settings' => 'laurent_performance_disable_icon_pack_' . $this->get_item_class( $item ),
					'type'     => 'checkbox',
					'label'    => $this->get_item_name( $item ),
				)
			);
		}
		
		if ( laurent_elated_is_plugin_installed( 'core' ) ) {
			$wp_customize->add_section(
				'laurent_performance_cpt_section',
				array(
					'panel'       => 'laurent_performance',
					'priority'    => 20,
					'title'       => esc_html__( 'Custom Post Types', 'laurent' ),
					'description' => esc_html__( 'Here you can select specific features to disable. Note that disabling certain features and functionalities which you will not be needing or which you are otherwise not utilizing in any way can have a positive effect to the overall performance of your site.', 'laurent' )
				)
			);
			
			foreach ( glob( LAURENT_CORE_CPT_PATH . '/*', GLOB_ONLYDIR ) as $item ) {
				$wp_customize->add_setting(
					'laurent_performance_disable_cpt_' . $this->get_item_class( $item ),
					array(
						'default'           => false,
						'type'              => 'option',
						'sanitize_callback' => array( $this, 'sanitize_checkbox' )
					)
				);
				
				$wp_customize->add_control(
					'laurent_performance_disable_cpt_' . $this->get_item_class( $item ),
					array(
						'section'  => 'laurent_performance_cpt_section',
						'settings' => 'laurent_performance_disable_cpt_' . $this->get_item_class( $item ),
						'type'     => 'checkbox',
						'label'    => $this->get_item_name( $item ),
					)
				);
			}
			
			$wp_customize->add_section(
				'laurent_performance_shortcodes_section',
				array(
					'panel'       => 'laurent_performance',
					'priority'    => 30,
					'title'       => esc_html__( 'Shortcodes', 'laurent' ),
					'description' => esc_html__( 'Here you can select specific features to disable. Note that disabling certain features and functionalities which you will not be needing or which you are otherwise not utilizing in any way can have a positive effect to the overall performance of your site.', 'laurent' )
				)
			);
			
			$shortcodes = array();
			
			foreach ( glob( LAURENT_ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/*', GLOB_ONLYDIR ) as $item ) {
				$shortcodes[ $this->get_item_class( $item ) ] = $this->get_item_name( $item );
			}
			
			if ( laurent_elated_is_plugin_installed( 'woocommerce' ) ) {
				foreach ( glob( LAURENT_ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/woocommerce/shortcodes/*', GLOB_ONLYDIR ) as $item ) {
					$shortcodes[ $this->get_item_class( $item ) ] = $this->get_item_name( $item );
				}
			}
			
			foreach ( glob( LAURENT_CORE_SHORTCODES_PATH . '/*', GLOB_ONLYDIR ) as $item ) {
				$shortcodes[ $this->get_item_class( $item ) ] = $this->get_item_name( $item );
			}
			
			if ( ! empty( $shortcodes ) ) {
				ksort( $shortcodes );
				
				foreach ( $shortcodes as $key => $value ) {
					$wp_customize->add_setting(
						'laurent_performance_disable_shortcode_' . $key,
						array(
							'default'           => false,
							'type'              => 'option',
							'sanitize_callback' => array( $this, 'sanitize_checkbox' )
						)
					);
					
					$wp_customize->add_control(
						'laurent_performance_disable_cpt_' . $key,
						array(
							'section'  => 'laurent_performance_shortcodes_section',
							'settings' => 'laurent_performance_disable_shortcode_' . $key,
							'type'     => 'checkbox',
							'label'    => $value,
						)
					);
				}
			}
		}
	}
}

new LaurentElatedClassCustomizer();
