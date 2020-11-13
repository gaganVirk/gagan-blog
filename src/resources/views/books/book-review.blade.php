@extends('layouts.wrapper')

@section('title', 'Book Review')

@section('content')

<form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="px-4 form-group justify-center">
    <input type="text" class="px-4 form-input mt-1 block mr-8 w-full"name="title" id="title" placeholder="Title" value="{{ old('title') }}">
    <p class="text-red-500 text-xs italic">{{ $errors->first('title') }}</p>
    </div>

    <div class="px-4 mt-8 form-group">
        <textarea class="px-4 form-textarea block w-full" name="body" id="body" value="{{ old('body') }}"></textarea>
        <p class="text-red-500 text-xs italic">{{ $errors->first('body') }}</p>
    </div>

    <div class="text-center">
        <input class="px-4 text-xl border mt-8 p-8 font-semibold text-xl" type="submit" name="send" value="Submit"> 
    </div>
    
</form>
<script src="{{ asset('js/ckeditor/build/ckeditor.js') }}"></script>

<script>
    ClassicEditor
            .create( document.querySelector( '#body' ), {
                toolbar: [ 'bold', 'italic', 'link', 'imageUpload' ],
                simpleUpload: {
                    // The URL that the images are uploaded to.
                    uploadUrl: '{{ route('books.upload-bookImage') }}',

                    // Enable the XMLHttpRequest.withCredentials property.
                    withCredentials: true,

                    // Headers sent along with the XMLHttpRequest to the upload server.
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            } )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@endsection