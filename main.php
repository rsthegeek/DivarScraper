<?php

define('START', microtime(true));

require __DIR__ . '/Util.php';
require __DIR__ . '/Telegram.php';
require __DIR__ . '/DivarCrawler.php';

$master = new App\DivarCrawler();
$master->crawl();

$info = "Finished in: " . (microtime(true) - START) . " seconds";
(new App\Telegram)->sendMessage($info, true);
echo "\n\n\033[42m" . $info . "\033[0m\n";