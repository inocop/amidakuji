<?php

namespace Kinoue\AmidakujiTest;

use Kinoue\Amidakuji\Model\Validation\LineValidation;

class LineValidationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LineValidation
     */
    protected $lineValidation;

    protected function setUp()
    {
        parent::setUp();
        $lineValidation = new LineValidation();
    }

}