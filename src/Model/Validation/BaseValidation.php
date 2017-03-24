<?php
/**
 * This file is part of the kinoue.amidakuji
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Kinoue\Amidakuji\Model\Validation;

/**
 * 汎用的なデータ検証の処理と状態を持つ
 */
class BaseValidation
{

    private $status = null;
    private $errorMessage = '';

    /**
     * 数値チェック
     *
     * @param unknown $value
     * @param string  $label
     */
    public function validInt($value, $label = null)
    {
        $result = (ctype_digit((string)$value));
        $this->setStatus($result, "整数を入力してください。" . PHP_EOL, $label);
    }

    /**
     * 数値の範囲チェック
     *
     * @param unknown $value
     * @param int     $min
     * @param int     $max
     * @param string  $label
     */
    public function validIntRange($value, int $min, int $max, string $label = null)
    {
        $this->validInt($value, $label);

        if ($this->getStatus()) {
            $result = ($min <= $value && $value <= $max);
            $this->setStatus($result, $min . "から" . $max . "の間の数値を入力してください。" . PHP_EOL, $label);
        }
    }

    /**
     * バリデーションのステータスを返す
     *
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * バリデーションのステータスをセット
     *
     * @param bool   $status
     * @param string $message
     * @param string $label
     */
    protected function setStatus(bool $status, string $message = '', string $label = null)
    {
        if ($this->status === false) {
            return;
        }

        $this->status = $status;
        if ($status === false) {
            if (empty($label)) {
                $this->errorMessage = $message;
            } else {
                $this->errorMessage = $label . ": " . $message;
            }
        }
    }

    /**
     * エラーメッセージを取得
     *
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * 状態をリセット
     *
     * @return void
     */
    public function reset()
    {
        $this->status = null;
        $this->label = '';
        $this->errorMessage = '';
    }
}
