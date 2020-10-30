<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
    <a href="/posts" class="border">Go Back</a>
    <h1 class="text-center font-semibold text-xl">{{ $post->title }}</h1>
    <div>{{ $post->body }}</div>

</x-app-layout>