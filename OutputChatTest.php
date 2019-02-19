<?php

require_once __DIR__."/../config.php";
require_once __DIR__."/../vendor/mylib/mylib.php";

require_once __DIR__."/../app/model/OutputChats.php";
use model\OutputChats;

class OutputChatTests extends \PHPUnit\Framework\TestCase
{
	private $outputChats;

	protected function setUp()
	{
		$this->outputChats = new outputChats();
	}

	protected function tearDown()
	{
		$this->outputChats = NULL;
	}


	/**
	*@DataProvider providerGetChatFeed
	*/
	public function testGetChatFeed($id, $amount, $start, $result)
	{
		$this->assertEquals($result, $this->outoutChats->getChatFeed($id, $amount, $start));
	}

	public function providerGetChatFeed()
	{
		return[
		[-1, 2, -3, "sdsfds, как, 2018-12-09 21:12:17, NULL"],
		[-2, 1, -1, "sdsfds, ds, 2018-12-08 02:34:57, NULL"],
		[-4, 1, -1, "sdsfds, как, 2018-12-09 21:12:17, NULL"],
	
		];
	}
}