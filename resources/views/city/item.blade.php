@extends('layout.main')

@section('content')
    <section>
        <city-item v-bind:id="{{ $id }}"></city-item>
    </section>
@endsection
