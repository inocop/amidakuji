<?php
/**
 * This file is part of the kinoue.amidakuji
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Kinoue\Amidakuji\Model\CustomObject;

use Kinoue\Amidakuji\Model\AmidakujiConst;

/**
 * あみだくじの横線オブジェクト
 *
 * @author kinoue
 *
 */
class HorizontalLineObject
{

    private $startX;

    private $startY;

    private $endY;

    private $direction;

    /**
     *
     * @param int $startX
     * @param int $startY
     * @param int $endY
     * @param int $direction
     */
    public function __construct(int $startX, int $startY, int $endY, int $direction = AmidakujiConst::DIRECTION_RIGHT)
    {
        $this->startX = $startX;
        $this->startY = $startY;
        $this->endY = $endY;
        $this->direction = $direction;
    }

    /**
     * 横線の開始位置（X軸）
     *
     * @return int
     */
    public function getStartX(): int
    {
        return $this->startX;
    }

    /**
     * 横線の開始位置（Y軸）
     *
     * @return int
     */
    public function getStartY(): int
    {
        return $this->startY;
    }

    /**
     * 横線の終了位置（Y軸）
     *
     * @return int
     */
    public function getEndY(): int
    {
        return $this->endY;
    }

    /**
     * 横線の向き
     *
     * @return bool
     */
    public function isDirectionRight(): bool
    {
        return ($this->direction === AmidakujiConst::DIRECTION_RIGHT);
    }
}
