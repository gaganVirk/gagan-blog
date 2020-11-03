@extends('layouts.wrapper')

@section('title', 'Create Posts')

@section('content')
    <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" class="form-input" name="categoryName" id="categoryName" placeholder="Create New Category" value="{{ old('categoryName') }}">
            <input class="border text-xl rounded" type="submit" name="send" value="Save"/>
        </div>
    </form>

    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-1">
            <span class="text-gray-700 mr-8 mt-1 w-full">Please choose category for the post:   </span>

            <select class="border m-8" name="category_id" id="category">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                    @endforeach
                    <input class="border rounded px-8" type="submit" name="send" value="Manage Categories"/>
            </select>

            @if($errors->has('category'))
                <p>Error: {{ $errors->first('category') }}</p>
            @endif
        </div>

        <div class="form-group justify-center">
            <span class="text-gray-700">Title</span>
        <input type="text" class="form-input mt-1 block mr-8 w-full"name="title" id="title" placeholder="Title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <span class="text-gray-700">Title</span>
            <textarea class="form-textarea block w-full" name="body" id="body" {{ old('body') }}></textarea>
        </div>

        <div class="text-center">
            <input class="border font-semibold text-xl" type="submit" name="send" value="Submit"> 
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