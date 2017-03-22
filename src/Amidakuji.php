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
     * @var LineValidation
     */
    private $lineValidation;

    /**
     *
     * @var LineBundler
     */
    private $lineBundler;

    public function __construct()
    {
        $this->lineValidation = new LineValidation();
        $this->lineBundler = new LineBundler();
    }

    /**
     * あみだくじプログラム開始
     */
    public function start()
    {
        // あみだくじの入力処理
        $inputDone = ($this->inputInitialSetting() && $this->inputHorizontalLines());

        if ($inputDone) {
            // あみだくじの正解ルート計算
            $currentX = 1;
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

    /**
     * 初期設定値の入力
     * - 縦線の長さ
     * - 縦線の本数
     * - 横線の本数
     *
     * @return bool
     */
    private function inputInitialSetting(): bool
    {
        echo ('縦線の長さ、縦線の本数、横線の本数を半角スペース区切りで入力してください。' . PHP_EOL);
        $stdin = trim(fgets(STDIN));
        $params = explode(' ', $stdin);

        // 初回入力値のチェック
        $this->lineValidation->validInitialSettig($params);
        if ($this->lineValidation->getStatus()) {
            $this->lineBundler->setInitialSetting((int) $params[0], (int) $params[1], (int) $params[2]);
            return true;
        }

        echo $this->lineValidation->getErrorMessage();
        return false;
    }

    /**
     * 横線の設定をセット
     *
     * @return bool
     */
    private function inputHorizontalLines(): bool
    {
        $hLinesSetting = $this->lineBundler->getHorizontalLinesSetting();
        if ($hLinesSetting == 0) {
            return true;
        }

        echo ('横線の開始点(X軸)、横線の開始点(Y軸)、横線の終了点(Y軸)を半角スペース区切りで入力してください。' . PHP_EOL .
              '(exitでプログラム中断)' . PHP_EOL);

        // 横線の本数分登録されるまでループ
        while (count($this->lineBundler->getHorizontalLineList()) < $hLinesSetting) {
            $stdin = trim(fgets(STDIN));
            if ($stdin == 'exit') {
                echo ('プログラムを中断しました。' . PHP_EOL);
                return false;
            }
            $params = explode(' ', $stdin);

            // 入力値のチェック
            $this->lineValidation->reset();
            $this->lineValidation->validHorizontalLine($params, $this->lineBundler);
            if ($this->lineValidation->getStatus()) {
                $this->lineBundler->addHorizontalLine((int) $params[0], (int) $params[1], (int) $params[2]);
                continue;
            }

            echo $this->lineValidation->getErrorMessage();
        }

        return true;
    }
}
