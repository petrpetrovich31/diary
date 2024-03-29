<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('birthdays') }}">
        <i class="la la-birthday-cake nav-icon"></i>
        <span>Дни рождения</span>
    </a>
    <a class="nav-link" href="{{ backpack_url('diary') }}">
        <i class="la la-calendar-check-o nav-icon"></i>
        <span>Ежедневник</span>
    </a>
    <a class="nav-link" href="{{ backpack_url('city') }}">
        <i class="la la-university nav-icon"></i>
        <span>Города</span>
    </a><a class="nav-link" href="{{ backpack_url('city-image') }}">
        <i class="la la-picture-o nav-icon"></i>
        <span>Фотографии городов</span>
    </a>
    <a class="nav-link" href="{{ backpack_url('place') }}">
        <i class="la la-home nav-icon"></i>
        <span>Места</span>
    </a>
    <a class="nav-link" href="{{ backpack_url('place-image') }}">
        <i class="la la-picture-o nav-icon"></i>
        <span>Фотографии мест</span>
    </a>
    <a class="nav-link" href="{{ backpack_url('beer/beer') }}">
        <i class="la la-beer nav-icon"></i>
        <span>Пиво</span>
    </a>
    <a class="nav-link" href="{{ backpack_url('beer/action') }}">
        <i class="la la-check nav-icon"></i>
        <span>Действия</span>
    </a>
</li>
