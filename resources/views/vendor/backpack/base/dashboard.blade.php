@extends(backpack_view('blank'))

{{--@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('logout'),
        'button_text' => trans('backpack::base.logout'),
    ];
@endphp--}}

@section('content')
    <div>
        <h2>Панель администрирования</h2>
    </div>
@endsection
