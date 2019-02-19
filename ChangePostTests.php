<?php

require_once __DIR__."/../config.php";
require_once __DIR__."/../vendor/mylib/mylib.php";

require_once __DIR__."/../app/model/ChangePost.php";
use model\ChangePost;

class ChangePostTests extends \PHPUnit\Framework\TestCase
{
	private $changePost;

	protected function setUp()
	{
		$this->changePost = new changePost();
	}

	protected function tearDown()
	{
		$this->changePost = NULL;
	}


	/**
	*@DataProvider providerAddPost
	*/
	public function testAddPost($user_id, $wall_id, $text, $result)
	{
		$this->assertEquals($result, $this->changePost->addPost($user_id, $wall_id, $text));
	}

	public function providerAddPost()
	{
		return[
		[17, 2, "проверка", 34],
		[5, 3, "проверка1", 35],
		[6, 4, "проверка2",36],
	
		];
	}


	/**
	*@DataProvider providerRemovePost
	*/
	public function testRemovePost($post_id, $user_id, $result)
	{
		$this->assertEquals($result, $this->changePost->removeMassage($post_id, $user_id));
	}

	
	public function providerRemovePost()
	{
		return[
		[27, 1, 0],
		[28, 2, 0],
		[29, 3, 0],

		];
	}

}