<?php

/**
 * [Shortcode Name here]
 *	Replace shortcode name with anything you want!
 */
function func_rohan_shortcode($atts){
	$out = "";
	$atts = shortcode_atts([
	// You can use any one as needed
	   'variable1' => 'value1',
		'variable2' => 'value2',
		'variable3' => 'value3',
		'variable4' => 'value4',
		
	], $atts, $tag);
		
		$variable1 = $atts["variable1"];
		$variable2 = $atts["variable2"];
		$variable3 = $atts["variable3"];
		
		$out .= "Add your HTML / CSS / JS code here! ";
		$out .= "And you can also embed a " . $variable . " here ";
		$out .= 'use single quoted out for a <a href="#"> kind of HTML output where you can use a " .';
		
	return $out;
}
add_shortcode("rohan_shortcode","func_rohan_shortcode");