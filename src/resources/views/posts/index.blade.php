<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="grid grid-flow-col gap-4 pl-20">
        <h1>Posts</h1>
        @if(count($posts) > 0) 
            @foreach($posts as $post)
            <a href="/posts/{{$post->id}}">{{ $post->title }}</a>
            <small>Written on {{ $post->created_at }}</small>
            <hr/>
            @endforeach
        @else
            <p>No posts found</p>
        @endif
    </div>
</x-app-layout>
