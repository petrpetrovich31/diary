<?php

namespace Database\Seeders;

use Encore\Admin\Auth\Database\Menu;
use Illuminate\Database\Seeder;

class AdminMenuSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Дни Рождения',
                'icon' => 'fa-birthday-cake',
                'uri' => 'birthdays',
            ],
            [
                'title' => 'Ежедневник',
                'icon' => 'fa-calendar-check-o',
                'uri' => 'diary',
            ],
            [
                'title' => 'Города',
                'icon' => 'fa-university',
                'uri' => 'cities',
            ],
            [
                'title' => 'Фотографии городов',
                'icon' => 'fa-picture-o',
                'uri' => 'city-images',
            ],
            [
                'title' => 'Пиво',
                'icon' => 'fa-beer',
                'uri' => 'beer',
            ],
        ];

        foreach ($items as $item) {
            Menu::firstOrCreate($item);
        }
    }
}
