@extends('layouts.wrapper')

@section('title', 'Favourite Books')
@section('content')

{{-- <div class="px-4 grid grid-flow-col gap-4">
    @if(count($books) > 0) 
        @foreach($books as $book)
        <a class="text-xl" href="/books/{{$book->id}}">{{ $book->title }}</a>
        <p>{{ Str::limit($book->body, 200) }}</p>
        <small>Written on {{ $book->created_at }}</small>
        <hr/>
        @endforeach
    @else
        <p>No book reviews found</p>
    @endif
</div> --}}
@if(count($books) > 0)
    <div class="grid grid-cols-4 gap-4">
    @foreach($books as $book)
        <div class="text-center">
        <a class="text-xl" href="{{ route('books.show',$book) }}">{{ $book->title }}</a>
        <img class="mx-auto" src="{{ $book->images->first()->path }}" alt="screenshot" max-height="200" max-width="200" >
        <p>{{ Str::limit($book->content, 20) }}</p>
        <small>Written on {{ $book->created_at }}</small>
        </div>
    @endforeach
    </div>
@else
        <p>No book reviews found</p>
@endif

{{ $users->links() }}

@endsection

