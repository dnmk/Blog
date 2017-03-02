<?php

// show all errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


// require stuff
if( !session_id() ) @session_start();
require_once 'vendor/autoload.php';



// Constants variables
define( 'BASE_URL' , 'http://localhost:8888');
define( 'APP_PATH' , realpath( __DIR__ . '/../') );
//??? realpath = you can manipulate with location directory



// Connecting to database
$config = [
			'db' => [
				'type'		=> 	'mysql',
				'name'		=> 	'blog',
				'server'      	=> 	'localhost',
				'username'    	=> 	'root',
				'password'    	=> 	'root',
				'charset'     	=> 	'utf8'
			]
];

$db = new PDO(

	"{$config['db']['type']}:
	host={$config['db']['server']};
	dbname={$config['db']['name']};
	charset={$config['db']['charset']}",
	$config['db']['username'], $config['db']['password']

);


$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

// global functions
require_once 'functions.php';
