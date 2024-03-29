<?php
/*
Plugin Name: MP SimpleFlat Skin
Plugin URI: http://moveplugins.com
Description: A simple and flat YouTube player skin!
Version: beta1.0.0.2
Author: Move Plugins
Author URI: http://moveplugins.com
Text Domain: mp_simpleflat_skin
Domain Path: languages
License: GPL2
*/

/*  Copyright 2014  Phil Johnston  (email : phil@moveplugins.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Move Plugins Core.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Move Plugins Core, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/
// Plugin version
if( !defined( 'mp_simpleflat_skin_VERSION' ) )
	define( 'mp_simpleflat_skin_VERSION', '1.0.0.0' );

// Plugin Folder URL
if( !defined( 'mp_simpleflat_skin_PLUGIN_URL' ) )
	define( 'mp_simpleflat_skin_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Plugin Folder Path
if( !defined( 'mp_simpleflat_skin_PLUGIN_DIR' ) )
	define( 'mp_simpleflat_skin_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Plugin Root File
if( !defined( 'mp_simpleflat_skin_PLUGIN_FILE' ) )
	define( 'mp_simpleflat_skin_PLUGIN_FILE', __FILE__ );

/*
|--------------------------------------------------------------------------
| GLOBALS
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| INTERNATIONALIZATION
|--------------------------------------------------------------------------
*/

function mp_simpleflat_skin_textdomain() {

	// Set filter for plugin's languages directory
	$mp_simpleflat_skin_lang_dir = dirname( plugin_basename( mp_simpleflat_skin_PLUGIN_FILE ) ) . '/languages/';
	$mp_simpleflat_skin_lang_dir = apply_filters( 'mp_simpleflat_skin_languages_directory', $mp_simpleflat_skin_lang_dir );


	// Traditional WordPress plugin locale filter
	$locale        = apply_filters( 'plugin_locale',  get_locale(), 'mp-simpleflat-skin' );
	$mofile        = sprintf( '%1$s-%2$s.mo', 'mp-simpleflat-skin', $locale );

	// Setup paths to current locale file
	$mofile_local  = $mp_simpleflat_skin_lang_dir . $mofile;
	$mofile_global = WP_LANG_DIR . '/mp-simpleflat-skin/' . $mofile;

	if ( file_exists( $mofile_global ) ) {
		// Look in global /wp-content/languages/mp_simpleflat_skin folder
		load_textdomain( 'mp_simpleflat_skin', $mofile_global );
	} elseif ( file_exists( $mofile_local ) ) {
		// Look in local /wp-content/plugins/message_bar/languages/ folder
		load_textdomain( 'mp_simpleflat_skin', $mofile_local );
	} else {
		// Load the default language files
		load_plugin_textdomain( 'mp_simpleflat_skin', false, $mp_simpleflat_skin_lang_dir );
	}

}
add_action( 'init', 'mp_simpleflat_skin_textdomain', 1 );

/*
|--------------------------------------------------------------------------
| INCLUDES
|--------------------------------------------------------------------------
*/
function mp_simpleflat_skin_include_files(){
	/**
	 * If mp_core isn't active, stop and install it now
	 */
	if (!function_exists('mp_core_textdomain')){
		
		/**
		 * Include Plugin Checker
		 */
		require( mp_simpleflat_skin_PLUGIN_DIR . '/includes/plugin-checker/class-plugin-checker.php' );
		
		/**
		 * Include Plugin Installer
		 */
		require( mp_simpleflat_skin_PLUGIN_DIR . '/includes/plugin-checker/class-plugin-installer.php' );
		
		/**
		 * Check if mp_core in installed
		 */
		require( mp_simpleflat_skin_PLUGIN_DIR . 'includes/plugin-checker/included-plugins/mp-core-check.php' );
		
		/**
		 * Check if mp_video_skinner in installed
		 */
		require( mp_simpleflat_skin_PLUGIN_DIR . 'includes/plugin-checker/included-plugins/mp-video-skinner-check.php' );
		
	}
	/**
	 * Otherwise, if mp_core is active, carry out the plugin's functions
	 */
	else{
		
		/**
		 * Update script - keeps this plugin up to date
		 */
		require( mp_simpleflat_skin_PLUGIN_DIR . 'includes/updater/mp-simpleflat-skin-update.php' );
		
		/**
		 * Enqueue Scripts
		 */
		require( mp_simpleflat_skin_PLUGIN_DIR . 'includes/misc-functions/enqueue-scripts.php' );
		
		/**
		 * Misc Functions
		 */
		require( mp_simpleflat_skin_PLUGIN_DIR . 'includes/misc-functions/misc-functions.php' );
		
		/**
		 * Shortcode Functions
		 */
		require( mp_simpleflat_skin_PLUGIN_DIR . 'includes/misc-functions/shortcode-functions.php' );
	
	}
}
add_action('plugins_loaded', 'mp_simpleflat_skin_include_files', 9);