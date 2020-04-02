<?php

define('START', microtime(true));

require __DIR__ . '/Util.php';
require __DIR__ . '/Telegram.php';
require __DIR__ . '/DivarCrawler.php';

$master = new App\DivarCrawler();
$master->crawl();

echo "\n\n\033[42mFinished in: " . (microtime(true) - START) . " seconds\033[0m\n";