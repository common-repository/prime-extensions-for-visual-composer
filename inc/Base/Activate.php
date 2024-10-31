<?php
/**
 * @package  PrimeExtVc
 */

namespace Inc\Base;

class Activate {
	public static function activate() {
		flush_rewrite_rules();


		$option_name = 'prime_vc';

		if ( get_option( $option_name ) ) {
			return;
		}

		$default = array(
			'icon_animation',
			'animate_box',
			'info_box',
			'separator',
			'3d_flipbox',
			'modal',
			'accordion',
			'testimonial',
			'csstooltips',
			'pricing_table',
			'before_after',
			'content_block',
			'hover_effects',
			'page_transition',
			'prime_modal',
			'scroll_notification',
			'masonry_gallery',
			'prime_tab',
			'team_member',
			'zoom_magnifier',
			'video_gallery',
			'shadow_box',
			'image_hotspot',
			'profile_card',
			'timeline',
			'countdown',
			'progressbar',
			'undoredo',
		);

		$default_settings = array_fill_keys( $default, true );

		if ( get_option( $option_name ) !== false ) {

			// The option already exists, so update it.
			update_option( $option_name, $default_settings );

		} else {

			// The option hasn't been created yet, so add it with $autoload set to 'no'.
			$deprecated = null;
			$autoload   = 'no';
			add_option( $option_name, $default_settings, $deprecated, $autoload );

		}
	}
}