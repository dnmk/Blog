<?php

	/**
	 * Show 404
	 *
	 * Sends 404 not found header
	 * And shows 404 HTML page
	 *
	 * @return void
	 */
	function show_404()
	{
		header("HTTP/1.0 404 Not Found");
		include_once "404.php";
		die();
	}


	/**
	 * Get Item
	 *
	 * Tries to fetch a DB item based on $_GET['id']
	 * Returns false if unable
	 *
	 * @return DB item or false
	 */
	function get_item()
	{
		// if we have no id, or if id is empty
		if ( ! isset($_GET['id']) || empty($_GET['id']) ) {
			return false;
		}

		global $database;

		$item = $database->get("items", "text", [
			"id" => $_GET['id']
		]);

		if ( ! $item ) {
			return false;
		}

		return $item;
	}


	/**
	 * Is AJAX
	 *
	 * Determines if request was AJAXed into existence
	 *
	 * @return bool
	 */
	function is_ajax()
	{
		return ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
			strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest' );
	}


	/**
	 * Is Even
	 *
	 * Returns TRUE if $number is even
	 * FALSE if odd
	 *
	 * @param  integer  $number number in question
	 * @return boolean          true if even
	 */
	function is_even( $number )
	{
		return $number % 2 === 0;
	}


	/**
	 * Get Parity
	 *
	 * Returns string "even" for even numbers
	 * And, surprise, "odd" for odd numbers
	 *
	 * @param  integer $number number in question
	 * @return string          "even" if true, "odd" if false
	 */
	function get_parity( $number )
	{
		return is_even($number) ? 'even' : 'odd';
	}


	function redirect( $page, $status_code = 302 )
	{
		global $base_url;

		if ( $page === 'back' )
		{
			$location = $_SERVER['HTTP_REFERER'];
		}
		else
		{
			$page = ltrim($page, '/');
			$location = "$base_url/$page";
		}

		header("Location: $location", true, $status_code);
		die();
	}