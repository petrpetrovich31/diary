<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Admin\Models\Content;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Админ панель');
    }
}
