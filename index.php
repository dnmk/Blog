<?php

	include_once '_inc/config.php';

	$routes = [

		'/' =>[
			'GET' => 'home.php'
		],

		'/post' => [
			'GET' => 'post.php',
			'POST' => '_inc/post-add.php'
		],

		'/edit' => [
			'GET' => 'edit.php',
			'POST' => '_inc/post-edit.php'
		],

		'/delete' => [
			'GET' => 'delete.php',
			'POST' => '_inc/post-delete.php'
		],

	];

	$page = segment(1);
	$method = $_SERVER[ 'REQUEST_METHOD' ];


	if ( ! isset( $routes["/$page"][$method] ) ) {
		show_404();
	}


	require $routes["/$page"][$method];

?>
