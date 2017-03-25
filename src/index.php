<?php
if (PHP_SAPI != 'cli') {
    echo 'コマンドライン以外では実行できません。';
    exit();
}

require_once dirname(__FILE__) . '/../vendor/autoload.php';
$amidakuji = new Kinoue\Amidakuji\Amidakuji();
$amidakuji->start();
