<?php

namespace VisualiserBundle\Tests\Controller;

class ToDoControllerTest extends \PHPUnit\Framework\TestCase
{
	
	public $subjectController;
	
	public function setUp()
	{
		$this->subjectController = new \VisualiserBundle\Controller\ToDoController();
	}
	
	public function testSetup()
	{
		$this->assertInstanceOf(\VisualiserBundle\Controller\ToDoController::class, $this->subjectController);
	}
}
