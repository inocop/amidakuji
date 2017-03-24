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
}