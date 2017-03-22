<?php

use Sami\Sami;
use Symfony\Component\Finder\Finder;

// 生成対象
$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__.'/src');

return new Sami($iterator, array(
    'title'                => 'Amidakuji API',
    'build_dir'            => __DIR__.'/docs/api',
    'cache_dir'            => __DIR__.'/docs/api/cache/'
));