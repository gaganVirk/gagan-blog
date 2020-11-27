@extends('layouts.wrapper')

@section('title', $post->title)

@section('content')

<a href="{{ route('posts.show', $post) }}" class="ml-4 px-4 border">Go Back</a>
    <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        
        <div class="px-4 mt-4 form-group justify-center">
        <input type="text" class="px-4 form-input mt-1 block mr-8 w-full"name="title" id="title" placeholder="Title" value="{!! old('title', $post->title) !!}">
        <p class="text-red-500 text-xs italic">{{ $errors->first('title') }}</p>
        </div>

        <div class="px-4 mt-4 form-group">
            <textarea class="px-4 form-textarea block w-full" name="body" id="body">
                {!! old('body', $post->body) !!}
            </textarea>
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
                        uploadUrl: '{{ route('posts.upload-image') }}',

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

