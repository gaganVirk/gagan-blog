@extends('layouts.wrapper')

@section('title', '')
@section('content')

<div class="flex flex-wrap mt-2">
    <div class="w-full md:w-2/4 p-4 rounded-full flex items-center justify-center">            
        <img class="rounded-full h-66 w-66" src="{{ 'storage/images/gagan.png' }}" alt="Gagan"/>

    </div>

    <div class="w-full md:w-2/4 bg-gray-400 p-4 text-center text-gray-200">
        <h3 class="mt-1 text-xl text-center">About me</h3>
        <p class="font-serif mt-2">
        He is the author of the multi-volume work The Art of Computer Programming. He contributed to the development of the 
        rigorous analysis of the computational complexity of algorithms and systematized formal mathematical techniques for it. 
        In the process he also popularized the asymptotic notation. In addition to fundamental contributions in several branches 
        of theoretical computer science, Knuth is the creator of the TeX computer typesetting system, the related METAFONT font 
        definition language and rendering system, and the Computer Modern family of typefaces.</p>   
    </div>
</div>

<div class="flex flex-wrap mt-8">
    <div class="font-serif w-full md:w-2/4 bg-gray-500 px-4 text-gray-200">
        <h3 class="font-serif text-xl">Latest posts</h3>
        <div class="font-serif grid grid-rows-auto">
        @if(count($posts) > 1) 
            @foreach($posts as $post)
                <a href="/posts/{{$post->id}}"><h1>{{ $post->title }}</h1></a>
                <p>{{ Str::limit($post->body, 100) }}</p>
            @endforeach
        @else
            <p class="font-serif text-left">No Posts Found! </p>
        @endif
        </div>  
    </div>
    <div class="w-full md:w-2/4 bg-gray-400 px-4 text-gray-200">
        <h3 class="font-serif text-xl">Latest Book Reviews</h3>
        <div class="font-serif grid grid-rows-auto">
        @if(count($books) > 1) 
            @foreach($books as $book)
                <a href="/books/{{$book->slug}}"><h1>{{ $book->title }}</h1></a>
                <p>{{ Str::limit($book->content, 100) }}</p>
            @endforeach
        @else
            <p class="font-serif text-left">No Book Reviews Found! </p>
        @endif
        </div>  
    </div>
</div>
@endsection
   

