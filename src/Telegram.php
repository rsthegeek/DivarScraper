<?php

namespace RStheGeek\DivarScraper;

class Telegram
{
    const TELEGRAM_API_URL = 'https://api.telegram.org';

    protected string $botToken;
    protected int $chatId;
    protected int $privateChatId;

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
        $this->botToken = getenv('TELEGRAM_BOT_TOKEN');
        $this->chatId = getenv('TELEGRAM_CHAT_ID');
        $this->privateChatId = getenv('TELEGRAM_PRIVATE_CHAT_ID');

        $this->baseUrl = self::TELEGRAM_API_URL . '/bot' . $this->botToken . '/';
        $this->curl = curl_init();
        curl_setopt_array($this->curl, [
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:75.0) Gecko/20100101 Firefox/75.0',
            CURLOPT_RETURNTRANSFER => true,
        ]);
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

    public function sendPhoto(string $photo, ?string $caption = null)
    {
//        var_dump('called sendPhoto', $photo, $caption);
        return $this->call('sendPhoto', [
            'chat_id' . '=' . urlencode($this->chatId),
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
//        var_dump($result);
//        return json_encode($result);
    }

    public function sendSticker(string $sticker)
    {
//        var_dump('called sendPhoto', $sticker);
        return $this->call('sendPhoto', [
            'chat_id' . '=' . urlencode($this->chatId),
            'photo' . '=' . urlencode($sticker),
        ]);
    }

    public function sendMessage(
        string $text = null,
        bool $silent = false,
        bool $private = false,
        int $replyToMessageId = null
    ) {
//        var_dump('called sendMessage', $text);
        $params = [
            'chat_id' . '=' . urlencode($private ? $this->privateChatId : $this->chatId),
            'text' . '=' . urlencode($text),
            'parse_mode' . '=' . urlencode('html'),
            'disable_notification' . '=' . urlencode($silent),
        ];
        if (!is_null($replyToMessageId)) {
            $params[] = 'reply_to_message_id' . '=' . urlencode($replyToMessageId);
        }
        return $this->call('sendMessage', $params);
    }
}
