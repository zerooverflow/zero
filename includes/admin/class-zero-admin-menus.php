<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Zero_Admin_Menus', false ) ) :


class Zero_Admin_Menus{
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}
	
	public function admin_menu() {
		
		add_menu_page( __( 'Zero', 'zero' ), __( 'Zero', 'zero' ), 'manage_options',  'zero', array($this,'menu_page'), 'dashicons-marker', 46.666666 );

	}
	
	public function menu_page(){
		Zero_Admin_Settings::output();
	}
	
	
}

endif;

return new Zero_Admin_Menus();