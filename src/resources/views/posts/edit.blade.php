@extends('layouts.wrapper')

@section('title', $post->title)

@section('content')

<a href="{{ route('posts.show', $post) }}" class="ml-2 bg-gray-600 text-gray-100 text-sm rounded hover:bg-gray-500 px-3 py-3 focus:outline-none">Go Back</a>
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
            <input class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline" type="submit" name="send" value="Submit">  
        </div>
        
    </form>
    <script src="{{ asset('js/ckeditor/build/ckeditor.js') }}"></script>

    <script>
        
        ClassicEditor
                .create( document.querySelector( '#body' ), {
                    fontSize: {
                        options: [
                            'tiny',
                            'default',
                            'big'
                        ]
                    },
                    toolbar: [ 'heading', '|', 'big', 'bold', 'italic', 'link', 'imageUpload', 'bulletedList', 'fontFamily' ],
                    
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

