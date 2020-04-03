<?php

namespace App;

class Telegram
{
    const TELEGRAM_API_URL = 'https://api.telegram.org';
    const BOT_TOKEN = '1257768792:AAELXFtHGe-o6VbCIiVdTVq05i2jHFkYK3A';
    const CHAT_ID = '-486727102';
    const PRIVATE_CHAT_ID = '70582354';

    /**
     * @var resource
     */
    protected $curl;

    /**
     * @var string
     */
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = self::TELEGRAM_API_URL . '/bot' . self::BOT_TOKEN . '/';
        $this->curl = curl_init();
        curl_setopt_array($this->curl, [
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:75.0) Gecko/20100101 Firefox/75.0',
            CURLOPT_RETURNTRANSFER => 1,
        ]);
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

    public function sendPhoto(string $photo, ?string $caption = null)
    {
        return $this->call('sendPhoto', [
            'chat_id' . '=' . urlencode(self::CHAT_ID),
            'photo' . '=' . urlencode($photo),
            'caption' . '=' . urlencode($caption),
            'parse_mode' . '=' . urlencode('html'),
        ]);
    }

    protected function call(string $method, array $params): bool
    {
        curl_setopt($this->curl, CURLOPT_URL, $this->baseUrl . $method);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, implode('&', $params));
        curl_setopt($this->curl, CURLOPT_POST, count($params));
        return curl_exec($this->curl);
    }

    public function sendMessage(string $text = null, bool $silent = false, bool $private = false)
    {
        return $this->call('sendMessage', [
            'chat_id' . '=' . urlencode($private ? self::PRIVATE_CHAT_ID : self::CHAT_ID),
            'text' . '=' . urlencode($text),
            'parse_mode' . '=' . urlencode('html'),
            'disable_notification' . '=' . urlencode($silent),
        ]);
    }
}
