<?php
/**
 * Created by VS CODE.
 * User: Niaz
 * Date: 3/30/2024
 * Time: 3:56 PM
 */

class DatabaseSettings
{
	var $settings;

	function getSettings()
	{
		// Database variables
		// Host name
		$settings['dbhost'] = 'localhost';
		// Database name
		$settings['dbname'] = 'treasure';
		// Username
		$settings['dbusername'] = 'root';
		// Password
		$settings['dbpassword'] = '';
		
		return $settings;
	}
}
?>