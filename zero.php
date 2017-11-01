<?php 

/**
 * Plugin Name: Zero
 * Plugin URI: https://github.com/zerooverflow/zero
 * Description: Zero, plugin base.
 * Version: 1.0.0
 * Author: ZeroOverflow
 * Author URI: https://github.com/zerooverflow
 * Requires at least: 4.4
 * Text Domain: zero
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'ZERO_PLUGIN_FILE' ) ) {
	define( 'ZERO_PLUGIN_FILE', __FILE__ );
}

if ( ! class_exists( 'Zero' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-zero.php';
}

/**
 * istanza principale di Zero.
 *
 */
function zero() 
{
	return Zero::get_instance();
}

// Globale per retro-compatibilità.
$GLOBALS['zero'] = zero();