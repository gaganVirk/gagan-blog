<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Certifications') }}
        </h2>
    </x-slot>
    <div class="text-center text-xl">
    Certifications
    </div>

    <div class="flex bg-white-200">
        <div class="flex-1 text-center px-4 py-2 m-2">
        <img src="{{ $certs->name }}" alt="pic"/>
        </div>
        <div class="flex-1 text-center px-4 py-2 m-2">
          Medium length
        </div>
        <div class="flex-1 text-center px-4 py-2 m-2">
          Significant
        </div>
    </div>
    <div>
   
   

</x-app-layout>