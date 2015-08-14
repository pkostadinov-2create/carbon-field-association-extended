<?php
/*
Plugin Name: Carbon Field: Association_Extended
Description: Extends base Carbon fields with a Association_Extended field. 
Version: 1.0.0
*/

/**
 * Set text domain
 * @see https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
 */
load_plugin_textdomain('carbon-field-association-extended', false, dirname( plugin_basename(__FILE__) ) . '/languages/'); 

/**
 * Hook field initialization
 */
add_action('after_setup_theme', 'crb_init_carbon_field_association_extended', 15);
function crb_init_carbon_field_association_extended() {
	if ( class_exists('Carbon_Field') ) {
		include_once dirname(__FILE__) . '/Carbon_Field_Association_Extended.php';
	}
}
