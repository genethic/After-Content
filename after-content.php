<?php
/*
Plugin Name: After content
Description: Add more content after post content: related content, author info, post pagination, social sharing buttons, post meta, image, text
Version:1.0
Author: Genethick
Author URI: http://www.codetocode-developments.com
Plugin URI: http://www.codetocode-developments.com/wp-plugins/after-content-plugin-documentation/
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/	

global $smof_data;

include ('post-pagination.php');
include ('related.php');
include ('author.php');
include ('social-profiles.php');
include ('social-sharing.php');
include ('post-meta.php');
include ('text.php');
include ('img.php');
include ('banner.php');
include ('admin/index.php');
	
/*------------------------------------------------------------------------------------------------------------------------------
	ADD HOOKS
---------------------------------------------------------------------------------------------------------------------------------*/

//display pagination if is active and is single page
if ( $smof_data['afc_pagination_active'] == 1 ) {
	
	function add_afc_pagination ($content) {
		
		$content .= afc_post_pagination();
		return $content;
		
	}
	
	add_filter('the_content',  'add_afc_pagination' );
	
	function add_afc_pagination_css () {
		
		global $smof_data;
		echo '<style>' . $smof_data['afc_post_pagination_css'] . '</style>';
		
	}
	
	add_action('wp_head',  'add_afc_pagination_css' ); 
	
}


//display related content if is active and is single page
if ( $smof_data['afc_related_active'] == 1 ) {
	
	function add_afc_related_content_cat ($content) {
		
		$content .= afc_related_content();	
		return $content;
		
	}
	
	add_filter('the_content',  'add_afc_related_content_cat', 2 ); 
	
	function add_afc_related_css () {
		
		global $smof_data;
		echo '<style>' . $smof_data['afc_related_content_css'] . '</style>';
		
	}
	
	add_action('wp_head',  'add_afc_related_css' ); 
	
}


//display author info if is active and is single page
if ( $smof_data['afc_author_active'] == 1 ) {
	
	add_filter('user_contactmethods','afc_new_contact_methods');
	
	function add_afc_author ($content) {
		
		$content .= afc_author_info();
		return $content;
		
	}
	
	add_filter('the_content',  'add_afc_author', 12 ); 
	
	function add_afc_author_css () {
		
		global $smof_data;
		echo '<style>' . $smof_data['afc_author_info_css'] . '</style>';
		
	}
	
	add_action('wp_head',  'add_afc_author_css' );
	
}


//display social sharing buttons if is active and is single page
if ( $smof_data['afc_social_sharing_active'] == 1 ) {
	
	function add_afc_social_sharing ($content) {
		
		$content .= afc_social_sharing();
		return $content;
		
	}
	
	add_filter('the_content',  'add_afc_social_sharing', 1 ); 
	
	function add_afc_social_sharing_css () {
		
		global $smof_data;
		echo '<style>' . $smof_data['afc_social_sharing_css'] . '</style>';
		
	}
	
	add_action('wp_head',  'add_afc_social_sharing_css' );
	
}

//display post custom meta list if is active and is single page
if ( $smof_data['afc_post_meta'] == 1 ) {
	
	function add_afc_post_meta ($content) {
		
		$content .= afc_post_meta();
		return $content;
		
	}
	
	add_filter('the_content',  'add_afc_post_meta', 1 ); 
	
	function add_afc_post_meta_css () {
		
		global $smof_data;
		echo '<style>' . $smof_data['afc_post_meta_css'] . '</style>';
		
	}
	
	add_action('wp_head',  'add_afc_post_meta_css' );
	
}

//display custom if is active and is single page
if ( $smof_data['afc_add_text'] == 1 ) {
	
	function add_afc_text ($content) {
		
		$content .= afc_text();
		return $content;
		
	}
	
	add_filter('the_content',  'add_afc_text', 1 ); 
	
	function add_afc_text_css () {
		
		global $smof_data;
		echo '<style>' . $smof_data['afc_text_css'] . '</style>';
		
	}
	
	add_action('wp_head',  'add_afc_text_css' );
	
}

//display custom image if is active and is single page
if ( $smof_data['afc_add_image'] == 1 ) {
	
	function add_afc_img ($content) {
		
		$content .= afc_img();
		return $content;
		
	}
	
	add_filter('the_content',  'add_afc_img', 1 ); 
	
	function add_afc_image_css () {
		
		global $smof_data;
		echo '<style>' . $smof_data['afc_image_css'] . '</style>';
		
	}
	
	add_action('wp_head',  'add_afc_image_css' );
	
}

//display banner if is active and is single page
if ( $smof_data['afc_add_banner'] == 1 ) {
	
	function add_afc_banner ($content) {
		$content .= afc_banner();	
		return $content;
		
	}
	
	add_filter('the_content',  'add_afc_banner', 1 ); 
	
	function add_afc_banner_css () {
		
		global $smof_data;
		echo '<style>' . $smof_data['afc_banner_css'] . '</style>';
		
	}
	
	add_action('wp_head',  'add_afc_banner_css' );
	
}


//add jquery
function afc_add_jquery() {

	wp_enqueue_script("jquery");
	
}

add_action('wp_enqueue_scripts', 'afc_add_jquery');
?>
