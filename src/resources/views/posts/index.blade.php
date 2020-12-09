@extends('layouts.wrapper')

@section('title','All Posts')

@section('content')

    <div class="my-4 grid grid-cols-4 gap-4">
        @if(count($posts) > 0) 
            @foreach($posts as $post)
            @if($post->created_at <= date("Y-m-d H:i:s"))
                <div class="text-center">
                <a class="text-xl" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                <p>{!! Str::limit($post->body,20) !!}</p>
                <small>Written on {{ $post->created_at->format("Y-m-d") }}</small>
                <p>Category: <a href="{{ route('posts.filterByCategory', $post->category) }}">{{ $post->category->categoryName }}</a></p>
                <hr/>
            @elseif($post->created_at > date("Y-m-d H:i:s"))
                <div class="text-center">
                <a class="text-xl">Publishing article</a>
                <p>Coming soon!!</p>
                <small>Incoming article {{ $post->created_at->format("Y-m-d") }}</small>
                <p>Category: {{ $post->category->categoryName }}</p>
                <hr/>
            @endif
                
            @if($post->deleted_at)
                <a href="{{ route('posts.restore', $post->slug) }}">Restore</a>
            @endif
            </div>
            @endforeach
        @else
            <p>No posts found</p>
        @endif

         {{-- {{ $posts->links() }}  --}}
    </div>

@endsection
