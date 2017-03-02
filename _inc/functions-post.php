<?php



/**
 * Get posts
 *
 * Safe output
 *
 * @param string $str
 * @return string
 */
function get_posts()
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
		$result = $query->fetchAll( PDO::FETCH_OBJ );
	}
	else {
		$result = [];
	}

	return $result;

}



function format_post( $post )
{

	return $post;

}



?>
