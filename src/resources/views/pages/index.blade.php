@extends('layouts.wrapper')

@section('title', '')
@section('content')

<div class="grid grid-cols-2">
    <div class="mt-4">            
        <img class="m-auto rounded-full h-66 w-66" src="{{ 'storage/images/gagan.png' }}" alt="Gagan"/>

    </div>

    <div class="bg-gray-400 px-4 text-gray-200">
        <h3 class="mt-2 text-2xl text-center">About me</h3>
        <p class="mt-2 text-lg">
            Today, we can teach ourselves anything online with basic internet connection and a micro-processor, 
            and this idea of teaching yourself something on your own is a passion of mine. It is actually called Autodidacticism.
             I am teaching myself to program from the last four years. I have a keen interest in Laravel, C#.NET and Java. 
             I sign up a lot of online courses and read technical books to learn new skills.</p>   
    </div>
</div>

<div class="grid grid-cols-2 mt-8">
    <div class="bg-gray-500 px-4 text-gray-200">
        <h3 class="text-2xl">Latest posts</h3>
        @if(count($posts) > 1) 
            @foreach($posts as $post)
                <a class="text-lg" href="{{ route('posts.show',$post) }}">{{ $post->title }}</a>
                <p class="text-sm">{!! Str::limit($post->body, 80) !!}</p>
            @endforeach
        @else
            <p class="font-serif text-left">No Posts Found! </p>
        @endif
    </div>
    <div class="bg-gray-400 px-4 text-gray-200">
        <h3 class="text-2xl">Latest Book Reviews</h3>
        @if(count($books) > 1) 
            @foreach($books as $book)
                <a href="{{ route('books.show', $book)}}"><h1 class="text-lg">{{ $book->title }}</h1></a>
                <p class="text-sm">{!! Str::limit($book->content, 80) !!}</p>
            @endforeach
        @else
            <p>No Book Reviews Found! </p>
        @endif
    </div>
</div>
@endsection
   

