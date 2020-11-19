@extends('layouts.wrapper')

@section('title', $post->title)

@section('content')

    <a href="/posts" class="ml-4 px-4 border">Go Back</a>
    <section class="hero container max-w-screen-lg mx-auto pb-10">
        <img class="mx-auto" src="{{ $image->path }}" alt="screenshot" >
    </section>
    <div class="px-4 py-4">{{ $post->body }}</div>
    <a href="/edit-post/{{ $post->id}}" class="ml-4 px-4 border">Edit</a>
    <a href="/delete-post/{{ $post->id}}" class="ml-4 px-4 border">Delete</a>

@endsection