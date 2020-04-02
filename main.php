<?php

define('START', microtime(true));

require __DIR__.'/Util.php';
require __DIR__.'/Telegram.php';
require __DIR__.'/DivarCrawler.php';

$master = new App\DivarCrawler();
$master->crawl();

