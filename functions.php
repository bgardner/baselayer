<?php
/**
 * Functions for the Baselayer WordPress theme.
 *
 * @package	Baselayer
 * @author	Brian Gardner
 * @license	GNU General Public License v3
 * @link	https://briangardner.com/baselayer/
 */

if ( ! function_exists( 'baselayer_setup' ) ) {

	/**
	 * Initialize theme styles and support.
	 */
	function baselayer_setup() {

		// Enqueue editor stylesheet.
		add_editor_style( get_template_directory_uri() . '/style.css' );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

	}
}
add_action( 'after_setup_theme', 'baselayer_setup' );

/**
 * Enqueue theme stylesheet and script.
 */
function baselayer_enqueue_stylesheet_script() {

	// Enqueue theme stylesheet.
	wp_enqueue_style( 'baselayer', get_template_directory_uri() . '/style.css', array(), wp_get_theme( 'baselayer' )->get( 'Version' ) );

}
add_action( 'wp_enqueue_scripts', 'baselayer_enqueue_stylesheet_script' );

/**
 * Register block styles.
 */
function baselayer_register_block_styles() {

	$block_styles = array(
		'core/social-links' => array(
			'outline' => __( 'Outline', 'baselayer' ),
		),
	);

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style(
				$block,
				array(
					'name'  => $style_name,
					'label' => $style_label,
				)
			);
		}
	}

}
add_action( 'init', 'baselayer_register_block_styles' );
