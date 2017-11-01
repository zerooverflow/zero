<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


final class Zero 
{
	
	public $version = '1.0.0';

	private static $instance;

	public static function get_instance()
	{
		if( null === self::$instance ){
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function includes()
	{
		
		include_once( ZERO_ABSPATH . '/includes/class-zero-autoloader.php' );
		
		/*
		 * INCLUDES
		 */
		
		if ( $this->is_request( 'admin' ) ) {
			include_once( ZERO_ABSPATH . '/includes/admin/class-zero-admin.php' );
		}
		
		if ( $this->is_request( 'frontend' ) ) {
			$this->frontend_includes();
		}

	}
	
	public function frontend_includes()
	{
		/*
		 * FRONTEND INCLUDES 
		 */
	}
	
	public function init_hooks()
	{
		add_action( 'init', array( $this, 'init' ), 0 );
	}
	
	public function init()
	{}


	static function install(){
		$upload = wp_upload_dir();
		$upload_dir = $upload['basedir'];
		$upload_dir = $upload_dir . '/zero';
		if (! is_dir($upload_dir)) {
		   mkdir( $upload_dir, 0700 );
		}
	}
	
	private function __clone() 
	{}
	
	private function __wakeup()
	{}
	
	private function __construct()
	{

		$this->define_constants();
		$this->includes();
		$this->init_hooks();
	}
	
	private function define_constants()
	{
		$this->define('ZERO_ABSPATH', dirname( ZERO_PLUGIN_FILE ));
	}
	
	private function define( $name, $value )
	{
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
	
	private function is_request( $type )
	{
		switch ( $type ) {
			case 'admin' :
				return is_admin();
			case 'ajax' :
				return defined( 'DOING_AJAX' );
			case 'cron' :
				return defined( 'DOING_CRON' );
			case 'frontend' :
				return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
		}
	}

	


}
