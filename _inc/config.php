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

// try {
//
// 	$query = $db->query("SELECT * FROM posts");
//
// 	echo "<pre>";
// 	print_r( $query->fetchAll( PDO::FETCH_ASSOC ) );
// 	echo "</pre>";
//
//
// } catch ( PDOException $e ) {
// 	$error = date( 'j M Y, G:i' ) . PHP_EOL;
// 	$error .= '----------------------------------------------' . PHP_EOL;
// 	$error .= $e->getMessage() . ' in [ ' . __FILE__ . '] on line '. __LINE__ . PHP_EOL;
//
// 	file_put_contents( APP_PATH . '/_inc/error.log', $error.PHP_EOL, FILE_APPEND );
//
// }



// global functions
require_once 'functions-general.php';
require_once 'functions-string.php';
require_once 'functions-post.php';
