<?php
/**
 * Alpha Color Picker Customizer Control
 *
 * This control adds a second slider for opacity to the stock WordPress color picker,
 * and it includes logic to seamlessly convert between RGBa and Hex color values as
 * opacity is added to or removed from a color.
 *
 * This Alpha Color Picker is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this Alpha Color Picker. If not, see <http://www.gnu.org/licenses/>.
 */

if ( class_exists( 'WP_Customize_Control' ) ) {


	class Npub_Color_Control extends WP_Customize_Control {


		/**
		 * type control type.
		 *
		 * @var string
		 */
		public $type = 'npub-color';

		/**
		 * Add support for palettes to be passed in.
		 *
		 * Supported palette values are true, false, or an array of RGBa and Hex colors.
		 */
		public $palette;

		/**
		 * Add support for showing the opacity value on the slider handle.
		 */
		public $show_opacity;

		/**
		 * Enqueue scripts and styles.
		 *
		 * Ideally these would get registered and given proper paths before this control object
		 * gets initialized, then we could simply enqueue them here, but for completeness as a
		 * stand alone class we'll register and enqueue them here.
		 */
		public function enqueue() {
			wp_enqueue_script(
				'npub-color-picker',
				NPUB_THEME_CUSTOMIZER_URI . '/js/gradiant-color-picker.js',
				array( 'jquery', 'wp-color-picker' ),
				NPUB_THEME_VERSION,
				true
			);
			wp_enqueue_style(
				'npub-color-picker',
				NPUB_THEME_CUSTOMIZER_URI . '/css/gradiant-color-picker.css',
				array( 'wp-color-picker' ),
				NPUB_THEME_VERSION
			);
		}

		/**
		 * Render the control.
		 */
		public function render_content() {
			?>
			<div class="customize-title-control">

			<h2 class="customize-control-title"><?php echo esc_html( $this->label ); ?></h2>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>

			<?php		
			// Process the palette.
			if ( is_array( $this->palette ) ) {
				$palette = implode( '|', $this->palette );
			} else {
				// Default to true.
				$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
			}

			// Support passing show_opacity as string or boolean. Default to true.
			$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
			$default = isset( $this->settings['default']->default ) ? $this->settings['default']->default : '';

			// Begin the output. ?>
			<label>
				<input class="alpha-color-control" type="text" data-show-opacity="<?php echo $show_opacity; ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $default ); ?>" <?php $this->link(); ?>  />
			</label>
			
			</div>
			<?php
		}
	}
}
