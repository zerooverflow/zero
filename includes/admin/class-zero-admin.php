<?php
/**
 * Zero Admin
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Zero_Admin
{
	public function __construct() 
	{
		add_action( 'init', array( $this, 'includes' ) );
		add_action( 'current_screen', array( $this, 'conditional_includes' ) );
		add_action( 'admin_init', array( $this, 'buffer' ), 1 );
	}
	
	public function buffer() 
	{
		ob_start();
	}
	
	public function includes() 
	{
		include_once( dirname( __FILE__ ) . '/class-zero-admin-menus.php' );
	}
	
	public function conditional_includes() 
	{
		
		if ( ! $screen = get_current_screen() ) {
			return;
		}
	
		switch ( $screen->id ) {
			case 'dashboard' :	
			case 'options-permalink' :
			case 'plugins' :
			case 'update-core' :
			case 'users' :
			case 'user' :
			case 'profile' :
			case 'user-edit' :
		}
		
		
	}
}

return new Zero_Admin();