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

    public function test初期設定の値が最大値の場合にバリデーションを通過すること()
    {
        $params = [ AmidakujiConst::VERTICAL_MAX_LENGTH,
                    AmidakujiConst::VERTICAL_MAX_LINES,
                    AmidakujiConst::HORIZONTAL_MAX_LINES ];
        $this->lineValidation->validInitialSettig($params);

        $this->assertTrue($this->lineValidation->getStatus());
        $this->assertTrue(empty($this->lineValidation->getErrorMessage()));
    }

    public function test初期設定の値が最小値の場合にバリデーションを通過すること()
    {
        $params = [ AmidakujiConst::VERTICAL_MIN_LENGTH,
                    AmidakujiConst::VERTICAL_MIN_LINES,
                    AmidakujiConst::HORIZONTAL_MIN_LINES ];
        $this->lineValidation->validInitialSettig($params);

        $this->assertTrue($this->lineValidation->getStatus());
        $this->assertTrue(empty($this->lineValidation->getErrorMessage()));
    }

    public function test初期設定の値が最大値を超えている場合にバリデーションエラーとなること()
    {
        $params = [ AmidakujiConst::VERTICAL_MAX_LENGTH,
                    AmidakujiConst::VERTICAL_MAX_LINES,
                    AmidakujiConst::HORIZONTAL_MAX_LINES];
        $label = ['縦線の長さ', '縦線の本数', '横線の本数'];

        for ($i=0; $i<count($params); $i++){
            $cpParam = $params;
            $cpParam[$i] += 1;

            $this->lineValidation->reset();
            $this->lineValidation->validInitialSettig($cpParam);
            $this->assertFalse($this->lineValidation->getStatus());
            $this->assertContains($label[$i], $this->lineValidation->getErrorMessage());
            $this->assertContains('の間の数値を入力してください。', $this->lineValidation->getErrorMessage());
        }
    }

    public function test初期設定の値が最小値未満の場合にバリデーションエラーとなること()
    {
        $params = [ AmidakujiConst::VERTICAL_MIN_LENGTH,
                    AmidakujiConst::VERTICAL_MIN_LINES,
                    AmidakujiConst::HORIZONTAL_MIN_LINES ];
        $label = ['縦線の長さ', '縦線の本数', '横線の本数'];

        for ($i=0; $i<count($params); $i++){
            $cpParam = $params;
            $cpParam[$i] -= 1;

            $this->lineValidation->reset();
            $this->lineValidation->validInitialSettig($cpParam);
            $this->assertFalse($this->lineValidation->getStatus());
            $this->assertContains($label[$i], $this->lineValidation->getErrorMessage());
            if ($cpParam[$i] < 0){
                $this->assertContains('整数を入力してください。', $this->lineValidation->getErrorMessage());
            }else{
                $this->assertContains('の間の数値を入力してください。', $this->lineValidation->getErrorMessage());
            }
        }
    }

    public function test初期設定の入力項目数が3つでない場合にバリデーションエラーとなること()
    {
        $this->lineValidation->validInitialSettig([5, 6]);

        $this->assertFalse($this->lineValidation->getStatus());
        $this->assertContains('入力項目数が不正です。', $this->lineValidation->getErrorMessage());
    }

    public function test横線の入力値が正常の場合にバリデーションを通過すること()
    {
        $hLines01[] = new HorizontalLineObject(2, 2, 2);
        $hLines01[] = new HorizontalLineObject(3, 3, 3);

        $hLines02[] = new HorizontalLineObject(4, 4, 4);

        // $LineBundlerのモック生成
        $mockLineBundler = $this->createMock(LineBundler::class);
        $mockLineBundler->method('getVerticalLinesSetting')->willReturn(6);
        $mockLineBundler->method('getVerticalLengthSetting')->willReturn(7);
        $mockLineBundler->method('getExistsHorizontalLineByX')->willReturn($hLines01, $hLines02);

        $params = [3, 5, 6];
        $this->lineValidation->validHorizontalLine($params, $mockLineBundler);
    }

    public function test横線の入力項目数が3つでない場合にバリデーションエラーとなること()
    {
        $mockLineBundler = $this->createMock(LineBundler::class);

        $params = [5, 6, 7, 8];
        $this->lineValidation->validHorizontalLine($params, $mockLineBundler);

        $this->assertFalse($this->lineValidation->getStatus());
        $this->assertContains('入力項目数が不正です。', $this->lineValidation->getErrorMessage());
    }
}