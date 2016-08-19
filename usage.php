<?php

include_once( 'src/Searcher.php' );

//Calling the storeSearch function search for 'composer' on the 'php' subreddit
//storeSearch( 'php', 'composer', 'hot', 2);

/**
* This function will execute a search and store the result in a file called data.txt
*/
function storeSearch( $subreddit, $query, $options, $results ){

	echo '*** SEARCHING *** ';

	$search = new Searcher();
	$result = $search->execSearch( $subreddit, $query, $options, $results );

	file_put_contents( 'data.txt', $result, FILE_APPEND );

	echo ' *** SEARCH COMPLETE ***';
}


/**
* This function will execute a search
*
* @param $subreddit The subreddit to search
* @param $query The term to search
* @param $options The options that will impact the search
* @param $results the number of results returned
*
* @return $result A json array with the search results
*/
function doSearch( $subreddit, $query, $options, $results ){

	$search = new Searcher();
	$result = $search->execSearch( $subreddit, $query, $options, $results );

	return $result;
}