<?php
/* Magnified Media Helper Files
 * First created 04-2014
 * @url        http://www.magnifiedonline.com
 * @author     travis@magnifiedonline.com
 */

	// site paths

		// url setting
		define('BASE_URL','/');
		define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT'] . '/');
		define('USERFILES_PATH', $_SERVER['DOCUMENT_ROOT'] . '/');


	// database

		// live server
		define('DB_HOST','localhost');
		define('DB_NAME','');
		define('DB_PORT','3306'); // default: 3306
		define('DB_USER','');
		define('DB_PASS','');

		// local server
		/*define('DB_HOST','localhost');
		define('DB_NAME',');
		define('DB_PORT','8889'); // default: 3306
		define('DB_USER','root');
		define('DB_PASS','root');*/

		// tables
		define('ADMIN_USERS_TABLE','users_admin');
		define('SITE_USERS_TABLE','users_site');

		// password salts
		define('SALT','');

		// data related
		define('RESULTS_PERPAGE','');


	// autoresponder system

		define('SYSTEM_FROM_EMAIL','');
		define('SYSTEM_FROM_NAME','');