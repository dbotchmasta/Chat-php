<?php

require_once __DIR__."/../config.php";
require_once __DIR__."/../vendor/mylib/mylib.php";

require_once __DIR__."/../app/model/ChangeMassages.php";
use model\ChangeMassages;

class ChangeMassagesTests extends \PHPUnit\Framework\TestCase
{
	private $changeMassages;

	protected function setUp()
	{
		$this->changeMassages = new changeMassages();
	}

	protected function tearDown()
	{
		$this->changeMassages = NULL;
	}


	/**
	*@DataProvider providerAddMassage
	*/
	public function testAddMassage($text, $chat_id, $user_id, $result)
	{
		$this->assertEquals($result, $this->changeMassages->addMassage($text, $chat_id, $user_id));
	}

	public function providerAddMassage()
	{
		return[
		["Hello", -3, -1, 6],
		["1", -1, -1, 13],
		["Privet", -5, -1, 1],
	
		];
	}


	/**
	*@DataProvider providerRemoveMassage
	*/
	public function testRemoveMassage($massage_id, $result)
	{
		$this->assertEquals($result, $this->changeMassage->removeMassage($massage_id));
	}

	
	public function providerRemoveMassage()
	{
		return[
		[-13,0],
		[-2,0],
		[-13,1],

		];
	}


	/**
	*@DataProvider providerMassagePermissionCheck
	*/
	public function testMassagePermissionCheck($user_id, $massage_id, $result)
	{
		$this->assertEquals($result, $this->changeMassages->massagePermissionCheck($user_id, $massage_id));
	}

	public function providerMassagePermissionCheck()
	{
		return[
		[-4,-9,0],
		[-2,-8,0],
		[-1,-11,1],

		];
	}
}