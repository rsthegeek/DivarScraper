<?php

define('START', microtime(true));

require __DIR__ . '/Util.php';
require __DIR__ . '/Telegram.php';
require __DIR__ . '/DivarCrawler.php';

try {
    $telegram = new App\Telegram;
    $master = new App\DivarCrawler($telegram);
    $master->crawl();

    $info = "Finished in: " . (microtime(true) - START) . " seconds";
    $telegram->sendMessage($info, true);
} catch (Exception $e) {
    $telegram->sendMessage('❌ ' . $e->getMessage());
}
echo "\n\n\033[42m" . $info . "\033[0m\n";
