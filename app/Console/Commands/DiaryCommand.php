<?php

namespace App\Console\Commands;

use App\Models\Diary;
use App\Models\Notification;
use Illuminate\Console\Command;
use PetrPetrovich\Telegram\Services\TelegramService;

class DiaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'diary:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send birthdays notifications';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $diary = Diary::whereIn('day', [now()->day, now()->addDay()->day])
            ->whereIn('month', [now()->month, now()->addDay()->month, 0])
            ->where(function($query) {
                $query->whereIn('year', [now()->year, now()->addDay()->year])
                    ->orWhereNull('year');
            })
            ->get();

        $telegram = new TelegramService(config('services.telegram.bot-birthdays.token'), config('services.telegram.bot-birthdays.chat'));
        $messagePatternNow = "Сегодня *{text}*!\nНадо сделать это!";
        $messagePatternAfter = "Завтра *{text}*!\nНе забудь!";

        foreach ($diary as $diaryItem) {
            $notification = new Notification();
            $notification->type = Diary::TYPE;
            $notification->event_id = $diaryItem->id;
            $notification->result = $telegram->sendMessage(preg_replace('/{text}/', $diaryItem->title, now()->day == $diaryItem->day ? $messagePatternNow : $messagePatternAfter));
            $notification->save();
        }

    }
}
