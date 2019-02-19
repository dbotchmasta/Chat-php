<?php

require_once __DIR__."/../config.php";
require_once __DIR__."/../vendor/mylib/mylib.php";

require_once __DIR__."/../app/model/ChangeChat.php";
use model\ChangeChat;

class ChangeChatTests extends \PHPUnit\Framework\TestCase
{
	private $changeChat;

	protected function setUp()
	{
		$this->changeChat = new ChangeChat();
	}

	protected function tearDown()
	{
		$this->changeChat = NULL;
	}


	/**
	*@DataProvider providerCreatChat
	*/
	public function testCreateChat($owner_id, $title, $result)
	{
		$this->assertEquals($result, $this->changeChat->creatChat($owner_id, $title));
	}

	public function providerCreatChat()
	{
		return[
		[-7,"11",-6],
		[-1,"22",-7],
		[-7,"33ò",-8],
	
		];
	}


	/**
	*@DataProvider providerAddUsersInChat
	*/
	public function testAddUsersInChat($ids, $chat_id, $invitor_id, $result)
	{
		$this->assertEquals($result, $this->changeChat->addUsersInChat($ids, $chat_id, $invitor_id));
	}

	
	public function providerAddUsersInChat()
	{
		return[
		["s,-4,-24", -4, -2, 0],
		["-5,-4", -1, -1, 0],
		["s,-27", -6, -3, 0],

		];
	}


	/**
	*@DataProvider providerCheckUserInChat
	*/
	public function testCheckUserInChat($user_id, $chat_id, $result)
	{
		$this->assertEquals($result, $this->changeChat->checkUserInChat($user_id, $chat_id));
	}

	public function providerCheckUserInChat()
	{
		return[
		[-1,-1,0],
		[-12, -1, 0],
		[-27, -4, 0],

		];
	}


	/**
	*@DataProvider providerCountUsersInChat
	*/
	public function testCountUsersInChat($ids, $chat_id, $result)
	{
		$this->assertEquals($result, $this->changeChat->countUsersInChat($ids, $chat_id));
	}

	public function providerCountUsersInChat()
	{
		return[
		["-1,-2", -1, 1],
		["-1,-24", -3, 2],
		["-9,-27", -2, 0],

		];
	}


	/**
	*@DataProvider providerCheckInviteInChat
	*/
	public function testCheckInviteInChat($user_id, $chat_id, $invitor_id, $result)
	{
		$this->assertEquals($result, $this->changeChat->checkInviteInChat($user_id, $chat_id, $invitor_id));
	}

	public function providerCheckInviteInChat()
	{
		return[
		[-1, -1, -1, 0],
		[-4, -3, -2, 0],
		[-12, -1, -2, 0],

		];
	}


	/**
	*@DataProvider providerRemoveUserFromChat
	*/
	public function testRemoveUserFromChat($user_id, $chat_id, $result)
	{
		$this->assertEquals($result, $this->changeChat->removeUserFromChat($user_id, $chat_id));
	}

	public function providerRemoveUserFromChat()
	{
		return[
		[-10, -1, 0],
		[-8, -2, 0],
		[-8, -1, 0],

		];
	}


	/**
	*@DataProvider providerRemoveChat
	*/
	public function testRemoveChat($chat_id, $result)
	{
		$this->assertEquals($result, $this->changeChat->removeChat($chat_id));
	}

	public function providerRemoveChat()
	{
		return[
		[-5,0],
		[-6,0],
		[-3,0],

		];
	}


	/**
	*@DataProvider providerChatPermissionsCheck
	*/
	public function testChatPermissionsCheck($user_id, $chat_id, $result)
	{
		$this->assertEquals($result, $this->changeChat->chatPermissionsCheck($user_id, $chat_id));
	}

	public function providerChatPermissionsCheck()
	{
		return[
		[-8,-1,0],
		[-2,-3,0],
		[-1,-5,0],

		];
	}


	/**
	*@DataProvider providerChatOutputLastMsg
	*/
	public function testChatOutputLastMsg($chat_id, $start, $amount, $result)
	{
		$this->assertEquals($result, $this->changeChat->chatOutputLastMsg($chat_id, $start, $amount));
	}

	public function providerChatOutputLastMsg()
	{
		return[
		[-2, "-3", -2, 0],
		[-1, "-9", -1, 0],
		[-3, "-5", -3, 0],
	
		];
	}
}