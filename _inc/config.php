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
			'database' => [
				'database_type' => 'mysql',
				'database_name' => 'blog',
				'server'        => 'localhost',
				'username'      => 'root',
				'password'      => 'root',
				'charset'       => 'utf8'
			]
];

// global functions
require_once 'functions.php';
