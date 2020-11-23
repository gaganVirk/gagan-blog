@extends('layouts.wrapper')

@section('title', $post->title)

@section('content')

<a href="{{ route('posts.index') }}" class="ml-4 px-4 border">Go Back</a>
    <section class="hero container max-w-screen-lg mx-auto pb-10">
        @foreach($post->images as $image)
            <img class="mx-auto" src="{{ $image->path }}" alt="screenshot" >
        @endforeach
    </section>
    <div class="px-4 py-4">{{ $post->body }}</div>
    <a href="{{ route('posts.edit', $post) }}" class="ml-4 px-4 border">Edit</a>
    <form action="{{ route('posts.destroy', $post) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="ml-4 px-4 bg-red border" value="Delete">
    </form>

@endsection