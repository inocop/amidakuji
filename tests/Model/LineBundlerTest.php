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
        $hLines[0] = new HorizontalLineObject(2, 2, 1);
        $hLines[1] = new HorizontalLineObject(3, 3, 3);
        $hLines[2] = new HorizontalLineObject(1, 3, 4);

        // リフレクションでprivate変数に代入
        $lineBundler = new LineBundler(new LineValidation());
        $refObject = new \ReflectionObject($lineBundler);
        $refProperty = $refObject->getProperty('hLineList');
        $refProperty->setAccessible(true);
        $refProperty->setValue($lineBundler, $hLines);

        $resultList = $lineBundler->getExistsHorizontalLineByX(2);

        // 2件取得されているか
        $this->assertCount(2, $resultList);

        // 値が正しいか
        $this->assertEquals($resultList[0]->getStartX(), 2);
        $this->assertEquals($resultList[0]->getStartY(), 2);
        $this->assertEquals($resultList[0]->getEndY(),   1);
        $this->assertEquals($resultList[0]->isDirectionRight(), true);;

        // 方向変換による値が変更されているか
        $this->assertEquals($resultList[2]->getStartX(), 2);
        $this->assertEquals($resultList[2]->getStartY(), 4);
        $this->assertEquals($resultList[2]->getEndY(),   3);
        $this->assertEquals($resultList[2]->isDirectionRight(), false);
    }


    public function test指定した位置のひとつ上にある横線オブジェクトを正しく取得できること()
    {
        $hLines[0] = new HorizontalLineObject(2, 2, 1);
        $hLines[1] = new HorizontalLineObject(3, 3, 3);
        $hLines[2] = new HorizontalLineObject(1, 3, 4);
        $hLines[3] = new HorizontalLineObject(2, 6, 5);

        // リフレクションでprivate変数に代入
        $lineBundler = new LineBundler(new LineValidation());
        $refObject = new \ReflectionObject($lineBundler);
        $refProperty = $refObject->getProperty('hLineList');
        $refProperty->setAccessible(true);
        $refProperty->setValue($lineBundler, $hLines);

        $nearestHLine = $lineBundler->getNearestHorizontalLine(2, 5);

        $this->assertEquals($nearestHLine->getStartX(), 2);
        $this->assertEquals($nearestHLine->getStartY(), 4);
        $this->assertEquals($nearestHLine->getEndY(),   3);
        $this->assertEquals($nearestHLine->isDirectionRight(), false);
    }
}