<?php
define("DB_HOST", "<insert host address here>");
define("DB_USER", "<insert host username here>");
define("DB_PASS", "<insert host password here>");
define("DB_DATABASE", "<insert host database name here>");
define("DB_TABLE", "<insert host database table name here>");

/*
 * General DB constants 
 */
if(!defined("KEY_PLATFORM"))	define("KEY_PLATFORM", "PLATFORM");
if(!defined("KEY_NETWORK")) 	define("KEY_NETWORK", "NETWORK");
if(!defined("TO_UID")) 			define("TO_UID", "TO_UID");
if(!defined("FROM_UID")) 		define("FROM_UID", "FROM_UID");
if(!defined("DATA")) 			define("DATA", "DATA");
if(!defined("NETWORK")) 		define("NETWORK", "NETWORK");

/*
 * Verification DB constants
 */
define("KEY_VID", "VID");
define("KEY_V_CODE", "V_KEY");

/*
 * VID MD5 Helper
 */
 define("MD5_VID", "<insert random string of characters here>")
?>