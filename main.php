<?php
/**
 * Entry point for Divar Crawler
 * php version 7.3
 *
 * @category Crawlers
 * @package  DivarCrawler
 * @author   RStheGreat <rasoolsystem@me.com>
 * @license  RSproperty https://fekri.me/license
 * @link     RStheGreat
 */

define('START', time());

require __DIR__ . '/Util.php';
require __DIR__ . '/Telegram.php';
require __DIR__ . '/DivarCrawler.php';

try {
    $telegram = new App\Telegram;
    $cityPriority = $argv[1] ?? 'high';
    $objectivePriority = $argv[2] ?? 'high';
    $master = new App\DivarCrawler($telegram, $cityPriority, $objectivePriority);

    echo "\033[0;32m"
        . "DivarCrawler, cityPriority: {$cityPriority}, objectivePriority: {$objectivePriority}"
        . "\033[0m\n";

    $master->crawl();

    $info = "Finished ({$cityPriority}, {$objectivePriority}) in "
        . (time() - START) . " seconds";
    $telegram->sendMessage($info, true, true);
} catch (Exception $e) {
    $telegram->sendMessage('❌ ' . $e->getMessage(), false, true);
}
echo "\n\n\033[42m" . $info . "\033[0m\n";
