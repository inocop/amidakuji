<?php
/**
 * This file is part of the kinoue.amidakuji
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Kinoue\Amidakuji\Model;

use Kinoue\Amidakuji\Model\CustomObject\HorizontalLineObject;

/**
 * あみだくじの線の保持クラス
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

    public function __construct()
    {}

    /**
     * 設定値をセット
     *
     * @param int $vLength
     * @param int $vLines
     * @param int $hLines
     *
     * @return void
     */
    public function setInitialSetting(int $vLength, int $vLines, int $hLines)
    {
        $this->vLengthSetting = $vLength;
        $this->vLinesSetting = $vLines;
        $this->hLinesSetting = $hLines;
    }

    /**
     * 横線オブジェクトを追加
     *
     * @return void
     */
    public function addHorizontalLine(int $startX, int $startY, int $endY)
    {
        $hLineObject = new HorizontalLineObject($startX, $startY, $endY);
        $this->hLineList[] = $hLineObject;
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
