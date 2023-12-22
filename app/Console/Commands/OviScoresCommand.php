<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use PetrPetrovich\Telegram\Services\TelegramService;

class OviScoresCommand extends Command
{
    protected $signature = 'ovi:scores';

    protected $description = 'Send Alex Ovechkin scores';

    private $url = 'https://ru.wikipedia.org/w/api.php';

    private $filePath = 'public/scores.txt';

    public function handle()
    {
        $savedScore = (int) file_get_contents($this->filePath);
        $attribute = '*';
        $document = new \DOMDocument();

        $response = Http::get($this->url, [
            'action' => 'parse',
            'page' => 'Список игроков НХЛ, забросивших 500 и более шайб',
            'format' => 'json',
        ])->body();

        $text = mb_convert_encoding(json_decode($response)->parse->text->$attribute, 'HTML-ENTITIES', 'utf-8');
        libxml_use_internal_errors(true);
        $document->loadHTML($text);
        libxml_clear_errors();
        $table = $document->getElementsByTagName('table')->item(0);

        for ($i = 2; $i <= 2; $i++) {
            $tr = $table->getElementsByTagName('tr')->item($i);
            $name = $tr->getElementsByTagName('td')->item(1)->textContent;
            $score = (int) $tr->getElementsByTagName('td')->item(2)->textContent;

            if (preg_match('#Овечкин#', $name) && $score !== $savedScore) {
                file_put_contents($this->filePath, $score);
                $service = new TelegramService(config('services.telegram.bot-birthdays.token'), config('services.telegram.bot-birthdays.chat'));
                $diff = 894 - $score;
                $service->sendMessage("Овечкин - *{$score}* шайб! Осталось - {$diff}!");
                break;
            }
        }
    }
}
