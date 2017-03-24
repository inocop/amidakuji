<?php

namespace Kinoue\AmidakujiTest;

use Kinoue\Amidakuji\Model\Validation\BaseValidation;

class BaseValidationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BaseValidation
     */
    protected $baseValidation;

    protected function setUp()
    {
        parent::setUp();
        $this->baseValidation = new BaseValidation();
    }

    /**
     * @dataProvider intTrueDataProvider
     */
    public function test正の整数の場合はバリデーションを通過すること($expected)
    {
        $this->baseValidation->validInt($expected);

        $this->assertTrue($this->baseValidation->getStatus());
        $this->assertTrue(empty($this->baseValidation->getErrorMessage()));
    }

    public function intTrueDataProvider()
    {
        return [
            ['123'], [123]
        ];
    }

    /**
     * @dataProvider intFalseDataProvider
     */
    public function test正の整数以外の値の場合はバリデーションエラーとなること($expected)
    {
        $this->baseValidation->validInt($expected);

        $this->assertFalse($this->baseValidation->getStatus());
        $this->assertContains('整数を入力してください。', $this->baseValidation->getErrorMessage());
    }

    public function intFalseDataProvider()
    {
        return [
            ['1.23'], [-123], ['abc']
        ];
    }

    public function intRangeTrueDataProvider()
    {
        return [
            [1,   1, 100],
            [50,  1, 100],
            [100, 1, 100]
        ];
    }

    /**
     * @dataProvider intRangeTrueDataProvider
     */
    public function test範囲内の数値の場合はバリデーションを通過すること($value, $min, $max)
    {
        $this->baseValidation->validIntRange($value, $min, $max);

        $this->assertTrue($this->baseValidation->getStatus());
        $this->assertTrue(empty($this->baseValidation->getErrorMessage()));
    }

    public function intRangeFalseDataProvider()
    {
        return [
            [0,   1, 100],
            [101, 1, 100]
        ];
    }
    /**
     * @dataProvider intRangeFalseDataProvider
     */
    public function test範囲外の数値の場合はバリデーションを通過すること($value, $min, $max)
    {
        $this->baseValidation->validIntRange($value, $min, $max);

        $this->assertFalse($this->baseValidation->getStatus());
        $this->assertContains($min . "から" . $max . "の間の数値を入力してください。", $this->baseValidation->getErrorMessage());
    }


    public function testステータスが一度falseになったらtrueにならないこと()
    {
        $this->baseValidation->validInt(1);
        $this->assertTrue($this->baseValidation->getStatus());

        $this->baseValidation->validInt('a');
        $this->assertFalse($this->baseValidation->getStatus());

        $this->baseValidation->validInt(1);
        $this->assertFalse($this->baseValidation->getStatus());
    }
}