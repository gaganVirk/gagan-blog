@extends('layouts.wrapper')

@section('title', $post->title)

@section('content')

<a href="{{ route('posts.index') }}" class="ml-2 bg-gray-600 text-gray-100 text-sm rounded hover:bg-gray-500 px-3 py-3 focus:outline-none">Go Back</a>
    <section class="hero container max-w-screen-lg mx-auto pb-10">
        @foreach($post->images as $image)
            <img class="mx-auto" src="{{ $image->path }}" alt="screenshot" >
        @endforeach
    </section>
    <div class="px-4 py-4">{!! $post->body !!}</div>
    @role('admin')
    <div class="p-4 flex gap-2">
        <a href="{{ route('posts.edit', $post) }}" class="bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">Edit</a>
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="bg-red-500 text-gray-200 rounded hover:bg-red-400 px-4 py-2 focus:outline-none" value="Delete">
        </form>
    </div>
    @endrole

@endsection