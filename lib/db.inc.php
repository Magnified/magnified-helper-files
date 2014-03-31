<?php
/* Magnified Media Helper Files
 * First created 04-2014
 * @url        http://www.magnifiedonline.com
 * @author     travis@magnifiedonline.com
 */

	// connect
	try {
		$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME .";port=" . DB_PORT,DB_USER,DB_PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->exec("SET NAMES 'utf8'");
	} catch (Exception $e) {
		echo "Could not connect to the database. Please contact website admin.";
		exit;
	}