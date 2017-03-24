<?php

namespace Kinoue\AmidakujiTest;

use Kinoue\Amidakuji\Model\Validation\LineValidation;
use Kinoue\Amidakuji\Model\LineBundler;
use Kinoue\Amidakuji\Model\CustomObject\HorizontalLineObject;

class LineBundlerTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    public function test指定した縦線に存在する横線オブジェクトが正しく取得できること()
    {
        $hLines = $this->getTestHorizontalObjectList();

        // リフレクションでprivate変数に代入
        $lineBundler = new LineBundler(new LineValidation());
        $refObject = new \ReflectionObject($lineBundler);
        $refProperty = $refObject->getProperty('hLineList');
        $refProperty->setAccessible(true);
        $refProperty->setValue($lineBundler, $hLines);

        $resultList = $lineBundler->getExistsHorizontalLineByX(3);

        // 2件取得されているか
        $this->assertCount(2, $resultList);

        // [3, 4, 5]が取得できているか
        $this->assertEquals($resultList[1]->getStartX(), 3);
        $this->assertEquals($resultList[1]->getStartY(), 4);
        $this->assertEquals($resultList[1]->getEndY(),   5);
        $this->assertEquals($resultList[1]->isDirectionRight(), true);;

        // [2, 6, 5]の横線が方向変換されて取得できているか
        $this->assertEquals($resultList[3]->getStartX(), 3);
        $this->assertEquals($resultList[3]->getStartY(), 5);
        $this->assertEquals($resultList[3]->getEndY(),   6);
        $this->assertEquals($resultList[3]->isDirectionRight(), false);
    }

    public function test指定した位置のひとつ上にある横線オブジェクトを正しく取得できること()
    {
        $hLines = $this->getTestHorizontalObjectList();

        // リフレクションでprivate変数に代入
        $lineBundler = new LineBundler(new LineValidation());
        $refObject = new \ReflectionObject($lineBundler);
        $refProperty = $refObject->getProperty('hLineList');
        $refProperty->setAccessible(true);
        $refProperty->setValue($lineBundler, $hLines);

        $nearestHLine = $lineBundler->getNearestHorizontalLine(2, 5);

        // [1, 3, 4]の横線が左向きに変換されて取得できていること
        $this->assertEquals($nearestHLine->getStartX(), 2);
        $this->assertEquals($nearestHLine->getStartY(), 4);
        $this->assertEquals($nearestHLine->getEndY(),   3);
        $this->assertEquals($nearestHLine->isDirectionRight(), false);
    }

    private function getTestHorizontalObjectList()
    {
        $hLines[0] = new HorizontalLineObject(1, 2, 1);
        $hLines[1] = new HorizontalLineObject(3, 4, 5);
        $hLines[2] = new HorizontalLineObject(1, 3, 4);
        $hLines[3] = new HorizontalLineObject(2, 6, 5);

        return $hLines;
    }
}