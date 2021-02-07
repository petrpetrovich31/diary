<?php

namespace App\Console\Commands;

use App\Models\Birthday;
use App\Models\BirthdayNotification;
use Illuminate\Console\Command;
use App\Services\Telegram;

class Birthdays extends Command
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
        $birthdays = Birthday::where('date', now()->format('Y-m-d'))->orWhere('date', now()->addDay()->format('Y-m-d'))->orderBy('date')->get();
        $telegram = new Telegram(config('services.telegram.bot-birthdays.token'), config('services.telegram.bot-birthdays.chat'));
        $messagePatternNow = "Сегодня день рождения у *{text}*!\nМожно было бы и поздравить его!";
        $messagePatternAfter = "Завтра день рождения у *{text}*!\nНе забудь завтра поздравить его!";

        foreach ($birthdays as $birthday) {
            $notification = new BirthdayNotification();
            $notification->birthday_id = $birthday->id;
            $notification->result = $telegram->sendMessage(preg_replace('/{text}/', $birthday->title, now()->format('Y-m-d') === $birthday->date ? $messagePatternNow : $messagePatternAfter));
            $notification->save();
        }

    }
}
