@extends('layouts.wrapper')

@section('title', 'My Projects')

@section('content')
<div class="px-2">
    <div class="flex -mx-2">
      <div class="w-full md:w-1/3  px-2">
        <div class="bg-gray-400">
            <a href="https://github.com/gaganVirk/gagan-blog">
                <img src="{{ asset('storage/projects/laravel-blog.png') }}" alt="Gagan Blog"/>
            </a>
        </div>
      </div>
      <div class="w-full md:w-1/3 px-2">
        <div class="bg-gray-400">
            <a href="https://github.com/gaganVirk/gagan-blog">
                <img src="{{ asset('storage/projects/laravel-blog.png') }}" alt="Gagan Blog"/>
            </a>
        </div>
      </div>
      <div class="w-full md:w-1/3 px-2">
        <div class="bg-gray-400 ">
            <a href="https://github.com/gaganVirk/gagan-blog">
                <img src="{{ asset('storage/projects/laravel-blog.png') }}" alt="Gagan Blog"/>
            </a>
        </div>
      </div>
    </div>
</div>
<div class="px-2">
    <div class="flex -mx-2">
        <div class="w-full md:w-1/3  px-2">
          <div class="bg-gray-400 h-12">
              <a href="https://github.com/gaganVirk/gagan-blog">
                  <img src="{{ asset('storage/projects/laravel-blog.png') }}" alt="Gagan Blog"/>
              </a>
          </div>
        </div>
        <div class="w-full md:w-1/3 px-2">
          <div class="bg-gray-400 h-12">
              <a href="https://github.com/gaganVirk/gagan-blog">
                  <img src="{{ asset('storage/projects/laravel-blog.png') }}" alt="Gagan Blog"/>
              </a>
          </div>
        </div>
        <div class="w-full md:w-1/3 px-2">
          <div class="bg-gray-400 h-12">
              <a href="https://github.com/gaganVirk/gagan-blog">
                  <img src="{{ asset('storage/projects/laravel-blog.png') }}" alt="Gagan Blog"/>
              </a>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection