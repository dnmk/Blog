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
	 * Tries to fetch a DB post based on URI segnemt
	 * Returns false if unable
	 *
	 * @param integer id of the post to get
	 * @return DB post or false
	 */
	function get_item( $id = 0 )
	{
		// if we have no id, or if id is empty
		if ( $id = segment(2) ) {
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





	/**
	 * Asset
	 *
	 * Creates absolute URL to asset file
	 *
	 * @param  string		$path		path to asset file
	 * @param  string		$base		asset base url
	 * @return string		absolute URL to asset file
	 */
	function asset( $path, $base = BASE_URL.'/assets/' )
	{

		//Removing slashes
		$path = trim( $path, '/' );

		// Testing if this is real URL
		return filter_var($base.$path, FILTER_SANITIZE_URL);

	}





	/**
	 * Get segments
	 *
	 * From a url like http://example.com/edit/1
	 * it creates an array of URL segments [ edit, 1 ]
	 *
	 *
	 * @return array
	 */
	function get_segments()
	{

		$current_url = 'http' .
			( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] == 'on'  ? 's://' : '://') .
			$_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];

		$path = str_replace( BASE_URL, '', trim( $current_url, '/' ) );
		$path = trim( parse_url($path, PHP_URL_PATH), '/' );

		$segments = explode( '/', $path );

		return $segments;

	}





	/**
	 * Get segment
	 *
	 * From a url like http://example.com/edit/1
	 *
	 * @param    $index
	 * @return   id
	 */
	function segment( $index )
	{

		$segments = get_segments();
		return isset( $segments[ $index - 1 ] ) ? $segments[ $index - 1 ] : false;

	}





	/**
	 * redirect
	 *
	 * It redirect you to different site
	 *
	 * @param   $page
	 * @param   $status_code
	 * @return  different site
	 */
	function redirect( $page, $status_code = 302 )
	{

		if ( $page === 'back' )
		{
			$location = $_SERVER['HTTP_REFERER'];
		}
		else
		{
			$page = ltrim($page, '/');
			$location = BASE_URL . "/$page";
		}

		header("Location: $location", true, $status_code);
		die();
	}





	/**
	 * Catch error
	 *
	 * Capture errors to error.log
	 * ! You can use only if you have = try...catch exception
	 *
	 * @param  string		$e		PDOException
	 * @return string		        Capture Errors To File
	 */
	function get_error($e)
	{
		$error = date( 'j M Y, G:i' ) . PHP_EOL;
		$error .= '----------------------------------------------' . PHP_EOL;
		$error .= $e->getMessage() . ' in [ ' . __FILE__ . '] on line '. __LINE__ . PHP_EOL;
		file_put_contents( APP_PATH . '/_inc/error.log', $error.PHP_EOL, FILE_APPEND );
	}
