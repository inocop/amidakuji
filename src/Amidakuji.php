<?php
/**
 * This file is part of the kinoue.amidakuji
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Kinoue\Amidakuji;

use Kinoue\Amidakuji\Model\LineBundler;
use Kinoue\Amidakuji\Model\Validation\LineValidation;

/**
 * あみだくじプログラム
 *
 * @author kinoue
 */
class Amidakuji
{

    /**
     *
     * @var LineBundler
     */
    public $lineBundler;

    public function __construct()
    {
        $lineValidation = new LineValidation();
        $this->lineBundler = new LineBundler($lineValidation);
    }

    /**
     * あみだくじプログラム開始
     */
    public function start(int $targetGoal = 1)
    {
        // あみだくじの入力処理
        $inputDone = ($this->lineBundler->inputInitialSetting() &&
                      $this->lineBundler->inputHorizontalLines());
        if (!$inputDone){
            return;
        }

        // あみだくじの正解ルート計算
        $currentX = $targetGoal;
        $currentY = $this->lineBundler->getVerticalLengthSetting();

        do {
            $nearestHLine = $this->lineBundler->getNearestHorizontalLine($currentX, $currentY);
            if (isset($nearestHLine)) {
                $currentX += ($nearestHLine->isDirectionRight()) ? 1 : - 1;
                $currentY = $nearestHLine->getEndY();
            }
        } while (isset($nearestHLine));

        echo $currentX . PHP_EOL;
    }
}
