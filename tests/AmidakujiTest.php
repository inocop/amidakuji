<?php

namespace Kinoue\Amidakuji;

class AmidakujiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Amidakuji
     */
    protected $skeleton;

    protected function setUp()
    {
        parent::setUp();
        $this->skeleton = new Amidakuji;
    }

    public function testNew()
    {
        $actual = $this->skeleton;
        $this->assertInstanceOf('\Kinoue\Amidakuji\Amidakuji', $actual);
    }
}
