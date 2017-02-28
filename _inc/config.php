<?php

// show all errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


// require stuff
if( !session_id() ) @session_start();
require_once 'vendor/autoload.php';


// global variables
$base_url = 'http://localhost:8888/todoapp';


// connect to db
$database = new medoo([
	'database_type' => 'mysql',
	'database_name' => 'todo',
	'server'        => 'localhost',
	'username'      => 'root',
	'password'      => 'root',
	'charset'       => 'utf8'
]);


// global functions
require_once 'functions.php';