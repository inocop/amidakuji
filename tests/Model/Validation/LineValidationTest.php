<?php

namespace Kinoue\AmidakujiTest;

use Kinoue\Amidakuji\Model\Validation\LineValidation;
use Kinoue\Amidakuji\Model\AmidakujiConst;
use Kinoue\Amidakuji\Model\CustomObject\HorizontalLineObject;
use Kinoue\Amidakuji\Model\LineBundler;

class LineValidationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LineValidation
     */
    protected $lineValidation;

    protected function setUp()
    {
        parent::setUp();
        $this->lineValidation = new LineValidation();
    }

    public function initialSettingTrueData()
    {
        return [
            [ AmidakujiConst::VERTICAL_MAX_LENGTH, AmidakujiConst::VERTICAL_MAX_LINES, AmidakujiConst::HORIZONTAL_MAX_LINES ],
            [ AmidakujiConst::VERTICAL_MIN_LENGTH, AmidakujiConst::VERTICAL_MIN_LINES, AmidakujiConst::HORIZONTAL_MIN_LINES ],
            [ 5, 6, 7 ]
        ];
    }
    /**
     * @dataProvider initialSettingTrueData
     */
    public function test初期設定値が仕様の範囲内の場合にバリデーションを通過すること($vLength, $vLines, $hLines)
    {
        $params = [$vLength, $vLines, $hLines];
        $this->lineValidation->validInitialSettig($params);

        $this->assertTrue($this->lineValidation->getStatus());
        $this->assertTrue(empty($this->lineValidation->getErrorMessage()));
    }

    public function initialSettingFalseData()
    {
        return [
            [ '縦線の長さ', AmidakujiConst::VERTICAL_MAX_LENGTH +1, AmidakujiConst::VERTICAL_MAX_LINES, AmidakujiConst::HORIZONTAL_MAX_LINES ],
            [ '縦線の本数', AmidakujiConst::VERTICAL_MAX_LENGTH, AmidakujiConst::VERTICAL_MAX_LINES +1, AmidakujiConst::HORIZONTAL_MAX_LINES ],
            [ '横線の本数', AmidakujiConst::VERTICAL_MAX_LENGTH, AmidakujiConst::VERTICAL_MAX_LINES, AmidakujiConst::HORIZONTAL_MAX_LINES +1 ],
            [ '縦線の長さ', AmidakujiConst::VERTICAL_MIN_LENGTH -1, AmidakujiConst::VERTICAL_MIN_LINES, AmidakujiConst::HORIZONTAL_MIN_LINES ],
            [ '縦線の本数', AmidakujiConst::VERTICAL_MIN_LENGTH, AmidakujiConst::VERTICAL_MIN_LINES -1, AmidakujiConst::HORIZONTAL_MIN_LINES ]
        ];
    }
    /**
     * @dataProvider initialSettingFalseData
     */
    public function test初期設定値が仕様の範囲外の場合にバリデーションエラーとなること($label, $vLength, $vLines, $hLines)
    {
        $params = [$vLength, $vLines, $hLines];
        $this->lineValidation->validInitialSettig($params);

        $this->assertFalse($this->lineValidation->getStatus());
        $this->assertContains($label, $this->lineValidation->getErrorMessage());
        $this->assertContains('間の数値を入力してください。', $this->lineValidation->getErrorMessage());
    }

    public function test初期設定の入力項目数が3つでない場合にバリデーションエラーとなること()
    {
        $this->lineValidation->validInitialSettig([5, 6]);

        $this->assertFalse($this->lineValidation->getStatus());
        $this->assertContains('入力項目数が不正です。', $this->lineValidation->getErrorMessage());
    }

    public function test横線の入力値が正常の場合にバリデーションを通過すること()
    {
        $mockLineBundler = $this->getLineBundlerMock();

        $params = [2, 3, 4];
        $this->lineValidation->validHorizontalLine($params, $mockLineBundler);
        $this->assertTrue($this->lineValidation->getStatus());
        $this->assertTrue(empty($this->lineValidation->getErrorMessage()));
    }

    public function outRangeHorizontalLineData()
    {
        return [
            ['横線の開始点(X軸)', [0, 6, 6]],
            ['横線の開始点(X軸)', [5, 6, 6]],
            ['横線の開始点(Y軸)', [1, 0, 6]],
            ['横線の開始点(Y軸)', [1, 6, 6]],
            ['横線の終了点(Y軸)', [1, 2, 0]],
            ['横線の終了点(Y軸)', [1, 2, 6]]
        ];
    }
    /**
     * @dataProvider outRangeHorizontalLineData
     */
    public function test横線の入力値が縦線の範囲外の場合にバリデーションエラーとなること($label, $params)
    {
        $mockLineBundler = $this->getLineBundlerMock();

        $this->lineValidation->reset();
        $this->lineValidation->validHorizontalLine($params, $mockLineBundler);
        $this->assertFalse($this->lineValidation->getStatus());
        $this->assertContains($label, $this->lineValidation->getErrorMessage());
        $this->assertContains('間の数値を入力してください。', $this->lineValidation->getErrorMessage());
    }

    public function test横線の端点が重複している場合にバリデーションエラーとなること()
    {
        $mockLineBundler = $this->getLineBundlerMock();

        $params[] = [2, 1, 1];
        $params[] = [2, 3, 3];
        for ($i=0; $i<count($params); $i++){
            $this->lineValidation->reset();
            $this->lineValidation->validHorizontalLine($params[$i], $mockLineBundler);
            $this->assertFalse($this->lineValidation->getStatus());
            $this->assertContains('端点が重複しています。', $this->lineValidation->getErrorMessage());
        }
    }

    public function test横線が交差している場合にバリデーションエラーとなること()
    {
        $mockLineBundler = $this->getLineBundlerMock();

        $params[] = [2, 3, 1];
        $params[] = [3, 1, 5];
        for ($i=0; $i<count($params); $i++){
            $this->lineValidation->reset();
            $this->lineValidation->validHorizontalLine($params[$i], $mockLineBundler);
            $this->assertFalse($this->lineValidation->getStatus());
            $this->assertContains('横線と交差しています。', $this->lineValidation->getErrorMessage());
        }
    }

    public function test横線の入力項目数が3つでない場合にバリデーションエラーとなること()
    {
        $mockLineBundler = $this->createMock(LineBundler::class);

        $params = [5, 6, 7, 8];
        $this->lineValidation->validHorizontalLine($params, $mockLineBundler);

        $this->assertFalse($this->lineValidation->getStatus());
        $this->assertContains('入力項目数が不正です。', $this->lineValidation->getErrorMessage());
    }

    private function getLineBundlerMock()
    {
        // 開始位置の縦線上にある横線
        $hLinesOnStartX[0] = new HorizontalLineObject(1, 1, 1);
        $hLinesOnStartX[1] = new HorizontalLineObject(2, 2, 2);

        // 終了位置の縦線上にある横線
        $hLinesOnEndX[2] = new HorizontalLineObject(2, 2, 2);
        $hLinesOnEndX[3] = new HorizontalLineObject(3, 3, 3);

        $mockLineBundler = $this->createMock(LineBundler::class);
        $mockLineBundler->method('getVerticalLinesSetting')->willReturn(5);
        $mockLineBundler->method('getVerticalLengthSetting')->willReturn(6);
        $mockLineBundler->method('getExistsHorizontalLineByX')->willReturn($hLinesOnStartX, $hLinesOnEndX);

        return $mockLineBundler;
    }
}