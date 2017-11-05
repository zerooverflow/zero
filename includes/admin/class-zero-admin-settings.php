<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Zero_Admin_Settings', false ) ) :

class Zero_Admin_Settings
{
	private $santize_map;
    private $options;

		public function __construct()
		{
			$this->options = Zero::get_instance()->options;
			add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
			add_action( 'admin_init', array( $this, 'page_init' ) );
		}
	
		/**
		 * Add options page
		 */
		public function add_plugin_page()
		{
			// This page will be under "Settings"
			add_menu_page(
				'Zero', 
				'Zero', 
				'manage_options', 
				'zero-admin', 
				array( $this, 'create_admin_page' ),
				'dashicons-marker',
				46.666666 
			);
		}
	
		/**
		 * Options page callback
		 */
		public function create_admin_page()
		{
			include( dirname( __FILE__ ) . '/views/html-admin-settings.php' ); 
		}
	
		/**
		 * Register and add settings
		 */
		public function page_init()
		{
			
			register_setting(
				'zero_option_group', // Option group
				'zero_option_name', // Option name
				array( $this, 'sanitize' ) // Sanitize
			);
	
			add_settings_section(
				'setting_section_id', // ID
				'Impostazioni', // Title
				array( $this, 'print_section_info' ), // Callback
				'zero-admin' // Page
			);  

			$this->add_settings_field( array(
					'id'	=>	'maintenance_flag',
					'title'	=>	'Modalità Mantenimento', 
					'type'	=>	'checkbox'
					));
			
		}

		public function add_settings_field($args){

			if ( $args['type']=='checkbox') {
				$value = '1';
				$attribute = ( '1' == $this->options[$args['id']] ) ? 'checked' : '';
			}
			else {
				$value = isset( $this->options[$args['id']] ) ? esc_attr( $this->options[$args['id']] ) : '';
				$attribute = '';
			}

			add_settings_field(
				$args['id'],					
				$args['title'],			
				array( $this, 'helper_callback' ),
				'zero-admin',
				'setting_section_id',
				array (
					'type'		=> $args['type'],
					'name'		=> $args['id'], 
					'value'		=> $value,
					'attribute'	=> $attribute
					)
			);
			$this->sanitize_map[$args['id']] = $args['type'];
		}
	
		/**
		 * Sanitize each setting field as needed
		 *
		 * @param array $input Contains all settings fields as array keys
		 */
		public function sanitize( $input )
		{
			$new_input = array();

			foreach ( $input as $key=>$value){
				if (array_key_exists( $key, $this->sanitize_map)){
					$field = $this->sanitize_map[$key];
					
					switch ( $field) {
						case 'number':
							$new_input[$key] = absint( $input[$key] );
						break;
						
						default:
						$new_input[$key] =  sanitize_text_field( $input[$key] );

					}

				}
			}


			return $new_input;
		}
	
		/** 
		 * Print the Section text
		 */
		public function print_section_info()
		{
			print 'Impostazioni del plugin:';
		}


		public function helper_callback($params)
		{
			echo sprintf(
				'<input type="%1$s" id="%2$s" name="zero_option_name[%2$s]" value="%3$s" %4$s />',
				$params['type'], $params['name'], $params['value'], $params['attribute']
			);
		}

		
}

endif;