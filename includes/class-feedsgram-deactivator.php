<?php

/**
 * Fired during plugin deactivation
 *
 * @link       www.luziarte.dev
 * @since      1.0.0
 *
 * @package    Feedsgram
 * @subpackage Feedsgram/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Feedsgram
 * @subpackage Feedsgram/includes
 * @author     José Luziarte <joseyesfox@gmail.com>
 */
class Feedsgram_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		unregister_setting( 'fg_settings_group', 'fg_url_profile' );
		unregister_setting( 'fg_settings_group', 'fg_post_number' );
		delete_option( 'fg_post_number' );
		delete_option( 'fg_url_profile' );

	}

}
