<?php

namespace App\Console\Commands;

use App\Models\Birthday;
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
        $birthdays = Birthday::where('date', now()->format('Y-m-d'))->get();
        $telegram = new Telegram(config('services.telegram.bot-birthdays.token'), config('services.telegram.bot-birthdays.chat'));

        foreach ($birthdays as $birthday) {
            $telegram->sendMessage($birthday->title);
        }
    }
}
