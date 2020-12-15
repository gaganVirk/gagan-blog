@extends('layouts.wrapper')

@section('title', 'My Projects')

@section('content')
<div class="px-2 grid grid-cols-2 md:grid-cols-3 gap-4">
    <div class="bg-gray-400">
        <a href="https://github.com/gaganVirk/straker-challenge">
            <img src="{{ 'https://gaganblog.sfo2.cdn.digitaloceanspaces.com/assets/VueApp.png' }}" alt="Gagan Blog"/>
        </a>
    </div>
    <div class="bg-gray-400">
        <a href="https://github.com/gaganVirk/gagan-blog">
            <img src="{{ 'https://gaganblog.sfo2.cdn.digitaloceanspaces.com/assets/laravel-blog.png' }}" alt="Gagan Blog"/>
        </a>
    </div>
</div>

@endsection