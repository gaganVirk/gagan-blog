@extends('layouts.wrapper')

@section('title', 'Book Review')

@trixassets

@section('content')

<form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="px-4 form-group justify-center">
    <input type="text" class="px-4 form-input mt-1 block mr-8 w-full"name="title" id="title" placeholder="Title" value="{{ old('title') }}">
    <p class="text-red-500 text-xs italic">{{ $errors->first('title') }}</p>
    </div>

    {{-- <div class="px-4 mt-8 form-group">
        <textarea class="px-4 form-textarea block w-full" name="body" id="body" value="{{ old('body') }}"></textarea>
        <p class="text-red-500 text-xs italic">{{ $errors->first('body') }}</p>
    </div> --}}

    @trix(\App\Models\Book::class, 'content')

    {{-- <div class="px-4 mt-8 form-group">
        <trix-editor input="body" name="body" value="{{ old('body') }}"></trix-editor>
    </div> --}}

    <div class="text-center">
        <input class="px-4 text-xl border mt-8 p-8 font-semibold text-xl" type="submit" name="send" value="Submit"> 
    </div>
    
    
</form>


<script>

</script>

@endsection