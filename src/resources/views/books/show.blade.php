@extends('layouts.wrapper')

@section('title', $book->title)

@section('content')

<a class="ml-4 px-4 pt-2 pb-3 border" href="{{ route('books.index') }}">Go Back</a>
<section class="hero container max-w-screen-lg mx-auto pb-10">
    @foreach($book->images as $image)
        <img class="mx-auto" src="{{ $image->path }}" alt="screenshot" >
    @endforeach
</section>

{{-- <section class="hero container max-w-screen-lg mx-auto pb-10">
    <img class="mx-auto" src="{{ $book->images->first()->path }}" alt="screenshot" >
</section> --}}

<div class="px-4">{{ $book->content }}</div>

@endsection