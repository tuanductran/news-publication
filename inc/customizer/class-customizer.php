<?php

/**
 * Npub Customizer
 */
class Npub_Customizer {

	/**
	 * Npub Customizer constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'include_controls' ) );
		add_action( 'customize_register', array( $this, 'register_customizers' ) );
		add_action( 'customize_preview_init', array( $this, 'customize_preview_callback' ) );

	}

	/**
	 * Enqueue customizer preview script.
	 */
	public function customize_preview_callback() {
		wp_enqueue_script( 'npub-customizer_preview', NPUB_THEME_CUSTOMIZER_URI . '/js/customizer-preview.js', array( 'customize-preview', 'jquery' ), NPUB_THEME_VERSION, true );
	}

	/**
	 * Include Custom Controls
	 *
	 * Includes all our custom control classes.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer Object.
	 *
	 * @return void
	 */
	public function include_controls( $wp_customize ) {
		include NPUB_THEME_CUSTOMIZER_DIR . 'class-customizer-imagecontrol.php';
		$wp_customize->register_control_type( 'Npub_Image_Select_Control' );

		include NPUB_THEME_CUSTOMIZER_DIR . 'class-customizer-rangecontrol.php';
		$wp_customize->register_control_type( 'Npub_Range_Control' );

		include NPUB_THEME_CUSTOMIZER_DIR . 'class-customizer-titlecontrol.php';
		$wp_customize->register_control_type( 'Npub_Section_Heading_Custom_Control' );

		include NPUB_THEME_CUSTOMIZER_DIR . 'class-customizer-colorcontrol.php';

	}

	/**
	 * Register Customizer panels
	 *
	 * @param  object $wp_customize Customizer Object.
	 * @return void
	 */
	public function register_customizers( $wp_customize ) {
		$this->custom_panels( $wp_customize );
		/**
		 * Inner Section of panels
		 */
		$this->header_logosize_list( $wp_customize );
		$this->footer_logosize_list( $wp_customize );
	}


	/**
	 * Customizer Custom Panels
	 *
	 * @param  object $wp_customize Customizer Object.
	 * @return void
	 */
	public function custom_panels( $wp_customize ) {

		$wp_customize->add_panel(
			'site_layout_templates',
			array(
				'priority'   => 21,
				'capability' => 'edit_theme_options',
				'title'      => __( 'Site Layouts / Templates', 'news-publication' ),
			)
		);

		/**
		 * Section of the penal
		 */
		$this->headers( $wp_customize, 1 );
		$this->single_article( $wp_customize, 2 );
		$this->footers( $wp_customize, 3 );

		$wp_customize->add_panel(
			'color_options_panel',
			array(
				'priority'   => 22,
				'capability' => 'edit_theme_options',
				'title'      => __( 'Colors ', 'news-publication' ),
			)
		);

		/**
		 * Section of the penal
		 */
		$this->font_colors( $wp_customize, 1 );
		$this->site_element_colors( $wp_customize, 2 );

	}

	/**
	 * Headers Settings.
	 *
	 * @param  object $wp_customize Customizer Object.
	 * @param  int    $priority Section Priority.
	 * @return void
	 */
	public function headers( $wp_customize, $priority ) {
		$wp_customize->add_section(
			'header_controls_section',
			array(
				'title'    => __( 'Navigation bar layouts', 'news-publication' ),
				'priority' => $priority,
				'panel'    => 'site_layout_templates',
			)
		);

		$this->header_layout( $wp_customize );

	}

	/**
	 * Header Layouts
	 *
	 * @param  object $wp_customize Customizer Object.
	 * @return void
	 */
	public function header_layout( $wp_customize ) {
		// Header section -> Header layout setting.
		$wp_customize->add_setting(
			'header_layout_setting',
			array(
				'default'           => 'header-default',
				'sanitize_callback' => 'sanitize_key',
			)
		);

		$wp_customize->add_control(
			new Npub_Image_Select_Control(
				$wp_customize,
				'header_layout_control',
				array(
					'label'    => esc_html__( 'Choose a header layout', 'news-publication' ),
					'section'  => 'header_controls_section',
					'settings' => 'header_layout_setting',
					'choices'  => array(
						'header-default' => array(
							'label'       => __( 'Centered', 'news-publication' ),
							'description' => __( 'Centered logo with two side widget areas. Full width menu.', 'news-publication' ),
							'url'         => '%sheader-default.png',
						),
						'header-left'    => array(
							'label'       => __( 'Left aligned', 'news-publication' ),
							'description' => __( 'Left aligned logo no widget areas. Full width menu.', 'news-publication' ),
							'url'         => '%sheader-left.png',
						),
					),
					'priority' => 1,
				)
			)
		);

	}


	/**
	 * Footer Settings
	 *
	 * @param  object $wp_customize Customizer Object.
	 * @param  int    $priority Section Priority.
	 * @return void
	 */
	public function footers( $wp_customize, $priority ) {
		$wp_customize->add_section(
			'footer_controls_section',
			array(
				'title'    => __( 'Footer layouts', 'news-publication' ),
				'priority' => $priority,
				'panel'    => 'site_layout_templates',
			)
		);

		$this->footer_layout( $wp_customize );
		$this->footer_copyright( $wp_customize );

	}

	/**
	 * Footer Layouts
	 *
	 * @param  object $wp_customize Customizer Object.
	 * @return void
	 */
	public function footer_layout( $wp_customize ) {
		// Footer section -> Footer layout setting.
		$wp_customize->add_setting(
			'footer_layout_setting',
			array(
				'default'           => 'footer-default',
				'sanitize_callback' => 'sanitize_key',
			)
		);

		$wp_customize->add_control(
			new Npub_Image_Select_Control(
				$wp_customize,
				'footer_layout_control',
				array(
					'label'    => __( 'Footer Layouts', 'news-publication' ),
					'section'  => 'footer_controls_section',
					'settings' => 'footer_layout_setting',
					'choices'  => array(
						'footer-default'     => array(
							'label'       => __( 'Default footer', 'news-publication' ),
							'description' => __( 'Centered logo and description. Two menu areas, and one full width widget area.', 'news-publication' ),
							'url'         => '%sdefault-footer.png',
						),
						'footer-default-col' => array(
							'label'       => __( 'Left aligned footer', 'news-publication' ),
							'description' => __( 'Left logo and description. Two menu areas, arranged in 4 columns. One full width widget area.', 'news-publication' ),
							'url'         => '%sleft-aligned-footer.png',
						),
						'footer-modern'      => array(
							'label'       => __( 'Default footer v2', 'news-publication' ),
							'description' => __( 'Centered logo and description. Two menu areas, and one full width widget area.', 'news-publication' ),
							'url'         => '%sdefault-footer-v2.png',
						),
					),
					'priority' => 1,
				)
			)
		);

	}

	/**
	 * Footer Copyright Box.
	 *
	 * @param  object $wp_customize Customizer Object.
	 * @return void
	 */
	public function footer_copyright( $wp_customize ) {
		$wp_customize->add_setting(
			'footer_copyright_setting',
			array(
				'default'           => __( 'Copy2022 Lorem ipsum Lorem ipsum Lorem ipsum', 'news-publication' ),
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'textbox2_control',
				array(
					'label'       => __( 'Copyright Text', 'news-publication' ),
					'section'     => 'footer_controls_section',
					'settings'    => 'footer_copyright_setting',
					'type'        => 'text',
					'priority'    => 2,
					'description' => __( 'Add copyright text are here.', 'news-publication' ),
				)
			)
		);
	}


	/**
	 * Single Article Options
	 *
	 * @param  object $wp_customize Customizer Object.
	 * @param  int    $priority Section Priority.
	 * @return void
	 */
	public function single_article( $wp_customize, $priority ) {

		$wp_customize->add_section(
			'single_article_layout_section',
			array(
				'title'    => __( 'Article Layouts', 'news-publication' ),
				'priority' => $priority,
				'panel'    => 'site_layout_templates',
			)
		);

		$this->single_article_bannner( $wp_customize );
		$this->single_article_content( $wp_customize );
	}

	/**
	 * Single Article Banner Options
	 *
	 * @param  object $wp_customize Customizer Object.
	 * @return void
	 */
	public function single_article_bannner( $wp_customize ) {

		// Single Atricle Banner Options.
		$wp_customize->add_setting(
			'single_article_banner_setting',
			array(
				'default'           => 'article-banner-middle-title',
				'sanitize_callback' => 'sanitize_key',
			)
		);

		$wp_customize->add_control(
			new Npub_Image_Select_Control(
				$wp_customize,
				'single_article_banner_layout_control',
				array(
					'label'    => __( 'Article header layouts', 'news-publication' ),
					'section'  => 'single_article_layout_section',
					'settings' => 'single_article_banner_setting',
					'choices'  => array(
						'article-banner-middle-title'    => array(
							'label'       => __( 'Modern header', 'news-publication' ),
							'description' => __( 'Title overlays the featured image partially.Center aligned.', 'news-publication' ),
							'url'         => '%smodern-header.png',
						),
						'article-banner-top-title-big'   => array(
							'label'       => __( 'Centered header', 'news-publication' ),
							'description' => __( 'Centered title and image. Title is displayed first, with added padding.', 'news-publication' ),
							'url'         => '%scentered-header.png',
						),
						'article-banner-top-title-small' => array(
							'label'       => __( 'Classic header', 'news-publication' ),
							'description' => __( 'Left aligned title with smaller featured image.', 'news-publication' ),
							'url'         => '%sclassic-header.png',
						),
					),
					'priority' => 1,
				)
			)
		);
	}

	/**
	 * Single Article Content Options
	 *
	 * @param  object $wp_customize Customizer Object.
	 *
	 * @return void
	 */
	public function single_article_content( $wp_customize ) {
			// Single Atricle Banner Options.
			$wp_customize->add_setting(
				'single_article_content_setting',
				array(
					'default'           => 'article-content',
					'sanitize_callback' => 'sanitize_key',
				)
			);

			$wp_customize->add_control(
				new Npub_Image_Select_Control(
					$wp_customize,
					'single_article_content_layout_control',
					array(
						'label'    => __( 'Article body layouts', 'news-publication' ),
						'section'  => 'single_article_layout_section',
						'settings' => 'single_article_content_setting',
						'choices'  => array(
							'article-content'         => array(
								'label'       => __( 'Modern article body', 'news-publication' ),
								'description' => __( 'Center aligned body and no side widgets.', 'news-publication' ),
								'url'         => '%smodern-article-body.png',
							),
							'article-content-sidebar' => array(
								'label'       => __( 'Classic article body', 'news-publication' ),
								'description' => __( 'Left aligned body and widgets on the right.', 'news-publication' ),
								'url'         => '%sclassic-article-body.png',
							),
						),
						'priority' => 2,
					)
				)
			);
	}

	/**
	 * Colors Settings
	 *
	 * @param  object $wp_customize Customizer Object.
	 * @param  int    $priority Customizer Setting priority.
	 * @return void
	 */
	public function font_colors( $wp_customize, $priority ) {
		$wp_customize->add_section(
			'font_colors_settings_section',
			array(
				'title'    => 'Font colors',
				'priority' => 30,
				'panel'    => 'color_options_panel',
			)
		);

		$this->headers_color( $wp_customize, 2 );
		$this->text_color( $wp_customize, 3 );
		$this->link_color( $wp_customize, 4 );
		$this->accent_color_picker( $wp_customize, 5 );
		$this->secondary_text_color( $wp_customize, 6 );
		$this->headline_text_color( $wp_customize, 7 );
	}

	/**
	 * Site element color
	 *
	 * @param  mixed $wp_customize Customiser Object.
	 * @param  int   $priority priority.
	 * @return void
	 */
	public function site_element_colors( $wp_customize, $priority ) {
		$wp_customize->add_section(
			'site_element_colors_settings_section',
			array(
				'title'    => __( 'Site elements colors', 'news-publication' ),
				'priority' => 35,
				'panel'    => 'color_options_panel',
			)
		);

		$this->body_background_color( $wp_customize, 9 );
		$this->overlay_background_color( $wp_customize, 10 );
		$this->post_card_hover_color( $wp_customize, 11 );
		$this->body_secondary_color( $wp_customize, 12 );
		$this->headline_background_color( $wp_customize, 13 );
	}

	/**
	 * Body Background color.
	 *
	 * @param  object $wp_customize Customizer object.
	 * @param  int    $priority Setting priority.
	 * @return void
	 */
	public function body_background_color( $wp_customize, $priority ) {
		$wp_customize->add_setting(
			'body_bg_color_picker_setting',
			array(
				'transport'         => 'refresh',
				'default'           => '#150E20',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'body_bg_color_picker_control',
				array(
					'label'       => __( 'Body Background Color', 'news-publication' ),
					'description' => __( 'Changes the whole websites background color.', 'news-publication' ),
					'section'     => 'site_element_colors_settings_section',
					'settings'    => 'body_bg_color_picker_setting',
					'priority'    => $priority,
				)
			)
		);

	}


	/**
	 *  Overlay Background color.
	 *
	 * @param  object $wp_customize Customizer object.
	 * @param  int    $priority Setting priority.
	 * @return void
	 */
	public function overlay_background_color( $wp_customize, $priority ) {
		// Headline section background color.
		$wp_customize->add_setting(
			'overlay_background_color_picker_setting',
			array(
				'default'    => '#190D29',
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => function ( $color ) {
					return $color;
				},
			)
		);

		$wp_customize->add_control(
			new Npub_Color_Control(
				$wp_customize,
				'overlay_background_color_picker_control',
				array(
					'label'        => __( 'Overlay background Color', 'news-publication' ),
					'description'  => __( 'Change overlay color.', 'news-publication' ),
					'section'      => 'site_element_colors_settings_section',
					'settings'     => 'overlay_background_color_picker_setting',
					'show_opacity' => 'true',
					'palette'      => true,
					'priority'     => $priority,
				)
			)
		);
	}

	/**
	 * Accent Colors.
	 *
	 * @param  object $wp_customize Customizer object.
	 * @param  int    $priority Setting priority.
	 * @return void
	 */
	public function accent_color_picker( $wp_customize, $priority ) {
		// Accent Control Picker Control.
		$wp_customize->add_setting(
			'accent_color_picker_setting',
			array(
				'transport'         => 'refresh',
				'default'           => '#CCFF2E',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'accent_color_picker_control',
				array(
					'label'       => __( 'Accent Color', 'news-publication' ),
					'description' => __( 'Open the color picker and select "default" to go back to the original setting.', 'news-publication' ),
					'section'     => 'font_colors_settings_section',
					'settings'    => 'accent_color_picker_setting',
					'priority'    => $priority,
				)
			)
		);
	}

	/**
	 * Header Colors.
	 *
	 * @param  object $wp_customize Customizer object.
	 * @param  int    $priority Setting priority.
	 * @return void
	 */
	public function headers_color( $wp_customize, $priority ) {
		// Titles Color Control Picker Control.
		$wp_customize->add_setting(
			'headers_color_picker_setting',
			array(
				'transport'         => 'refresh',
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'headers_color_picker_control',
				array(
					'label'       => __( 'Title/Subtitle color', 'news-publication' ),
					'description' => __( 'Change color for H1/H2/H3/H4 Titles & Subtitles', 'news-publication' ),
					'section'     => 'font_colors_settings_section',
					'settings'    => 'headers_color_picker_setting',
					'priority'    => $priority,
				)
			)
		);
	}

	/**
	 * Secondary Text color.
	 *
	 * @param  object $wp_customize Customizer object.
	 * @param  int    $priority Setting priority.
	 * @return void
	 */
	public function secondary_text_color( $wp_customize, $priority ) {
		// Secondary Text Color Control Picker Control.
		$wp_customize->add_setting(
			'secondary_text_color_picker_setting',
			array(
				'transport'         => 'refresh',
				'default'           => '#7E7689',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'secondary_text_color_picker_control',
				array(
					'label'       => __( 'Secondary Text color', 'news-publication' ),
					'description' => __( 'Change color for secondary text (e.g author name & date)', 'news-publication' ),
					'section'     => 'font_colors_settings_section',
					'settings'    => 'secondary_text_color_picker_setting',
					'priority'    => $priority,
				)
			)
		);
	}

	/**
	 * Secondary Text color.
	 *
	 * @param  object $wp_customize Customizer object.
	 * @param  int    $priority Setting priority.
	 * @return void
	 */
	public function headline_text_color( $wp_customize, $priority ) {
		// Secondary Text Color Control Picker Control.
		$wp_customize->add_setting(
			'headline_text_color_picker_setting',
			array(
				'transport'         => 'refresh',
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'headline_text_color_picker_control',
				array(
					'label'       => __( 'Headline Text color', 'news-publication' ),
					'description' => __( 'Change color for headline text', 'news-publication' ),
					'section'     => 'font_colors_settings_section',
					'settings'    => 'headline_text_color_picker_setting',
					'priority'    => $priority,
				)
			)
		);
	}

	/**
	 * Text Color.
	 *
	 * @param  object $wp_customize Customizer Object.
	 * @return void
	 */
	public function text_color( $wp_customize, $priority ) {
		// Text Color Control Picker Control.
		$wp_customize->add_setting(
			'text_color_picker_setting',
			array(
				'transport'         => 'refresh',
				'default'           => '#FFFFFF',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'text_color_picker_control',
				array(
					'label'       => __( 'Paragraph/Body Text color', 'news-publication' ),
					'description' => __( 'Change color for body text (paragraph styling)', 'news-publication' ),
					'section'     => 'font_colors_settings_section',
					'settings'    => 'text_color_picker_setting',
					'priority'    => $priority,
				)
			)
		);
	}

	/**
	 * Link Color.
	 *
	 * @param  object $wp_customize Customizer object.
	 * @param  int    $priority Setting priority.
	 * @return void
	 */
	public function link_color( $wp_customize, $priority ) {
		// Link Text Color Control Picker Control.
		$wp_customize->add_setting(
			'link_color_picker_setting',
			array(
				'transport'         => 'refresh',
				'default'           => '#FFFFFF',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'link_color_picker_control',
				array(
					'label'       => __( 'Link color', 'news-publication' ),
					'description' => __( 'Change base link color', 'news-publication' ),
					'section'     => 'font_colors_settings_section',
					'settings'    => 'link_color_picker_setting',
					'priority'    => $priority,
				)
			)
		);
	}

	/**
	 * Body Secondary Color
	 *
	 * @param  object $wp_customize Customizer object.
	 * @param  int    $priority Setting priority.
	 * @return void
	 */
	public function body_secondary_color( $wp_customize, $priority ) {
		// Body Secondary Color Control Picker Control.
		$wp_customize->add_setting(
			'body_secondary_color_picker_setting',
			array(
				'transport'         => 'refresh',
				'default'           => '#392E49',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'body_secondary_color_picker_control',
				array(
					'label'       => __( 'Input Border Color', 'news-publication' ),
					'description' => __( 'Border color for things like inputs, search, news ticker & hover menus.', 'news-publication' ),
					'section'     => 'site_element_colors_settings_section',
					'settings'    => 'body_secondary_color_picker_setting',
					'priority'    => $priority,
				)
			)
		);
	}

	/**
	 * Post Card Hover Color.
	 *
	 * @param  object $wp_customize Customizer object.
	 * @param  int    $priority Setting priority.
	 * @return void
	 */
	public function post_card_hover_color( $wp_customize, $priority ) {
		// Post Card Color Picker control.
		$wp_customize->add_setting(
			'post_card_color_picker_setting',
			array(
				'transport'         => 'refresh',
				'default'           => '#21172E',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'post_card_color_picker_control',
				array(
					'label'       => __( 'Post Card hover Color', 'news-publication' ),
					'description' => __( 'Change hover color of post card block.', 'news-publication' ),
					'section'     => 'site_element_colors_settings_section',
					'settings'    => 'post_card_color_picker_setting',
					'priority'    => $priority,
				)
			)
		);
	}


	/**
	 * Headline section background color.
	 *
	 * @param  object $wp_customize Customizer object.
	 * @param  int    $priority Setting priority.
	 * @return void
	 */
	public function headline_background_color( $wp_customize, $priority ) {
		// Headline section background color.
		$wp_customize->add_setting(
			'headline_background_color_picker_setting',
			array(
				'transport'         => 'refresh',
				'default'           => '#211732',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'headline_background_color_picker_control',
				array(
					'label'       => __( 'News ticker background color', 'news-publication' ),
					'description' => __( 'BG color for news ticker bar below the navbar.', 'news-publication' ),
					'section'     => 'site_element_colors_settings_section',
					'settings'    => 'headline_background_color_picker_setting',
					'priority'    => $priority,
				)
			)
		);
	}

	/**
	 * Header Logo Size.
	 *
	 * @param  object $wp_customize Customizer object.
	 * @return void
	 */
	public function header_logosize_list( $wp_customize ) {

		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'           => get_theme_mod( 'logo_width', '240' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Npub_Range_Control(
				$wp_customize,
				'logo_width',
				array(
					'type'        => 'range-value',
					'section'     => 'title_tagline',
					'settings'    => 'logo_width',
					'label'       => __( 'Header Logo Width for Desktop', 'news-publication' ),
					'input_attrs' => array(
						'min'    => 1,
						'max'    => 1000,
						'step'   => 1,
						'suffix' => 'px',
					),
					'priority'    => 9,
				)
			)
		);

		$wp_customize->add_setting(
			'mobile_logo_width',
			array(
				'default'           => get_theme_mod( 'mobile_logo_width', '240' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Npub_Range_Control(
				$wp_customize,
				'mobile_logo_width',
				array(
					'type'        => 'range-value',
					'section'     => 'title_tagline',
					'label'       => __( 'Header Logo Width for Mobile', 'news-publication' ),
					'settings'    => 'mobile_logo_width',
					'input_attrs' => array(
						'min'    => 1,
						'max'    => 1000,
						'step'   => 1,
						'suffix' => 'px',
					),
					'priority'    => 9,
				)
			)
		);

	}

	/**
	 * Footer Logo Size.
	 *
	 * @param  object $wp_customize Customizer object.
	 * @return void
	 */
	public function footer_logosize_list( $wp_customize ) {

	    $wp_customize->add_setting(
			'footer_custom_logo',
			array(
				'theme_supports' => array( 'custom-logo' ),
				'transport'      => 'postMessage',
				'sanitize_callback' => 'sanitize_url',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'footer_custom_logo',
				array(
					'label'         => 'Footer Logo',
					'section'       => 'title_tagline',
					'priority'      => 62,
					'button_labels' => array(
						'select'       => 'Select logo',
						'change'       => 'Change logo',
						'remove'       => 'Remove',
						'default'      => 'Default',
						'placeholder'  => 'No logo selected',
						'frame_title'  => 'Select logo',
						'frame_button' => 'Choose logo',
					),
				)
			)
		);

		$wp_customize->add_setting(
			'footer_logo_width',
			array(
				'default'           => get_theme_mod( 'footer_logo_width', '240' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Npub_Range_Control(
				$wp_customize,
				'footer_logo_width',
				array(
					'type'        => 'range-value',
					'section'     => 'title_tagline',
					'settings'    => 'footer_logo_width',
					'label'       => __( 'Footer Logo Width for Desktop', 'news-publication' ),
					'input_attrs' => array(
						'min'    => 1,
						'max'    => 1000,
						'step'   => 1,
						'suffix' => 'px',
					),
					'priority'    => 62,
				)
			)
		);

		$wp_customize->add_setting(
			'footer_mobile_logo_width',
			array(
				'default'           => get_theme_mod( 'footer_mobile_logo_width', '240' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new Npub_Range_Control(
				$wp_customize,
				'footer_mobile_logo_width',
				array(
					'type'        => 'range-value',
					'section'     => 'title_tagline',
					'label'       => __( 'Footer Logo Width for Mobile', 'news-publication' ),
					'settings'    => 'footer_mobile_logo_width',
					'input_attrs' => array(
						'min'    => 1,
						'max'    => 1000,
						'step'   => 1,
						'suffix' => 'px',
					),
					'priority'    => 62,
				)
			)
		);

	}
}

new Npub_Customizer();
