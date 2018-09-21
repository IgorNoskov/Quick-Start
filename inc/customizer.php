<?php
/**
 * Theme Customizer
 *
 * @package WordPress
 * @subpackage quick-start
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * File Security Check.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'theme_customize_register' ) ) :

	/**
	 * Adds theme customization.
	 *
	 * @since 1.0.0
	 *
	 * @param object $wp_customize
	 */
	function theme_customize_register( $wp_customize ) {

		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		$wp_customize->get_setting( 'header_text' )->transport     = 'postMessage';

		/**
		 * Theme setting section.
		 */
		$wp_customize->add_section( 'theme_customizer_settings_section', array(
			'title'          => __( 'Theme settings', 'quick-start' ),
			'description'    => __( 'Main theme settings.', 'quick-start' ),
			'priority'       => 160,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
		) );

		/**
		 * Site layout type.
		 */
		$wp_customize->add_setting( 'theme_customizer_site_layout_type', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => 'main_left',
			'transport'         => 'refresh',
			'sanitize_callback' => 'Theme_Sanitizer::sanitize_customizer_select',
		) );

		$wp_customize->add_control( 'theme_customizer_site_layout_type', array(
			'type'        => 'radio',
			'priority'    => 10,
			'section'     => 'theme_customizer_settings_section',
			'label'       => __( 'Site layout type', 'quick-start' ),
			'description' => __( 'Choose layout type for all site.', 'quick-start' ),
			'choices'     => array(
				'main_left'  => __( 'Sidebar on right', 'quick-start' ),
				'main_right' => __( 'Sidebar on left', 'quick-start' ),
			),
		) );

		/**
		 * Pagination type.
		 */
		$wp_customize->add_setting( 'theme_customizer_post_pagination_type', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => 'default',
			'transport'         => 'refresh',
			'sanitize_callback' => 'Theme_Sanitizer::sanitize_customizer_select',
		) );

		$wp_customize->add_control( 'theme_customizer_post_pagination_type', array(
			'type'        => 'radio',
			'priority'    => 10,
			'section'     => 'theme_customizer_settings_section',
			'label'       => __( 'Pagination type', 'quick-start' ),
			'description' => __( 'Choose pagination type for all site.', 'quick-start' ),
			'choices'     => array(
				'default' => __( 'Default pagination.', 'quick-start' ),
				'ajax'    => __( 'Ajax loading pagination.', 'quick-start' ),
			),
		) );

		/**
		 * Site info.
		 */
		$wp_customize->add_setting( 'theme_customizer_site_info', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => 'All rights reserved.',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'theme_customizer_site_info', array(
			'type'        => 'text',
			'priority'    => 10,
			'section'     => 'theme_customizer_settings_section',
			'label'       => __( 'Site info', 'quick-start' ),
			'description' => __( 'Information is displayed in the footer.', 'quick-start' ),
		) );

		/**
		 * Example setting section.
		 */
		$wp_customize->add_section( 'theme_customizer_example_section', array(
			'title'          => __( 'Example Section', 'quick-start' ),
			'description'    => __( 'Description for section', 'quick-start' ),
			'priority'       => 160,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
		) );

		/**
		 * Text input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_text_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'theme_customizer_text_input_field', array(
			'type'        => 'text',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Text input field', 'quick-start' ),
			'description' => __( 'Description for text input field', 'quick-start' ),
			'input_attrs' => array(
				'placeholder' => __( 'Text input field', 'quick-start' ),
			),
		) );

		/**
		 * Hidden input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_hidden_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'theme_customizer_hidden_input_field', array(
			'type'    => 'hidden',
			'section' => 'theme_customizer_example_section',
		) );

		/**
		 * Number input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_number_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => 0,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
			'validate_callback' => 'Theme_Validator::validate_customizer_number',
		) );

		$wp_customize->add_control( 'theme_customizer_number_input_field', array(
			'type'        => 'number',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Number input field', 'quick-start' ),
			'description' => __( 'Description for number input field', 'quick-start' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
			),
		) );

		/**
		 * Range input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_range_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => 0,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
			'validate_callback' => 'Theme_Validator::validate_customizer_number',
		) );

		$wp_customize->add_control( 'theme_customizer_range_input_field', array(
			'type'        => 'range',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Range input field', 'quick-start' ),
			'description' => __( 'Description for range input field', 'quick-start' ),
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			),
		) );

		/**
		 * Url input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_url_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
			'validate_callback' => 'Theme_Validator::validate_customizer_url',
		) );

		$wp_customize->add_control( 'theme_customizer_url_input_field', array(
			'type'        => 'url',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Url input field', 'quick-start' ),
			'description' => __( 'Description for url input field', 'quick-start' ),
			'input_attrs' => array(
				'placeholder' => __( 'Url input field', 'quick-start' ),
			),
		) );

		/**
		 * Tel input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_tel_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'Theme_Sanitizer::sanitize_tel',
			'validate_callback' => 'Theme_Validator::validate_customizer_tel',
		) );

		$wp_customize->add_control( 'theme_customizer_tel_input_field', array(
			'type'        => 'tel',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Tel input field', 'quick-start' ),
			'description' => __( 'Description for tel input field', 'quick-start' ),
			'input_attrs' => array(
				'placeholder' => __( 'Tel input field', 'quick-start' ),
			),
		) );

		/**
		 * Email input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_email_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_email',
			'validate_callback' => 'Theme_Validator::validate_customizer_email',
		) );

		$wp_customize->add_control( 'theme_customizer_email_input_field', array(
			'type'        => 'email',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Email input field', 'quick-start' ),
			'description' => __( 'Description for email input field', 'quick-start' ),
			'input_attrs' => array(
				'placeholder' => __( 'Email input field', 'quick-start' ),
			),
		) );

		/**
		 * Search input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_search_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'theme_customizer_search_input_field', array(
			'type'        => 'search',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Search input field', 'quick-start' ),
			'description' => __( 'Description for search input field', 'quick-start' ),
			'input_attrs' => array(
				'placeholder' => __( 'Search input field', 'quick-start' ),
			),
		) );

		/**
		 * Time input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_time_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'Theme_Sanitizer::sanitize_time',
		) );

		$wp_customize->add_control( 'theme_customizer_time_input_field', array(
			'type'        => 'time',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Time input field', 'quick-start' ),
			'description' => __( 'Description for time input field', 'quick-start' ),
			'input_attrs' => array(
				'placeholder' => __( 'Time input field', 'quick-start' ),
			),
		) );

		/**
		 * Date input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_date_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'Theme_Sanitizer::sanitize_date',
		) );

		$wp_customize->add_control( 'theme_customizer_date_input_field', array(
			'type'        => 'date',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Date input field', 'quick-start' ),
			'description' => __( 'Description for date input field', 'quick-start' ),
			'input_attrs' => array(
				'placeholder' => __( 'Date input field', 'quick-start' ),
			),
		) );

		/**
		 * Datetime input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_datetime_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => date( 'Y-m-d H:i:s' ),
			'transport'         => 'refresh',
			'sanitize_callback' => 'Theme_Sanitizer::sanitize_datetime',
		) );

		$wp_customize->add_control( 'theme_customizer_datetime_input_field', array(
			'type'        => 'date_time',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Datetime input field', 'quick-start' ),
			'description' => __( 'Description for datetime input field', 'quick-start' ),
			'input_attrs' => array(
				'placeholder' => __( 'Datetime input field', 'quick-start' ),
			),
		) );

		/**
		 * Week input field.
		 */
		$wp_customize->add_setting( 'theme_customizer_week_input_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => date( 'Y-\WW' ),
			'transport'         => 'refresh',
			'sanitize_callback' => 'Theme_Sanitizer::sanitize_week',
		) );

		$wp_customize->add_control( 'theme_customizer_week_input_field', array(
			'type'        => 'week',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Week input field', 'quick-start' ),
			'description' => __( 'Description for week input field', 'quick-start' ),
			'input_attrs' => array(
				'placeholder' => __( 'Week input field', 'quick-start' ),
			),
		) );

		/**
		 * Checkbox field.
		 */
		$wp_customize->add_setting( 'theme_customizer_checkbox_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'Theme_Sanitizer::sanitize_checkbox',
		) );

		$wp_customize->add_control( 'theme_customizer_checkbox_field', array(
			'type'        => 'checkbox',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Checkbox field', 'quick-start' ),
			'description' => __( 'Description for checkbox field', 'quick-start' ),
		) );

		/**
		 * Textarea field.
		 */
		$wp_customize->add_setting( 'theme_customizer_textarea_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_textarea_field',
		) );

		$wp_customize->add_control( 'theme_customizer_textarea_field', array(
			'type'        => 'textarea',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Textarea field', 'quick-start' ),
			'description' => __( 'Description for textarea field', 'quick-start' ),
		) );

		/**
		 * Radio field.
		 */
		$wp_customize->add_setting( 'theme_customizer_radio_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => 'value_1',
			'transport'         => 'refresh',
			'sanitize_callback' => 'Theme_Sanitizer::sanitize_customizer_select',
		) );

		$wp_customize->add_control( 'theme_customizer_radio_field', array(
			'type'        => 'radio',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Radio field', 'quick-start' ),
			'description' => __( 'Description for radio field', 'quick-start' ),
			'choices'     => array(
				'value_1' => __( 'value 1', 'quick-start' ),
				'value_2' => __( 'value 2', 'quick-start' ),
			),
		) );

		/**
		 * Select field.
		 */
		$wp_customize->add_setting( 'theme_customizer_select_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'Theme_Sanitizer::sanitize_customizer_select',
		) );

		$wp_customize->add_control( 'theme_customizer_select_field', array(
			'type'        => 'select',
			'priority'    => 10,
			'section'     => 'theme_customizer_example_section',
			'label'       => __( 'Select field', 'quick-start' ),
			'description' => __( 'Description for select field', 'quick-start' ),
			'choices'     => array(
				'select_value_1' => __( 'value 1', 'quick-start' ),
				'select_value_2' => __( 'value 2', 'quick-start' ),
			),
		) );

		/**
		 * Dropdown pages field.
		 */
		$wp_customize->add_setting( 'theme_customizer_dropdown_pages_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'theme_customizer_dropdown_pages_field', array(
			'type'           => 'dropdown-pages',
			'priority'       => 10,
			'section'        => 'theme_customizer_example_section',
			'label'          => __( 'Dropdown pages field', 'quick-start' ),
			'description'    => __( 'Description for dropdown pages field', 'quick-start' ),
			'allow_addition' => true,
		) );

		/**
		 * Media image field.
		 */
		$wp_customize->add_setting( 'theme_customizer_media_field', array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'theme_supports'    => '',
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'theme_customizer_media_field',
			array(
				'section'   => 'theme_customizer_example_section',
				'label'     => __( 'Media field', 'quick-start' ),
				'mime_type' => 'image',
			) ) );

		/**
		 * File field.
		 */
		$wp_customize->add_setting( 'theme_customizer_file_field', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'Theme_Sanitizer::sanitize_customizer_file',
		) );

		$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'theme_customizer_file_field',
				array(
					'section'     => 'theme_customizer_example_section',
					'label'       => __( 'File field', 'quick-start' ),
					'description' => __( 'Description for file field', 'quick-start' ),
				)
			)
		);

		/**
		 * Color field.
		 */
		$wp_customize->add_setting( 'theme_customizer_color_field', array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'theme_supports'    => '',
				'default'           => '#000000',
				'transport'         => 'refresh',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_customizer_color_field',
				array(
					'section'     => 'theme_customizer_example_section',
					'label'       => __( 'Color field', 'quick-start' ),
					'description' => __( 'Description for color field', 'quick-start' ),
				)
			)
		);
	}

	add_action( 'customize_register', 'theme_customize_register' );

endif;
