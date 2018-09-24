<?php

/**
 * Customizer Sections for the Custom CSS panel
 *
 * Part of the Divi Children Engine - http://divi4u.com
 */


/**
 * Custom CSS sections
 */

function dce_customizer_sections_custom_css( $wp_customize ) {

	$panel = 'custom-css';
	// $hide_section = 'hide-custom-css';

	global $dce_customizer_sections;

	global $divi_child_name;

	foreach ( $dce_customizer_sections as $section => $values ) {

		if ( $panel !== $values[0] ) {
			continue;
		}

		$section_string = str_replace( '-', '_', $section );
		$part = 'section_' . $section_string;
		// $hide = ( get_theme_mod( 'dce_hide_settings_' . $section_string, false ) ) ? true : false;

		if ( ! dce_enable( $part ) ) {
			continue;
		}

		// if ( ( $hide_section !== $section ) AND $hide ) {
			// continue;
		// }

		$section_name = 'dce_' . $section_string;
		$section_title = $divi_child_name . ' - ' . $values[4];
		$section_description = $values[5];
		$panel_name = 'dce_' . str_replace( '-', '_', $panel ) . '_panel';
		$count = ( isset( $count ) ) ? $count++ : 19;

		$wp_customize->add_section( $section_name, array(
			'title'			=>	$section_title,
			'description'	=>	$section_description,
			'capability'	=>	'edit_theme_options',
			// 'panel'			=>	$panel_name,
			'priority'		=>	$count,
		) );		

	}

}
add_action( 'customize_register', 'dce_customizer_sections_custom_css' );
