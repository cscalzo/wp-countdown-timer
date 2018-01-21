<?php
/*
Plugin Name: CS Countdown Timer
Description: Use a shortcode to call a countdown timer
Version: 1.0.2
Author: Chris Scalzo
Author URI: scalzodesign.com
 */

// Include JS
function countdown_timer_init_scripts(){
	wp_enqueue_script('countdown_timer_js', plugin_dir_url( __FILE__ ) . 'js/countdown-timer.js', array('jquery'), '1.0.1', true);
	wp_enqueue_style('countdown_timer_css', plugin_dir_url(__FILE__) . 'css/countdown-style.css', array(), '1.0.1');
}
add_action('wp_enqueue_scripts', 'countdown_timer_init_scripts');

// Define Shortcode
function countdown_timer_shortcode($atts){
	// Pull/Set Paramaters
	extract( shortcode_atts(
		array(
			'date' => 'January 1, 2017 00:00:01'
		), $atts)
	);
	// Generate HTML
	$output = '';
	$output .= '<div class="countdown-timer-wrapper" data-target-date="'.$date.'">';
	$output .= '<div class="days col-sm-3 text-center"><div class="countdown-value">0</div><div class="countdown-label">days</div></div>';
	$output .= '<div class="hours col-sm-3 text-center"><div class="countdown-value">0</div><div class="countdown-label">hours</div></div>';
	$output .= '<div class="minutes col-sm-3 text-center"><div class="countdown-value">0</div><div class="countdown-label">minutes</div></div>';
	$output .= '<div class="seconds col-sm-3 text-center"><div class="countdown-value">0</div><div class="countdown-label">seconds</div></div>';
	$output .= '</div>';

	return $output;
}
add_shortcode('countdown', 'countdown_timer_shortcode');
