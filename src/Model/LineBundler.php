<?php
/**
 * This file is part of the kinoue.amidakuji
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Kinoue\Amidakuji\Model;

use Kinoue\Amidakuji\Model\CustomObject\HorizontalLineObject;
use Kinoue\Amidakuji\Model\Validation\LineValidation;

/**
 * あみだくじの線の管理クラス
 *
 * @author kinoue
 *
 */
class LineBundler
{

    private $vLengthSetting;
    private $vLinesSetting;
    private $hLinesSetting;

    /**
     *
     * @var HorizontalLineObject[]
     */
    private $hLineList = [];

    /**
     *
     * @var LineValidation
     */
    private $lineValidation;

    public function __construct()
    {
        $this->lineValidation = new LineValidation();
    }

    /**
     * 初期設定値を入力
     *
     * @return bool
     */
    public function inputInitialSetting(): bool
    {
        echo ('縦線の長さ、縦線の本数、横線の本数を半角スペース区切りで入力してください。' . PHP_EOL);
        $stdin = trim(fgets(STDIN));
        $params = explode(' ', $stdin);

        // 初回入力値のチェック
        $this->lineValidation->validInitialSettig($params);
        if ($this->lineValidation->getStatus()) {
            $this->vLengthSetting = (int) $params[0];
            $this->vLinesSetting =  (int) $params[1];
            $this->hLinesSetting =  (int) $params[2];
            return true;
        }

        echo $this->lineValidation->getErrorMessage();
        return false;
    }

    /**
     * 横線の情報を入力
     *
     * @return bool
     */
    public function inputHorizontalLines(): bool
    {
        if ($this->hLinesSetting == 0) {
            return true;
        }

        echo ('横線の開始点(X軸)、横線の開始点(Y軸)、横線の終了点(Y軸)を半角スペース区切りで入力してください。' . PHP_EOL .
            '(exitでプログラム中断)' . PHP_EOL);

        // 横線の本数分登録されるまでループ
        while (count($this->hLineList) < $this->hLinesSetting) {
            $stdin = trim(fgets(STDIN));
            if ($stdin == 'exit') {
                echo ('プログラムを中断しました。' . PHP_EOL);
                return false;
            }
            $params = explode(' ', $stdin);

            // 入力値のチェック
            $this->lineValidation->reset();
            $this->lineValidation->validHorizontalLine($params, $this);
            if ($this->lineValidation->getStatus()) {
                $hLineObject = new HorizontalLineObject((int) $params[0], (int) $params[1], (int) $params[2]);
                $this->hLineList[] = $hLineObject;
                continue;
            }

            echo $this->lineValidation->getErrorMessage();
        }

        return true;
    }

    /**
     * 設定した縦線の長さのを取得
     *
     * @return int
     */
    public function getVerticalLengthSetting(): int
    {
        return $this->vLengthSetting;
    }

    /**
     * 設定した縦線本数を取得
     *
     * @return int
     */
    public function getVerticalLinesSetting(): int
    {
        return $this->vLinesSetting;
    }

    /**
     * 設定した横線本数を取得
     *
     * @return int
     */
    public function getHorizontalLinesSetting(): int
    {
        return $this->hLinesSetting;
    }

    /**
     * 横線オブジェクトのリストを取得
     *
     * @return HorizontalLineObject[]
     */
    public function getHorizontalLineList(): array
    {
        return $this->hLineList;
    }

    /**
     * 指定した縦線に存在する横線オブジェクトのリストを取得
     *
     * @return HorizontalLineObject[]
     */
    public function getExistsHorizontalLineByX(int $currentX): array
    {
        $resultList = [];
        foreach ($this->hLineList as $key => $hLineObject) {
            if ($hLineObject->getStartX() == $currentX) {
                $resultList[$key] = $hLineObject;
            } elseif ($hLineObject->getStartX() == ($currentX - 1)) {
                // 指定した縦線が開始点になるように変換
                $startX = $hLineObject->getStartX() + 1;
                $startY = $hLineObject->getEndY();
                $endY = $hLineObject->getStartY();
                $resultList[$key] = new HorizontalLineObject($startX, $startY, $endY, AmidakujiConst::DIRECTION_LEFT);
            }
        }

        return $resultList;
    }

    /**
     * 指定した縦線の点より上にあり、直近の横線オブジェクトを取得
     *
     * @param int $currentX
     * @param int $currentY
     * @return HorizontalLineObject
     */
    public function getNearestHorizontalLine(int $currentX, int $currentY)
    {
        $hLineList = $this->getExistsHorizontalLineByX($currentX);

        $nearestHLine = null;
        foreach ($hLineList as $hLine) {
            assert($hLine instanceof HorizontalLineObject);

            // 指定したY点の一つ上にあることを判定
            if ($hLine->getStartY() < $currentY) {
                // 指定したY点に一番近いかを判定
                if (is_null($nearestHLine) || $nearestHLine->getStartY() < $hLine->getStartY()) {
                    $nearestHLine = $hLine;
                }
            }
        }

        return $nearestHLine;
    }
}
