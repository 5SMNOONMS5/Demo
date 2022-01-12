<?php

namespace StephenChen\Demo\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use StephenChen\Demo\Demo;
use StephenChen\Demo\Show;

class DemoTest extends TestCase
{
    public function test_show()
    {
        $result = 'show';                               // Arrange
        $show   = new Show();                           // Act
        $this->assertSame($show->echoShow(), $result);  // Assert
    }

    public function test_demo()
    {
        $result = 'demo_show';                          // Assert

        $mock = m::mock(Show::class);             // Act
        $mock->shouldReceive('echoShow')
            ->once()
            ->andReturn('show');
        $demo = new Demo($mock);

        $this->assertEquals($result, $demo->echoDemo()); // Assert
    }
}
