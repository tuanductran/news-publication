<?php

/**
 * Npub_Section_Heading_Custom_Control
 */
if (class_exists('WP_Customize_Control')) {
    class Npub_Section_Heading_Custom_Control extends WP_Customize_Control
    {
        /**
         * The type of customize control being rendered.
         *
         * @var    string
         */
        public $type = 'sub_section_heading';

        /**
         * Add our JavaScript and CSS to the Customizer.
         *
         * @return void
         */
        public function enqueue()
        {
            wp_enqueue_style(
                'npub-title-control',
                NPUB_THEME_CUSTOMIZER_URI . '/css/control-heading.css',
                [],
                NPUB_THEME_VERSION,
                'all'
            );
        }

        /**
         * Render the control in the customizer.
         *
         * @return void
         */
        public function content_template()
        {
            ?>
			<div class="customize-title-control">

				<# if ( data.label ) { #>
					<h2 class="customize-control-title">{{ data.label }}</h2>
				<# } #>

				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>

			</div>
			<?php
        }
    }
}
