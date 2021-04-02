<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petr Petrovich © </title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/test.min.css') }}">
</head>
<body>
    <div class="page">
        <header class="header">
            <div class="header-top">
                <div class="wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-3 display-inline">
                            <h3 class="main-title">Petr Perovich</h3>
                        </div>
                        <div class="col-lg-6 col-9 display-inline">
                            <ul class="menu">
                                <li>
                                    <a href="{{ route('city.index') }}">Города</a>
                                </li>
                                <li>
                                    <a href="#">Заведения</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="content">
            <section>
                <div class="wrap">
                    <div class="title-page">
                        <h2>Города</h2>
                    </div>
                    <div class="page-list-items">
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="list-item">
                                <div class="img">
                                    <img src="https://stolichki.ru/i/sales/big/42e4e95fca2aa10fb2e7ce62388f10a9.jpg" alt="До 24 месяцев рассрочки на подарки любимым!">
                                </div>
                                <div class="descr">
                                    <div class="text">До 24 месяцев рассрочки на подарки любимым!</div>
                                    <div class="bottom">
                                        <div class="date">15 февраля 2021</div>
                                        <div class="btn">Подробнее</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
<script src="{{ asset('/js/all.min.js') }}"></script>
</body>
</html>
