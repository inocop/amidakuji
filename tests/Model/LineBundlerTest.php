<?php

namespace Kinoue\AmidakujiTest;

use Kinoue\Amidakuji\Model\LineBundler;

class LineBundlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LineBundler
     */
    protected $lineBundler;

    protected function setUp()
    {
        parent::setUp();
    }

    public function test初期設定の入力を確認(){
        $this->lineBundler = new LineBundler();


    }
}