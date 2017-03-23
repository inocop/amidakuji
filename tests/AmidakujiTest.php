<?php

namespace Kinoue\AmidakujiTest;

use Kinoue\Amidakuji\Amidakuji;
use Kinoue\Amidakuji\Model\LineBundler;
use Kinoue\Amidakuji\Model\CustomObject\HorizontalLineObject;
use Kinoue\Amidakuji\Model\AmidakujiConst;

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

    public function testモックが返す値での正解ルートが表示されることを確認()
    {
        $mockLineBundler = $this->createMock(LineBundler::class);
        $mockLineBundler->method('inputInitialSetting')->willReturn(true);
        $mockLineBundler->method('inputHorizontalLines')->willReturn(true);
        $mockLineBundler->method('getVerticalLengthSetting')->willReturn(5);

        $hLine1 = new HorizontalLineObject(1, 2, 3);
        $hLine2 = new HorizontalLineObject(2, 3, 4, AmidakujiConst::DIRECTION_RIGHT);
        $hLine3 = new HorizontalLineObject(3, 4, 5, AmidakujiConst::DIRECTION_LEFT);
        $mockLineBundler->method('getNearestHorizontalLine')->willReturn($hLine1, $hLine2, $hLine3, null);

        ob_start();
        $this->skeleton->lineBundler = $mockLineBundler;
        $this->skeleton->start();
        $output = ob_get_clean();

        $this->assertEquals(2 . PHP_EOL, $output);
    }

    public function test初期設定入力エラー時に横線の入力処理が呼ばれないことを確認()
    {
        $mockLineBundler = $this->createMock(LineBundler::class);
        $mockLineBundler->method('inputInitialSetting')->willReturn(false);
        $mockLineBundler->method('inputHorizontalLines')->willReturn(true);

        $mockLineBundler->expects($this->never())->method('inputHorizontalLines');

        $this->skeleton->lineBundler = $mockLineBundler;
        $this->skeleton->start();
    }

    public function test横線入力エラー時にルート計算処理が呼ばれないことを確認()
    {
        $mockLineBundler = $this->createMock(LineBundler::class);
        $mockLineBundler->method('inputInitialSetting')->willReturn(true);
        $mockLineBundler->method('inputHorizontalLines')->willReturn(false);
        $mockLineBundler->method('getVerticalLengthSetting')->willReturn(5);
        $mockLineBundler->method('getNearestHorizontalLine')->willReturn(null);

        $mockLineBundler->expects($this->never())->method('getVerticalLengthSetting');
        $mockLineBundler->expects($this->never())->method('getNearestHorizontalLine');

        $this->skeleton->lineBundler = $mockLineBundler;
        $this->skeleton->start();
    }


}
