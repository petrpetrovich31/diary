<?php

namespace App\Console\Commands;

use App\Models\Birthday;
use App\Models\Notification;
use Illuminate\Console\Command;
use PetrPetrovich\Telegram\Services\TelegramService;

class BirthdaysCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthdays:send';

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
        $birthdays = Birthday::where(function ($query) {
                $query->whereDay('date', now()->day)
                    ->whereMonth('date', now()->month);
            })
            ->orWhere(function ($query) {
                $query->whereDay('date', now()->addDay()->day)
                    ->whereMonth('date', now()->addDay()->month);
            })
            ->get();

        $telegram = new TelegramService(config('services.telegram.bot-birthdays.token'), config('services.telegram.bot-birthdays.chat'));
        $messagePatternNow = "Сегодня день рождения у *{text}*!\nМожно было бы и поздравить его!";
        $messagePatternAfter = "Завтра день рождения у *{text}*!\nНе забудь завтра поздравить его!";

        foreach ($birthdays as $birthday) {
            $notification = new Notification();
            $notification->type = Birthday::TYPE;
            $notification->event_id = $birthday->id;
            $notification->result = $telegram->sendMessage(preg_replace('/{text}/', $birthday->title, now()->format('m-d') == preg_replace('/^[0-9]{4}\-/', '', $birthday->date) ? $messagePatternNow : $messagePatternAfter));
            $notification->save();
        }

    }
}
