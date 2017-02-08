<?php

namespace redditSearchGuzzle\Searcher\Test;

use redditSearchGuzzle\Searcher\Searcher;

class SearcherTest extends \PHPUnit_Framework_TestCase {

	//Test if the request is correct and shows results
	public function testNotEmpty(){

		$search = new Searcher();
		$result = $search->execSearch( "php", "composer", "new" );

		$this->assertNotEmpty( $result );
	}

	//Tests for invalid search options
	public function testNotValidOption(){

		$search = new Searcher();
		$result = $search->execSearch( "php", "yolo", "yolo" );

		$this->assertEquals( $result, false );
	}

	//Tests for valid search options
	public function testValidOption(){

		$search = new Searcher();
		$result = $search->execSearch( "php", "composer", "hot" );

		$this->assertNotEquals( $result, false );
	}

	//Tests for invalid limit input
	public function testInvalidStringLimit(){

		$search = new Searcher();
		$result = $search->execSearch( "php", "composer", "hot", "lol" );

		$this->assertEquals( $result, false );
	}

	//Tests for invalid limit input
	public function testInvalidFloatLimit(){

		$search = new Searcher();
		$result = $search->execSearch( "php", "composer", "hot", 5.5 );

		$this->assertEquals( $result, false );
	}

	//Tests if limits are working
	public function testLimitTrue(){

		$search = new Searcher();
		$result = $search->execSearch( "php", "composer", "hot", 2 );

		$size = json_decode($result, true);
		$this->assertEquals( count($size), 2 );
	}

	//Tests if limits are working
	public function testLimitFalse(){

		$search = new Searcher();
		$result = $search->execSearch( "php", "composer", "hot", 5 );

		$size = json_decode($result, true);
		$this->assertNotEquals( count($size), 3 );
	}
}
