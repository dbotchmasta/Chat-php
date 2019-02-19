<?php

require_once __DIR__."/../config.php";
require_once __DIR__."/../vendor/mylib/mylib.php";

require_once __DIR__."/../app/model/OutputPosts.php";
use model\OutputPosts;

class ChangePostTests extends \PHPUnit\Framework\TestCase
{
	private $outputPosts;

	protected function setUp()
	{
		$this->outputPosts = new outputPosts();
	}

	protected function tearDown()
	{
		$this->outputPosts = NULL;
	}


	/**
	*@DataProvider providerGetFriendsFeed
	*/
	public function testGetFriendsFeed($ids, $amount, $start, $result)
	{
		$this->assertEquals($result, $this->outputPosts->getFriendsFeed($ids, $amount, $start));
	}

	public function providerGetFriendsFeed()
	{
		return[
		["-2,-4,-1",1,-11,"dsfdsfsd"],
		["-3,-5,-6",1,-9,"sf"],
		["-7,-17,-23",1,-16,"sf" ],
	
		];
	}


	/**
	*@DataProvider providerGetUserFeed
	*/
	public function testGetUserFeed($id, $amount, $start, $result)
	{
		$this->assertEquals($result, $this->outputPosts->getUserFeed($id, $amount, $start));
	}

	
	public function providerGetUserFeed()
	{
		return[
		[-1, 1, -16, "asdas"],
		[-1, 1, -18, "новыйкоммент"],
		[-1, 1, -22, "sadas"],

		];
	}

	/**
	*@DataProvider providerWallFeed
	*/
	public function testRemovePost($id, $amount, $start, $result)
	{
		$this->assertEquals($result, $this->outputPosts->getWallFeed($id, $amount, $start));
	}

	
	public function providerWallFeed()
	{
		return[
		[-1, 1, -14, "sf"],
		[-3, 1, -13, "dsfdsfsd"],
		[-5, 1, -12, "dsfdsfsd"],

		];
	}


}