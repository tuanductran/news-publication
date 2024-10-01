<?php
/**
 * Customiser Image select control.
 */
if (class_exists('WP_Customize_Control')) {
    class Npub_Image_Select_Control extends WP_Customize_Control
    {
        /**
         * The type of customize control being rendered.
         *
         * @var    string
         */
        public $type = 'radio-image';

        /**
         * Add our JavaScript and CSS to the Customizer.
         *
         * @return void
         */
        public function enqueue()
        {
            wp_enqueue_script(
                'npub-image-select-control',
                NPUB_THEME_CUSTOMIZER_URI . '/js/control-image-select.js',
                ['jquery'],
                NPUB_THEME_VERSION,
                true
            );
            wp_enqueue_style(
                'npub-image-select-control',
                NPUB_THEME_CUSTOMIZER_URI . '/css/control-image-select.css',
                [],
                NPUB_THEME_VERSION,
                'all'
            );
        }

        /**
         * Add custom JSON parameters to use in the JS template.
         *
         * @return void
         */
        public function to_json()
        {
            parent::to_json();

            // Create the image URL. Replaces the %s placeholder with the URL to the customizer /images/ directory.
            foreach ($this->choices as $value => $args) {
                $this->choices[$value]['url'] = esc_url(
                    sprintf(
                        $args['url'],
                        NPUB_THEME_CUSTOMIZER_URI . '/images/'
                    )
                );
            }

            $this->json['choices'] = $this->choices;
            $this->json['link'] = $this->get_link();
            $this->json['value'] = $this->value();
            $this->json['id'] = $this->id;
        }

        /**
         * An Underscore (JS) template for this control's content.
         *
         * Class variables for this control class are available in the `data` JS object;
         * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
         *
         * @see WP_Customize_Control::print_template()
         *
         * @access protected
         * @since  1.1
         * @return void
         */
        protected function content_template()
        {
            ?>
			<div class="customize-image-control">
				<# if ( ! data.choices ) {
					return;
				} #>

				<# if ( data.label ) { #>
					<span class="customize-control-title">{{ data.label }}</span>
				<# } #>

				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>

				<# for ( key in data.choices ) { #>

					<label class="image-wrapper" for="{{ data.id }}-{{ key }}">
						<strong class="label">{{ data.choices[ key ]['label'] }}</strong>
						<p class="description"><i>{{ data.choices[ key ]['description'] }}</i></p>
						<input type="radio" value="{{ key }}" name="_customize-{{ data.type }}-{{ data.id }}" id="{{ data.id }}-{{ key }}" {{{ data.link }}} <# if ( key === data.value ) { #> checked="checked" <# } #> />
						<img src="{{ data.choices[ key ]['url'] }}" alt="{{ data.choices[ key ]['label'] }}" />
					</label>
				<# } #>
			</div>
			<?php
        }
    }
}
