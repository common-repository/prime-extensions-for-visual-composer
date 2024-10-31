<?php
/**
 * @package  PrimeExtVc
 */
namespace Inc\Extensions\CountDown;
use Inc\Base\ExtensionsController;


class CountDown extends ExtensionsController {

	public function extensions_register() {
		if ( ! $this->activated( 'countdown' ) ) {
			return;
		}
		add_shortcode( 'pr_countdown', array( $this, 'prime_countdown_short' ) );

		$this->countdown();
	}

	public function countdown() {

		vc_map( array(
			"name"        => __( "Countdown", 'prime_vc' ),
			"base"        => "pr_countdown",
			"icon"        => "pev-countdown",
			"category"    => 'Prime VC Extensions',
			'description' => 'Icon animation with Text',
			// 'admin_enqueue_css' => array(plugins_url('css/vc_extensions_cq_admin.css', __FILE__)),
			"params" => array(

				array(
					"type" => "textfield",
					'heading' => __('Date (Y/m/d H:i:s Ex: 2017/11/28 15:11:12)', 'prime_vc'),
					'description' => __('The countdown will count from this moment to the date in this field.', 'prime_vc'),
					'param_name' => 'countdown_date',
					'value' => date("Y/m/d H:i:s", strtotime("+1 month")),
					'group' => __('Element Design  ', 'prime_vc'),
				),

				array(
					'type' => 'dropdown',
					"heading" => __('Style', 'prime_vc'),
					'description' => __('Select display style.', 'prime_vc'),
					'param_name' => 'display_style',
					'group' => __('Element Design  ', 'prime_vc'),
					'value' => array(
						__('Default', 'prime_vc') => 'cirlcle',
						__('Circle Text Outside', 'prime_vc') => 'circle_text_outside',
						__('Clean', 'prime_vc') => 'clean',
						__('Clean With Background', 'prime_vc') => 'clean_bg',
						__('Bordered', 'prime_vc') => 'border',
						__('Border Top', 'prime_vc') => 'border_top',
/*						__('Clean Material (Pro only)', 'prime_vc') => 'clean_material',
						__('Hexagon (Pro only)', 'prime_vc') => 'clean_hexagon',*/

						__('Custom Background', 'prime_vc') => 'clean_custome_background',
					),
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __("Inside color", 'prime_vc'),
					"param_name" => "inside_color",
					"value" => '',
					"dependency" => array('element' => 'circle_button', 'value' => 'on'),
					"description" => __("Choose color of inside circle (for 'Circle Text Outside' syle only).", 'prime_vc'),
					"dependency" => array('element' => 'display_style', 'value' => 'circle_text_outside'),
					'group' => __('Element Design  ', 'prime_vc'),
				),
				array(
					'type' => 'prime_slider',
					'heading' => __('Time Text Font Size', 'prime_vc'),
					'param_name' => 'time_text_size',
					'tooltip' => __('Choose Time Text Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc'),
					'min' => 0,
					'max' => 120,
					'step' => 1,
					'value' => 0,
					'unit' => 'px',
					"description" => __("Chose Time Text Size as Pixel. Default is 0, this mean the font size depend on the default of each style.", "my-text-domain"),
					'group' => __('Element Design  ', 'prime_vc'),
				),
				array(
					"type" => "prime_slider",
					'heading' => __('Text Size (below time) (px)', 'prime_vc'),
					'description' => __('Size of the text below time (Days, Hours, Minutes, Seconds).', 'prime_vc'),
					'param_name' => 'text_size',
					'min' => 0,
					'max' => 120,
					'step' => 1,
					'value' => 0,
					'unit' => 'px',
					'group' => __('Element Design  ', 'prime_vc'),
				),
				array(
					"type" => "prime_slider",
					'heading' => __('Block Spacing (px)', 'prime_vc'),
					'description' => __('Spacing bettwen countdown blocks, for Clean Style only.', 'prime_vc'),
					'param_name' => 'spacing',
					'min' => 0,
					'max' => 200,
					'step' => 1,
					'value' => 0,
					'unit' => 'px',
					"dependency" => array('element' => 'display_style', 'value' => array('clean', 'clean_hexagon')),
					'group' => __('Element Design  ', 'prime_vc'),
				),
				//for colors
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __('Day color', 'prime_vc'),
					"param_name" => "d_color",
					"value" => '',
					"description" => __("Choose day color", 'prime_vc'),
					'group' => __('Color Design  ', 'prime_vc'),
				),
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "icon",
					"heading" => __("Day Background Image  (for Custom Background only)", 'prime_vc'),
					"param_name" => "d_icon",
					"value" => '',
					"description" => __("Choose Day Background Image", 'prime_vc'),
					"dependency" => array('element' => 'display_style', 'value' => 'clean_custome_background'),
					'group' => __('Background', 'prime_vc'),
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __("Hour color", 'prime_vc'),
					"param_name" => "h_color",
					"value" => '',
					"description" => __("Choose hour color", 'prime_vc'),
					'group' => __('Color Design  ', 'prime_vc'),
				),
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "icon",
					"heading" => __("Hour Background Image (for Custom Background only)", 'prime_vc'),
					"param_name" => "h_icon",
					"value" => '',
					"description" => __("Choose Hour Background Image", 'prime_vc'),
					"dependency" => array('element' => 'display_style', 'value' => 'clean_custome_background'),
					'group' => __('Background', 'prime_vc'),
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __("Minute color", 'prime_vc'),
					"param_name" => "i_color",
					"value" => '',
					"description" => __("Choose minute color", 'prime_vc'),
					'group' => __('Color Design  ', 'prime_vc'),
				),
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "icon",
					"heading" => __("Minute Background Image (for Custom Background only)", 'prime_vc'),
					"param_name" => "i_icon",
					"value" => '',
					"description" => __("Choose Minute Background Image.", 'prime_vc'),
					"dependency" => array('element' => 'display_style', 'value' => 'clean_custome_background'),
					'group' => __('Background', 'prime_vc'),
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __("Second color", 'prime_vc'),
					"param_name" => "s_color",
					"value" => '',
					"description" => __("Choose second color", 'prime_vc'),
					'group' => __('Color Design  ', 'prime_vc'),
				),
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "icon",
					"heading" => __("Second Background Image (for Custom Background only)", 'prime_vc'),
					"param_name" => "s_icon",
					"value" => '',
					"description" => __("Choose Second Background Image", 'prime_vc'),
					"dependency" => array('element' => 'display_style', 'value' => 'clean_custome_background'),
					'group' => __('Background', 'prime_vc'),
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __("Text color", 'prime_vc'),
					"param_name" => "txt_color",
					"value" => '#0473AA',
					"description" => __("Choose color of countdown and lable text. (Use as background color in Border Top style)", 'prime_vc'),
					'group' => __('Color Design  ', 'prime_vc'),
				),
				array(
					'type' => 'css_editor',
					'heading' => __('CSS box', 'prime_vc'),
					'param_name' => 'css',
					'group' => __('Block Design', 'prime_vc'),
				)
			),
		) );
	}

public function prime_countdown_short($atts, $content = null){

	$css = '';
	extract(shortcode_atts(array(
		'css' => '',
		'display_style' => 'circle',
		'time_text_size' => '',
		'text_size' => '',
		'd_color' => '',
		'h_color' => '',
		'i_color' => '',
		's_color' => '',
		'spacing' => '',
		'txt_color' => '#0473AA',
		'inside_color' => '',
		'd_icon' => '',
		'h_icon' => '',
		'i_icon' => '',
		's_icon' => '',
		'countdown_date' => date("Y/m/d H:i:s", strtotime("+1 month")),
	), $atts));
	//$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), $this->settings['base'], $atts);
	$output = "";

		require "style/$display_style.php";

	$output.= ob_get_contents();
	ob_end_clean();
	return $output;
	}


}