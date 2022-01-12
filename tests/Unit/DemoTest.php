<?php

namespace StephenChen\Demo\Tests;

use Mockery as m;
use Orchestra\Testbench\TestCase;
use StephenChen\Demo\Demo;
use StephenChen\Demo\Show;

class DemoTest extends TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app[ 'config' ]->set('demo.value', 'a demo value');
    }

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

    public function test_get_config_value_from_demo_calss()
    {
        $mock  = m::mock(Show::class);    // Act
        $demo  = new Demo($mock);
        $value = $demo->getValueFromConfig();

        $this->assertNotNull($value);           // Assert
        $this->assertNotEmpty($value);
    }
}
