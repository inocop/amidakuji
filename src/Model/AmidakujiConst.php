<?php
/**
 * This file is part of the kinoue.amidakuji
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Kinoue\Amidakuji\Model;

/**
 * あみだくじで使用する定数
 */
class AmidakujiConst
{
    /**
     * 縦線の最大長
     * @var int
     */
    const VERTICAL_MAX_LENGTH = 10000;

    /**
     * 縦線の最小長
     * @var int
     */
    const VERTICAL_MIN_LENGTH = 2;

    /**
     * 縦線の最大本数
     * @var int
     */
    const VERTICAL_MAX_LINES = 1000;

    /**
     * 縦線の最小本数
     * @var int
     */
    const VERTICAL_MIN_LINES = 2;

    /**
     * 横線の最大本数
     * @var int
     */
    const HORIZONTAL_MAX_LINES = 10000;

    /**
     * 横線の最小本数
     * @var int
     */
    const HORIZONTAL_MIN_LINES = 0;


    /**
     * 右方向の横線
     * @var int
     */
    const DIRECTION_RIGHT = 1;

    /**
     * 左方向の横線
     * @var int
     */
    const DIRECTION_LEFT = 2;
}
