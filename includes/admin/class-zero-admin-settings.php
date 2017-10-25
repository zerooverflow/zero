<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Zero_Admin_Settings', false ) ) :

class Zero_Admin_Settings{
	
	public static function output(){
		include( dirname( __FILE__ ) . '/views/html-admin-settings.php' );
	}
}

endif;