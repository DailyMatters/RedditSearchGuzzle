<?php

include_once( 'src/Searcher.php' );

//Calling the storeSearch function search for 'composer' on the 'php' subreddit
storeSearch( 'php', 'composer', 'hot', 2);

/**
* This function will execute a search and store the result in a file called data.txt
*/
function storeSearch( $subreddit, $query, $options, $results ){

	echo '*** SEARCHING *** ';

	$search = new Searcher();
	$result = $search->execSearch( $subreddit, $query, $options, $results );

	file_put_contents( 'data.txt', $result, FILE_APPEND);

	echo ' *** SEARCH COMPLETE ***';
}

// Do makeSearch function that will return a json with the search result
// Do printResult function that will print the results of a search in a table

function doSearch( $subreddit, $query, $options, $results ){

	$search = new Searcher();
	$result = $search->execSearch( $subreddit, $query, $options, $results );

	return $result;
}