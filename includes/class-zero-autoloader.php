<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Autoload class
 */
class Zero_Autoloader
{
	
	private $include_path = '';
	
	public function __construct() 
	{
		if ( function_exists( "__autoload" ) ) {
			spl_autoload_register( "__autoload" );
		}
	
		spl_autoload_register( array( $this, 'autoload' ) );
	
		$this->include_path = untrailingslashit( plugin_dir_path( ZERO_PLUGIN_FILE ) ) . '/includes/';
	}
	
	private function get_file_name_from_class( $class ) 
	{
		return 'class-' . str_replace( '_', '-', $class ) . '.php';
	}
	
	private function load_file( $path ) 
	{
		if ( $path && is_readable( $path ) ) {
			include_once( $path );
			return true;
		}
		return false;
	}
	
	public function autoload( $class ) 
	{
		
		$class = strtolower( $class );
		
		if ( 0 !== strpos( $class, 'zero_' ) ) {
			return;
		}
		
		$file  = $this->get_file_name_from_class( $class );
		$path  = '';
		
		if ( 0 === strpos( $class, 'zero_admin' ) ) {
			$path = $this->include_path . 'admin/';
		}
		
		if ( empty( $path ) || ! $this->load_file( $path . $file ) ) {
			$this->load_file( $this->include_path . $file );
		}
	}
	
}

new Zero_Autoloader();