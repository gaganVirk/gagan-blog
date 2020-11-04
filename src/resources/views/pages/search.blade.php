@extends('layouts.wrapper')

@section('title', 'Search results')

@section('content')
<div class="grid grid-flow-col gap-4 pl-20">
    @if(count($posts) > 0) 
        @foreach($posts as $post)
        <a href="/posts/{{$post->id}}">{{ $post->title }}</a>
        <small>Written on {{ $post->created_at }}</small>
        <p>Category: <a href="{{ route('posts.filterByCategory', $post->category) }}">{{ $post->category->categoryName }}</a></p>
        <hr/>
        @endforeach
    @else
        <p>No posts found</p>
    @endif

</div>
@endsection
