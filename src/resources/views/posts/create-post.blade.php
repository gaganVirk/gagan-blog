@extends('layouts.wrapper')

@section('title', 'Create Posts')

@section('content')
    <form class="px-4" method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" class="form-input" name="categoryName" id="categoryName" placeholder="Create New Category" value="{{ old('categoryName') }}">

            <input class="px-4 ml-4 border text-xl rounded" type="submit" name="send" value="Save"/>
        </div>
    </form>

    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="px-4 mt-4  form-group mt-1">
            <select class="border m-8" name="category_id" id="category_id" >
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                    @endforeach
            </select>
            <input class="px-4 ml-4 text-xl border rounded" type="submit" name="send" value="Manage"/>
            <p class="text-red-500 text-xs italic">{{ $errors->first('category_id') }}</p>
        </div>

        <div class="px-4 mt-4 form-group justify-center">
        <input type="text" class="px-4 form-input mt-1 block mr-8 w-full"name="title" id="title" placeholder="Title" value="{{ old('title') }}">
        <p class="text-red-500 text-xs italic">{{ $errors->first('title') }}</p>
        </div>

        <div class="px-4 mt-4 form-group">
            <textarea class="px-4 form-textarea block w-full" name="body" id="body">{{ old('body') }}</textarea>
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