<?php
/*
 * Plugin Name: QuickReviewer HTML Review
 * Plugin URI: http://www.quickreviewer.com/qr-html-review
 * Description: This plugin allows the revieweing of HTML files through the QuickReviewer proofing platform.
 * Version: 1.2
 * Author: Abdul H Kidwai
 * Author URI: http://www.quickreviewer.com
 */

function qrhtmlplug_add_cors_http_header(){
	$http_origin = $_SERVER['HTTP_REFERER'];
	//if (strpos("localhost", $http_origin) > -1 || strpos("app.quickreviewer.com", $http_origin) > -1 || strpos("beta.quickreviewer.com", $http_origin) > -1) {
		header("Access-Control-Allow-Origin: " . $http_origin);
		//header("X-Frame-Options: ALLOW-FROM " . $http_origin);
		//preg_match('/^(?:https?:\/\/)?(?:[^@\n]+@)?(?:app\.)?([^:\/\n?]+)/i', $http_origin, $match);
		//header("Content-Security-Policy: frame-ancestors " . $match[0]);
	//}
}

function qrhtmlplug_theJS() {
	wp_enqueue_script(
		'QR_HTML_REVIEW',
		'https://app.quickreviewer.com/proof/webproof/qrv2.js?r=' . rand()
	);
	//wp_script_add_data( 'QR_HTML_REVIEW', array( 'crossorigin' ) , array( 'anonymous' ) ); // add data to the script
}
add_action('init','qrhtmlplug_add_cors_http_header');
add_action( 'wp_enqueue_scripts',  'qrhtmlplug_theJS' );
  
?>