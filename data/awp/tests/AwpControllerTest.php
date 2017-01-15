<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Http\Controllers\AwpController;

class AwpControllerTest extends TestCase
{
  private $target;

  public function setup()
  {
    $this->target = new AwpController();
    parent::setup();
  }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInitInput()
    {
      $methodA = new ReflectionMethod($this->target, 'initInput');
      $methodA->setAccessible(true);
      $input = $methodA->invoke($this->target, array());

      $this->assertEquals('0', $input['no']);
      $this->assertEquals('no title', $input['title']);
    }

    public function testCreateReplaceString()
    {
      $methodA = new ReflectionMethod($this->target, 'createReplaceString');
      $methodA->setAccessible(true);
      $input = $methodA->invoke($this->target, 'test');

      $this->assertEquals('${test}', $input);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidArgument()
    {
      $methodA = new ReflectionMethod($this->target, 'createReplaceString');
      $methodA->setAccessible(true);
      $input = $methodA->invoke($this->target, 0);
    }
}
