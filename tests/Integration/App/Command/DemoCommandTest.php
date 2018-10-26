<?php

namespace Test\Integration\App\Command;

use App\Command\DemoCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;

class DemoCommandTest extends TestCase
{
    /**
     * @var CommandTester
     */
    private $commandTester;

    public function setUp()
    {
        $this->commandTester = new CommandTester(new DemoCommand());
    }

    public function testCallingWithoutName()
    {
        $this->commandTester->execute([]);
        $expectedOutput = 'Hello world...'.PHP_EOL;

        $this->assertEquals(0, $this->commandTester->getStatusCode());
        $this->assertEquals($expectedOutput, $this->commandTester->getDisplay());
    }

    public function testCallingWithName()
    {
        $this->commandTester->execute([
            'name' => 'test',
        ]);
        $expectedOutput = 'Hello world...'.PHP_EOL.'Random name: test'.PHP_EOL;

        $this->assertEquals(0, $this->commandTester->getStatusCode());
        $this->assertEquals($expectedOutput, $this->commandTester->getDisplay());

        $this->commandTester->execute([
            'name' => 'other name',
        ]);
        $expectedOutput = 'Hello world...'.PHP_EOL.'Random name: other name'.PHP_EOL;

        $this->assertEquals(0, $this->commandTester->getStatusCode());
        $this->assertEquals($expectedOutput, $this->commandTester->getDisplay());
    }
}
