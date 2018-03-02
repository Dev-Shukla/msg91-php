<?php
namespace Sender;

use PHPUnit\Framework\TestCase;
use Sender\Log\Log;

/**
* This test class for testing LogTest class
*/

class LogTest extends TestCase
{
    public $log;
    public function setUp()
    {
        $this->log = new Log("Req & Res");
        $this->dateTime = date_create('now')->format('Y-m-d');
        $this->path = realpath(__DIR__.'/../../src/Sender/Log/Logger');
    }
    public function tearDown()
    {
        $this->log = null;
    }
    public function testError()
    {
        $this->log->error(["Request:"], ['log test value'], ['Request value']);
        $this->assertFileIsReadable($this->path.'/Error_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Error_'.$this->dateTime.'.log');

        $this->log->error(["Request:"], [43567673547], [73465753636]);
        $this->assertFileIsReadable($this->path.'/Error_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Error_'.$this->dateTime.'.log');

        $this->log->error(["Request:"], ["43567673547"], [73465753636]);
        $this->assertFileIsReadable($this->path.'/Error_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Error_'.$this->dateTime.'.log');

        $this->log->error(["Request:"], [4356.7673547], [7346.5753636]);
        $this->assertFileIsReadable($this->path.'/Error_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Error_'.$this->dateTime.'.log');

        $this->log->error(["Request:"], [true], ["true"]);
        $this->assertFileIsReadable($this->path.'/Error_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Error_'.$this->dateTime.'.log');

        $this->log->error(["Request:"], [true], [true]);
        $this->assertFileIsReadable($this->path.'/Error_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Error_'.$this->dateTime.'.log');

        $this->log->error(["Request45555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555"]);
        $this->assertFileIsReadable($this->path.'/Error_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Error_'.$this->dateTime.'.log');

        $this->log->error(["455544444444444444444444444444444"]);
        $this->assertFileIsReadable($this->path.'/Error_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Error_'.$this->dateTime.'.log');

        $this->log->error([true]);
        $this->assertFileIsReadable($this->path.'/Error_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Error_'.$this->dateTime.'.log');

        $this->log->error([34534534534343453444334]);
        $this->assertFileIsReadable($this->path.'/Error_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Error_'.$this->dateTime.'.log');

        $this->log->error([5676575675676565], [true]);
        $this->assertFileIsReadable($this->path.'/Error_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Error_'.$this->dateTime.'.log');
    }
    public function testInfo()
    {
        $this->log->info(["Request:"], ['log test value'], ['Request value']);
        $this->assertFileIsReadable($this->path.'/Info_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Info_'.$this->dateTime.'.log');

        $this->log->info(["Request:"], [43567673547], [73465753636]);
        $this->assertFileIsReadable($this->path.'/Info_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Info_'.$this->dateTime.'.log');

        $this->log->info(["Request:"], ["43567673547"], [73465753636]);
        $this->assertFileIsReadable($this->path.'/Info_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Info_'.$this->dateTime.'.log');

        $this->log->info(["Request:"], [4356.7673547], [7346.5753636]);
        $this->assertFileIsReadable($this->path.'/Info_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Info_'.$this->dateTime.'.log');

        $this->log->info(["Request:"], [true], ["true"]);
        $this->assertFileIsReadable($this->path.'/Info_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Info_'.$this->dateTime.'.log');

        $this->log->info(["Request:"], [true], [true]);
        $this->assertFileIsReadable($this->path.'/Info_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Info_'.$this->dateTime.'.log');

        $this->log->info(["Request45555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555"]);
        $this->assertFileIsReadable($this->path.'/Info_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Info_'.$this->dateTime.'.log');

        $this->log->info(["455544444444444444444444444444444"]);
        $this->assertFileIsReadable($this->path.'/Info_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Info_'.$this->dateTime.'.log');

        $this->log->info([true]);
        $this->assertFileIsReadable($this->path.'/Info_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Info_'.$this->dateTime.'.log');

        $this->log->info([34534534534343453444334]);
        $this->assertFileIsReadable($this->path.'/Info_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Info_'.$this->dateTime.'.log');

        $this->log->info([5676575675676565], [true]);
        $this->assertFileIsReadable($this->path.'/Info_'.$this->dateTime.'.log');
        $this->assertFileIsWritable($this->path.'/Info_'.$this->dateTime.'.log');
    }
}
