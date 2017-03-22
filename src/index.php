<?php
if (PHP_SAPI != 'cli') {
    echo 'コマンドライン以外では実行できません。';
    exit();
}

// $targetGoal = 1;
// if ($argc == 2 && ctype_digit($argv[1])) {
//     $targetGoal = $argv[1];
// }

require_once dirname(__FILE__) . '/../vendor/autoload.php';
$amidakuji = new Kinoue\Amidakuji\Amidakuji();
$amidakuji->start();
