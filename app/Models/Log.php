<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    protected $fillable = [
        'date',
        'ip',
        'user_agent',
        'count',
    ];

    public $timestamps = false;

    public static function checkUser(): void
    {
        $log = self::firstOrNew([
            'date' => now()->format('Y-m-d'),
            'ip' => request()->ip(),
            'user_agent' => request()->header('user-agent'),
        ]);
        $log->count++;
        $log->save();
    }
}
