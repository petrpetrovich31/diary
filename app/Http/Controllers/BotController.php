<?php

namespace App\Http\Controllers;

use App\Services\Telegram;

class BotController extends Controller
{
    public function test()
    {
        $telegram = new Telegram(config('services.telegram.bot-birthdays.token'), config('services.telegram.bot-birthdays.chat'));
        $telegram->sendMessage(now());

        return redirect(route('home'));
    }
}
