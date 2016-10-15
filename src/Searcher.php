<?php

namespace redditSearchGuzzle\Searcher;

use GuzzleHttp\Client;
use GuzzleHttp\EntityBody;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;

class Searcher {

	/**
 	 * This method queries the reddit API for searches
 	 *
 	 * @param $subreddit The subreddit to search
 	 * @param $query The term to search for
 	 * @param $options The filter used to search
 	 * @param $results The number of results to return
 	 *
	**/
	public function execSearch($subreddit = 'php', $query, $options, $results = 10) {

		//Checks if options are valid
		if ($this->validateOptions($options) !== false && $this->validateLimit($results) !== false) {

			$roundedResults = round( $results );

			//Executes an http request using guzzle
			$client = new Client(
				[
					'base_uri' => 'https://reddit.com/r/' . $subreddit . "/search.json?q=" . $query . "&restrict_sr=1&sort=" . $options . "&limit=" . $roundedResults,
					'headers' => ['User-Agent' => 'testing/1.0'],
					'verify' => false
				]
			);
			$response = $client->request("GET");

			$body = $response->getBody(true);

			return $body;
		}
		else {
			return false;
		}
	}

	/**
	 * Checks if the option passed is valid, false in case it's not
	 */
	protected function validateOptions( $options ){

		$possible = array( 'new', 'hot', 'top', 'relevance', 'comments' );

		if( in_array( $options, $possible) ){
			return $options;
		}
		else {
			return false;
		}

	}

	/**
	 * Checks if the limit passed is valid
	 */
	protected function validateLimit( $limit ){

		if( is_integer( $limit )){
			return $limit;
		}
		else {
			return false;
		}

	}

}
