<?php
/*
Plugin Name: San Antonio Weddings - Custom Functionality
Plugin URI:  https://friday-next.com
Description: Access to custom Divi modules, theme templates, and more for the SAW site.
Version:     1.0.0
Author:      Friday Next
Author URI:  https://friday-next.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: saw-fn-saw
Domain Path: /languages

San Antonio Weddings - Custom Functionality is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

San Antonio Weddings - Custom Functionality is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with San Antonio Weddings - Custom Functionality. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'saw_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function saw_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/FnSaw.php';
}
add_action( 'divi_extensions_init', 'saw_initialize_extension' );
endif;
