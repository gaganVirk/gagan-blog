@extends('layouts.wrapper')

@section('title','All Posts')

@section('content')

    <div class="my-4 grid grid-cols-4 gap-4">
        @if(count($posts) > 0) 
            @foreach($posts as $post)
            <div class="text-center">
            <a class="text-xl" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            <p>{!! Str::limit($post->body, 200) !!}</p>
            <small>Written on {{ $post->created_at }}</small>
            <p>Category: <a href="{{ route('posts.filterByCategory', $post->category) }}">{{ $post->category->categoryName }}</a></p>
            @if($post->deleted_at)
                <a href="{{ route('posts.restore', $post->slug) }}">Restore</a>
            @endif
            <hr/>
            </div>
            @endforeach
        @else
            <p>No posts found</p>
        @endif

        {{ $users->links() }}
    </div>

@endsection
