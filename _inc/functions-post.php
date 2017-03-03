<?php

/**
 * Get post
 *
 * Get individual post
 *
 * @param  integer
 * @param  bool
 * @return string
*/
function get_post( $id = 0, $auto_format = true )
{

	if (!$id && !$id = segment(2)){

		return false;

	}

	global $db;

	$query = $db->prepare("
		SELECT p.*, GROUP_CONCAT( t.tag SEPARATOR ' | ' ) AS tags
		FROM posts p
		LEFT JOIN posts_tags pt ON  ( p.id = pt.post_id )
		LEFT JOIN tags t ON ( t.id = pt.tag_id )
		WHERE p.id = :id
		GROUP BY p.id
	");

	$query->execute(['id' => $id]);

	if ( $query->rowCount() === 1 ) {
		$result = $query->fetch( PDO::FETCH_ASSOC );

		if ( $auto_format )
		{
			$result = format_post($result);
		}
	}
	else {
		$result = [];
	}

	return $result;

}



/**
 * Get posts
 *
 * Safe output
 *
 * @param  bool
 * @return string
 */
function get_posts( $auto_format = true )
{
	global $db;

	$query = $db->query("
		SELECT p.*, GROUP_CONCAT( t.tag SEPARATOR ' | ' ) AS tags
		FROM posts p
		LEFT JOIN posts_tags pt ON  ( p.id = pt.post_id )
		LEFT JOIN tags t ON ( t.id = pt.tag_id )
		GROUP BY p.id
	");

	if ( $query->rowCount() ) {
		$results = $query->fetchAll( PDO::FETCH_ASSOC );


		if ( $auto_format )
		{
			$results = array_map('format_post', $results);
		}
	}
	else {
		$results = [];
	}

	return $results;

}


/**
 * Format post
 *
 *
 * Security against XSS
 *
 *
 * @param	    Array
 * @return	    string
 */
function format_post( $post )
{

	// Transform to text
	$post['title'] = plain( $post['title'] );

	//Transform to text
	$post['text'] = plain( $post['text'] );

	// Transform to text
	$post['slug'] = plain( $post['slug'] );




	// Split tags
	$post['tags'] = explode('|', $post['tags']);

	// Transform tags to text
	$post['tags'] = array_map( 'plain', $post['tags']);

	// Join tags
	$post['tags'] = implode(' | ', $post['tags']);

	// Creating link
	$post['link'] = BASE_URL . '/post/'. $post['id'] . '/' . $post['slug'];

	// Control if $post['link'] is realy url
	$post['link'] = filter_var( $post['link'], FILTER_SANITIZE_URL);

	// Transform to UNIX time format
	$post['timestamp'] = strtotime( $post['created_at'] );
	$post['time'] = date('j M Y G:i', $post['timestamp']);
	$post['date'] = date('Y-m-d', $post['timestamp']);

	$post['teaser'] = word_limiter( $post['text'], 20 );
	// return $post like object
	return (object) $post;

}


