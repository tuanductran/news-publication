<?php
if ( class_exists( 'WP_Customize_Control' ) ) {

	class Npub_Range_Control extends WP_Customize_Control {

		/**
		 * The type of customize control being rendered.
		 *
		 * @var    string
		 */
		public $type = 'range-input';

		/**
		 * Enqueue scripts/styles for range controller in customizer.
		 */
		public function enqueue() {
			wp_enqueue_script( 'npub-customizer-range-value-control', NPUB_THEME_CUSTOMIZER_URI . 'js/control-range-slider.js', array( 'jquery' ), NPUB_THEME_VERSION, true );
			wp_enqueue_style( 'npub-customizer-range-value-control', NPUB_THEME_CUSTOMIZER_URI . 'css/control-range-slider.css', array(), NPUB_THEME_VERSION, 'all' );
		}

		/**
		 * Render the control's content.
		 */
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
				<span  style="width:100%; flex: 1 0 0; vertical-align: middle;">
				<input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" 
					<?php
						$this->input_attrs();
						$this->link();
					?>
				>
				<span class="range-slider__value">0</span></span>
				</div>
				<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>
			</label>
			<?php
		}

	}
}
