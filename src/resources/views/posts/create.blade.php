@extends('layouts.wrapper')

@section('title', 'Create Posts')

@section('content')
    <div class="flex">
    <form class="px-4" method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" class="form-input" name="categoryName" id="categoryName" placeholder="Create New Category" value="{{ old('categoryName') }}">
            
            <input class="border border-teal-500 bg-teal-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-teal-600 focus:outline-none focus:shadow-outline" type="submit" name="send" value="Save"/>

            <p class="text-red-500 text-xs italic">{{ $errors->first('categoryName') }}</p>
        </div>
    </form>

    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="px-4 form-group">
            <select class="border p-2" name="category_id" id="category_id" >
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->categoryName }}</option>
                    @endforeach
            </select>
            <input class="border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" type="submit" name="send" value="Manage"/>
    </div>
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
            <input class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline" type="submit" name="send" value="Submit"> 
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