<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Zero_Admin_Menus', false ) ) :


class Zero_Admin_Menus
{

	public $settings_page;

	public function __construct()
	{
		$this->settings_page = new Zero_Admin_Settings();		
	}
	
}

endif;

return new Zero_Admin_Menus();