<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>
    Certifications
    <div class="grid grid-cols-3 gap-4">
        <div>1</div>
        <!-- ... -->
        <div>9</div>
      </div>
</x-app-layout>