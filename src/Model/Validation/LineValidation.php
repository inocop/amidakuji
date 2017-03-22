<?php
/**
 * This file is part of the kinoue.amidakuji
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Kinoue\Amidakuji\Model\Validation;

use Kinoue\Amidakuji\Model\AmidakujiConst;
use Kinoue\Amidakuji\Model\LineBundler;
use Kinoue\Amidakuji\Model\CustomObject\HorizontalLineObject;

/**
 * 線の入力値バリデーション
 */
class LineValidation extends BaseValidation
{

    /**
     * 初回入力値のバリデーション
     *
     * @param array $params
     */
    public function validInitialSettig(array $params)
    {
        // 項目数をチェック
        if (count($params) !== 3) {
            $this->setStatus(false, "入力項目数が不正です。" . PHP_EOL);
            return;
        }

        // 値の範囲をチェック
        $this->validIntRange($params[0],
                             AmidakujiConst::VERTICAL_MIN_LENGTH,
                             AmidakujiConst::VERTICAL_MAX_LENGTH,
                             '縦線の長さ');
        $this->validIntRange($params[1],
                             AmidakujiConst::VERTICAL_MIN_LINES,
                             AmidakujiConst::VERTICAL_MAX_LINES,
                             '縦線の本数');
        $this->validIntRange($params[2],
                             AmidakujiConst::HORIZONTAL_MIN_LINES,
                             AmidakujiConst::HORIZONTAL_MAX_LINES,
                             '横線の本数');
    }

    /**
     * 横線入力値のバリデーション
     *
     * @param array $params
     * @param LineBundler $lineBundler
     */
    public function validHorizontalLine(array $params, LineBundler $lineBundler)
    {
        // 項目数をチェック
        if (count($params) !== 3) {
            $this->setStatus(false, "入力項目数が不正です。" . PHP_EOL);
            return;
        }
        $newStartX = $params[0];
        $newStartY = $params[1];
        $newEndY = $params[2];

        // 値の範囲をチェック
        $this->validIntRange($newStartX, 1, $lineBundler->getVerticalLinesSetting() - 1, '横線の開始点(X軸)');
        $this->validIntRange($newStartY, 1, $lineBundler->getVerticalLengthSetting() - 1, '横線の開始点(Y軸)');
        $this->validIntRange($newEndY, 1, $lineBundler->getVerticalLengthSetting() - 1, '横線の終了点(Y軸)');

        // 横線の交差、開始点の重複をチェック
        $hLineList = $lineBundler->getExistsHorizontalLineByX($newStartX);
        foreach ($hLineList as $key => $hLine) {
            assert($hLine instanceof HorizontalLineObject);

            if ($hLine->getStartY() == $newStartY) {
                $this->setStatus(false, ($key + 1) . "番目の横線と端点が重複しています。" . PHP_EOL);
                return;
            }
            // 右向きの横線のみ交差をチェック
            if ($hLine->isDirectionRight()) {
                if (($hLine->getStartY() > $params[1] && $hLine->getEndY() < $params[2]) ||
                    ($hLine->getStartY() < $params[1] && $hLine->getEndY() > $params[2])) {
                    $this->setStatus(false, ($key + 1) . "番目の横線と交差しています。" . PHP_EOL);
                    return;
                }
            }
        }

        // 終了点の重複をチェック
        $hLineList = $lineBundler->getExistsHorizontalLineByX($newStartX + 1);
        foreach ($hLineList as $key => $hLine) {
            assert($hLine instanceof HorizontalLineObject);

            if ($hLine->getStartY() == $newEndY) {
                $this->setStatus(false, ($key + 1) . "番目の横線と端点が重複しています。" . PHP_EOL);
                return;
            }
        }

        $this->setStatus(true);
    }
}
