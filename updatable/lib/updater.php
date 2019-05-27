<?php
/**
 * Genesis Sample.
 *
 * This file adds the child theme updater to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

add_filter( 'child_theme_updater_skip', 'genesis_sample_updatable_dir' );
/**
 * Add `updatable` to the list of updatable directories.
 *
 * @since 1.0.0
 *
 * @param array $defaults List of directories that are changed during an update.
 *
 * @return array
 */
function genesis_sample_updatable_dir( $defaults ) {
	return array_merge( [ 'updatable' ], $defaults );
}

add_filter( 'theme_scandir_exclusions', 'genesis_sample_scandir_exclusions' );
/**
 * Hide files from admin theme editor.
 *
 * @since 1.0.0
 *
 * @param array $exclusions Array of excluded directories and files.
 *
 * @return array
 */
function genesis_sample_scandir_exclusions( $exclusions ) {
	if ( 'theme-editor' !== get_current_screen()->id ) {
		return $exclusions;
	}

	return array_merge( [
		'updatable',
	], $exclusions );
}

add_action( 'init', 'genesis_sample_plugin_update_checker' );
/**
 * Maybe load plugin update checker.
 *
 * @since 1.0.0
 *
 * @return void
 */
function genesis_sample_plugin_update_checker() {
	if ( ! class_exists( 'Puc_v4p6_Factory' ) ) {
		return;
	}

	$defaults = \apply_filters( 'genesis_sample_update_checker', [
		'repo'   => 'https://github.com/studiopress/genesis-sample/',
		'file'   => \get_stylesheet_directory(),
		'theme'  => \get_stylesheet(),
		'token'  => '',
		'branch' => 'master',
	] );

	$plugin_update_checker = \Puc_v4_Factory::buildUpdateChecker(
		$defaults['repo'],
		$defaults['file'],
		$defaults['theme']
	);

	$plugin_update_checker->setBranch( $defaults['branch'] );

	if ( '' !== $defaults['token'] ) {
		$plugin_update_checker->setAuthentication( $defaults['token'] );
	}
}
