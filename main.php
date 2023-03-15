<?php
/**
 * Entry point for Divar Scraper
 * php version 7.3
 *
 * @category Scrapers
 * @package  DivarScraper
 * @author   RStheGeek <fekri.m@icloud.com>
 * @license  MIT
 * @link     RStheGeek
 */

define('START', time());
require __DIR__ . '/vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$dotenv->required(['TELEGRAM_BOT_TOKEN', 'TELEGRAM_CHAT_ID', 'TELEGRAM_PRIVATE_CHAT_ID']);



// try {
    $telegram = new RStheGeek\DivarScraper\Telegram;
    $cityPriority = $argv[1] ?? 'high';
    $objectivePriority = $argv[2] ?? 'high';
    $master = new RStheGeek\DivarScraper\Scraper($cityPriority, $objectivePriority, $telegram);

    echo "\033[0;32m"
        . "DivarCrawler, cityPriority: {$cityPriority}, objectivePriority: {$objectivePriority}"
        . "\033[0m\n";

    $master->crawl();

    $info = "Finished ({$cityPriority}, {$objectivePriority}) in "
        . (time() - START) . " seconds";
    $telegram->sendMessage($info, true, true);
// } catch (Exception $e) {
//     $telegram->sendMessage('❌ ' . $e->getMessage(), false, true);
// }
echo "\n\n\033[42m" . $info . "\033[0m\n";
