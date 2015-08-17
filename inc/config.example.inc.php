<?php
$srv = $_SERVER['DOCUMENT_ROOT'];
ini_set('include_path', ".:../inc/pear/");

define('SID', session_id()); 
define('IP', $_SERVER['REMOTE_ADDR']);

define('DEFAULT_SEITE', 'willkommen');

define('DIR_CLASSES', '../inc/class/');
define('DIR_PEAR', '../inc/pear/');
define('DIR_SEITE', '../inc/seiten/');
define('DIR_CAPTCHA', './tmp/captcha/');

define('DB_SERVER', 'MYSQL5-SERVER');
define('DB_NAME', 'DB-NAME');
define('DB_USER', 'DB-USER');
define('DB_PWD', 'DB-PASS');

define('CSV_PWD', 'CSU-PWD');

$nav = array(
				'willkommen' => 	"Willkommen",
				'name' =>		'Schülerdaten',
				'erzb' =>		isset($_SESSION['alter']) && $_SESSION['alter'] < 18 ? "Erziehungs-berechtigte" : "Kontaktperson",
				'ausbildung' =>		'Ausbildungsberuf',
				'schule' =>		'Schulbildung',
				'ende' => 		'Bestätigung'
			);
			
$navRowspan = count($nav)+1;

$form = $_POST['form'];
?>
